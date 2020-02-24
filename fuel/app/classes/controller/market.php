<?php
class Controller_Market extends Controller_Template
{

	public function action_index()
	{
		$data['markets'] = Model_Market::find('all');
		$this->template->title = "Markets";
		$this->template->content = View::forge('market/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('market');

		if ( ! $data['market'] = Model_Market::find($id))
		{
			Session::set_flash('error', 'Could not find market #'.$id);
			Response::redirect('market');
		}

		$this->template->title = "Market";
		$this->template->content = View::forge('market/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			//Debug::dump(Input::post('country'));die;
			$val = Model_Market::validate('create');
			//Debug::dump($val);die;
			if ($val->run())
			{
				
				/*-------*/
				$country='';
				$country_name=Input::post('country');
				$countrys=Model_Country::query()->where('country_name', $country_name)->get();
				
				foreach ($countrys as $item)
				{
					$country=$item;
				}
				$countryid=$country['id'];
			
			//address
				$address = Model_Address::forge(array(
				'address' => Input::post('address'),
				'province' => Input::post('province'),
				'district' => Input::post('district'),
				'postal_code' => Input::post('postal_code'),
				'phone' => Input::post('phone'),
				'country_id'=>$countryid,
				
				
					));
					$address->save();
				
					$market = Model_Market::forge(array(
					'name' => Input::post('name'),
					'location' => Input::post('location'),
					'address_id' => $address->id,
				));
				
				
				if ($market and $market->save())
				{
					Session::set_flash('success', 'Added market #');

					Response::redirect('market');
				}

				else
				{
					Session::set_flash('error', 'Could not save market.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Markets";
		$this->template->content = View::forge('market/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('market');

		if ( ! $market = Model_Market::find($id))
		{
			Session::set_flash('error', 'Could not find market #'.$id);
			Response::redirect('market');
		}

		$val = Model_Market::validate('edit');

		if ($val->run())
		{
			$market->name = Input::post('name');
			$market->location = Input::post('location');
			$market->address_id = Input::post('address_id');

			if ($market->save())
			{
				Session::set_flash('success', 'Updated market #' . $id);

				Response::redirect('market');
			}

			else
			{
				Session::set_flash('error', 'Could not update market #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$market->name = $val->validated('name');
				$market->location = $val->validated('location');
				$market->address_id = $val->validated('address_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('market', $market, false);
		}

		$this->template->title = "Markets";
		$this->template->content = View::forge('market/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('market');

		if ($market = Model_Market::find($id))
		{
			$market->delete();

			Session::set_flash('success', 'Deleted market #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete market #'.$id);
		}

		Response::redirect('market');

	}

}
