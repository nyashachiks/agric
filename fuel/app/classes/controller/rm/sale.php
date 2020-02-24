<?php
class Controller_Rm_Sale extends Controller_Template
{

	public function action_index()
	{
		$data['rm_sales'] = Model_Rm_Sale::find('all');
		$this->template->title = "Rm_sales";
		$this->template->content = View::forge('rm/sale/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('rm/sale');

		if ( ! $data['rm_sale'] = Model_Rm_Sale::find($id))
		{
			Session::set_flash('error', 'Could not find rm_sale #'.$id);
			Response::redirect('rm/sale');
		}

		$this->template->title = "Rm_sale";
		$this->template->content = View::forge('rm/sale/view', $data);

	}
	public function action_buy($id)
	{
		
		
		$type='straight';
		Session::set('type',$type);
		$this->template->title = "Buy";
		Response::redirect('rm/sale/create/'.$id);
	}
	

	public function action_create($id=NULL)
	{
		$rawmaterial_offer='';
		$sale='';
		
		if($id!=NULL)
		{
			$rawmaterial_offer = Model_Rawmaterial_Offer::find($id);
		}
		if (Input::method() == 'POST')
		{
			$val = Model_Rm_Sale::validate('create');

			if ($val->run())
			{
				$rm_sale = Model_Rm_Sale::forge(array(
					'rm_offer_id' => Input::post('rm_offer_id'),
					'buyer_id' => Input::post('buyer_id'),
					'price' => Input::post('price'),
					'quantity' => Input::post('unit_quantity'),
					'total' => Input::post('total'),
				));

				if ($rm_sale and $rm_sale->save())
					{
						$rawmaterial_offer->quantity_left =$rawmaterial_offer->quantity_left-Input::post('unit_quantity');
						$rawmaterial_offer->save();
						Session::set('sale', $rm_sale);
						Response::redirect('rm/transaction/create');
					}

				else
					{
									Session::set_flash('error', 'Could not save rm_sale.');
					}
				}
			else
				{
								Session::set_flash('error', $val->error());
				}
			}

						$this->template->title = "Rm_Sales";
						$this->template->set_global('rawmaterial_offer',$rawmaterial_offer);
						$this->template->content = View::forge('rm/sale/create');

		

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('rm/sale');

		if ( ! $rm_sale = Model_Rm_Sale::find($id))
		{
			Session::set_flash('error', 'Could not find rm_sale #'.$id);
			Response::redirect('rm/sale');
		}

		$val = Model_Rm_Sale::validate('edit');

		if ($val->run())
		{
			$rm_sale->rm_offer_id = Input::post('rm_offer_id');
			$rm_sale->buyer_id = Input::post('buyer_id');
			$rm_sale->price = Input::post('price');
			$rm_sale->quantity = Input::post('quantity');
			$rm_sale->total = Input::post('total');

			if ($rm_sale->save())
			{
				Session::set_flash('success', 'Updated rm_sale #' . $id);

				Response::redirect('rm/sale');
			}

			else
			{
				Session::set_flash('error', 'Could not update rm_sale #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$rm_sale->rm_offer_id = $val->validated('rm_offer_id');
				$rm_sale->buyer_id = $val->validated('buyer_id');
				$rm_sale->price = $val->validated('price');
				$rm_sale->quantity = $val->validated('quantity');
				$rm_sale->total = $val->validated('total');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('rm_sale', $rm_sale, false);
		}

		$this->template->title = "Rm_sales";
		$this->template->content = View::forge('rm/sale/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('rm/sale');

		if ($rm_sale = Model_Rm_Sale::find($id))
		{
			$rm_sale->delete();

			Session::set_flash('success', 'Deleted rm_sale #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete rm_sale #'.$id);
		}

		Response::redirect('rm/sale');

	}

}
