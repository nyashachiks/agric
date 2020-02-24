<?php
class Controller_Sap_Bp extends Controller_Template
{

	public function action_index()
	{
		$data['sap_bps'] = Model_Sap_Bp::find('all',array('order_by' => array('id' => 'desc')));
		$this->template->title = "Sap Bps";
		$this->template->content = View::forge('sap/bp/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('sap/bp');

		if ( ! $data['sap_bp'] = Model_Sap_Bp::find($id))
		{
			Session::set_flash('error', 'Could not find sap_bp #'.$id);
			Response::redirect('sap/bp');
		}

		$this->template->title = "Sap Bp";
		$this->template->content = View::forge('sap/bp/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Sap_Bp::validate('create');

			if ($val->run())
			{
				
				$bp_num = Custom_UserUtility::create_BP(Input::post('region'),Input::post('city'),Input::post('firstname'),Input::post('lastname'),Input::post('street'),Input::post('housenumber'));
				
				$sap_bp = Model_Sap_Bp::forge(array(
					'firstname' => Input::post('firstname'),
					'lastname' => Input::post('lastname'),
					'street' => Input::post('street'),
					'housenumber' => Input::post('housenumber'),
					'city' => Input::post('city'),
					'region' => Input::post('region'),
					'bp_num' => $bp_num,
				));

				if ($sap_bp and $sap_bp->save())
				{
					Session::set_flash('success', 'Added Sap BP '.$sap_bp->firstname.' '.$sap_bp->lastname.'  BP Num: '. $sap_bp->bp_num);

					Response::redirect('sap/bp');
				}

				else
				{
					Session::set_flash('error', 'Could not save sap_bp.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Sap Bps";
		$this->template->content = View::forge('sap/bp/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('sap/bp');

		if ( ! $sap_bp = Model_Sap_Bp::find($id))
		{
			Session::set_flash('error', 'Could not find sap bp #'.$id);
			Response::redirect('sap/bp');
		}

		$val = Model_Sap_Bp::validate('edit');

		if ($val->run())
		{
			$sap_bp->firstname = Input::post('firstname');
			$sap_bp->lastname = Input::post('lastname');
			$sap_bp->street = Input::post('street');
			$sap_bp->housenumber = Input::post('housenumber');
			$sap_bp->city = Input::post('city');
			$sap_bp->region = Input::post('region');
			$sap_bp->bp_num = Input::post('bp_num');
			if ($sap_bp->save())
			{
				Session::set_flash('success', 'Updated sap bp #' . $id);

				Response::redirect('sap/bp');
			}

			else
			{
				Session::set_flash('error', 'Could not update sap bp #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$sap_bp->firstname = $val->validated('firstname');
				$sap_bp->lastname = $val->validated('lastname');
				$sap_bp->street = $val->validated('street');
				$sap_bp->housenumber = $val->validated('housenumber');
				$sap_bp->city = $val->validated('city');
				$sap_bp->region = $val->validated('region');
				$sap_bp->bp_num = Input::post('bp_num');
				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('sap_bp', $sap_bp, false);
		}

		$this->template->title = "Sap BPs";
		$this->template->content = View::forge('sap/bp/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('sap/bp');

		if ($sap_bp = Model_Sap_Bp::find($id))
		{
			$sap_bp->delete();

			Session::set_flash('success', 'Deleted sap bp #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete sap bp #'.$id);
		}

		Response::redirect('sap/bp');

	}

}
