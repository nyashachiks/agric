<?php
class Controller_Productoffer extends Controller_Base
{

	public function action_index()
	{
		$data['productoffers'] = Model_Productoffer::find('all');
		$this->template->title = "Productoffers";
		$this->template->content = View::forge('productoffer/index', $data);

	}
	public function action_index_admin()
	{
		$productoffer=Model_Productoffer::find('all');
		$this->template->title="Product";
		$this->template->content = View::forge('productoffer/index_admin', $productoffer);
	}
	public function action_agri_view($id = null)
	{
		is_null($id) and Response::redirect('productoffer');

		if ( ! $data['productoffer'] = Model_Productoffer::find($id))
		{
			Session::set_flash('error', 'Could not find productoffer #'.$id);
			Response::redirect('dashboard');
		}

		$this->template->title = "Product Offer";
		$this->template->content = View::forge('productoffer/agri_view', $data);
	}
	
	public function action_agri_view_final($id = null)
	{
		is_null($id) and Response::redirect('productoffer');

		if ( ! $data['productoffer'] = Model_Productoffer::find($id))
		{
			Session::set_flash('error', 'Could not find productoffer #'.$id);
			Response::redirect('dashboard');
		}

		$this->template->title = "Product Offer";
		$this->template->content = View::forge('productoffer/agri_view_final', $data);
	}
	public function action_agri_edit1($id = null)
	{
		is_null($id) and Response::redirect('productoffer');

		if ( ! $data['productoffer'] = Model_Productoffer::find($id))
		{
			Session::set_flash('error', 'Could not find productoffer #'.$id);
			Response::redirect('dashboard');
		}

		$this->template->title = "Product Offer";
		$this->template->content = View::forge('productoffer/agri_edit', $data);
	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('productoffer');

		if ( ! $data['productoffer'] = Model_Productoffer::find($id))
		{
			Session::set_flash('error', 'Could not find productoffer #'.$id);
			Response::redirect('dashboard');
		}

		$this->template->title = "Product Offer";
		$this->template->content = View::forge('productoffer/view', $data);

	}
		
	
	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Productoffer::validate('create');
			/*if(!is_null(Input::post('price')))
			{
				Session::set_flash('error','Please enter a price.');
				Response::redirect('productoffer/create');
			}
			if(!is_numeric(Input::post('price')))
			{
				Session::set_flash('error','Price should be a number.');
				Response::redirect('productoffer/create');
			}
			if(!is_null(Input::post('quanity')))
			{
				Session::set_flash('error','Please enter a quantity.');
				Response::redirect('productoffer/create');
			}
			if(!is_numeric(Input::post('quanity')))
			{
				Session::set_flash('error','Quantity should be a number.');
				Response::redirect('productoffer/create');
			}
			if(!is_null(Input::post('min_quantity')))
			{
				Session::set_flash('error','Please enter a minimum quantity.');
				Response::redirect('productoffer/create');
			}
			if(!is_numeric(Input::post('min_quantity')))
			{
				Session::set_flash('error','Minimum quantity should be a number.');
				Response::redirect('productoffer/create');
			}*/
			if ($val->run())
				{
					$productoffer = Model_Productoffer::forge(array(
						'product_id' => Input::post('product_id'),
						'farmer_id' => Input::post('farmer_id'),
						'market_id' => Input::post('market_id'),
						'price' => Input::post('price'),
						'quanity' => Input::post('quanity'),
						'min_quantity' => Input::post('min_quantity'),
						'quantity_left' => Input::post('quanity'),
						'status' => Input::post('status'),
						'product_status' => Input::post('product_status'),
						'count' => Input::post('count'),
					));

					if ($productoffer and $productoffer->save())
					{
						//Session::set_flash('success', 'Added productoffer #'.$productoffer->id.'.');

						Response::redirect('dashboard');
					}

					else
					{
						Session::set_flash('error', 'Could not save productoffer.');
					}
				}
				else
				{
					Session::set_flash('error', $val->error());
				}
		}

		$this->template->title = "Productoffers";
		$this->template->content = View::forge('productoffer/create');

	}
	public function action_agri_edit($id = null)
	{
		is_null($id) and Response::redirect('productoffer');

		if ( ! $productoffer = Model_Productoffer::find($id))
		{
			Session::set_flash('error', 'Could not find productoffer #'.$id);
			Response::redirect('dashboard/agri');
		}
		
		
		$val = Model_Productoffer::validate('edit');

		if ($val->run())
		{	
			$productoffer->product_status=$_POST['product_status'];
			
			if ($productoffer->save())
			{
				Session::set_flash('success', 'Updated productoffer #' . $id);

				Response::redirect('dashboard/agri');
			}

			else
			{
				Session::set_flash('error', 'Could not update productoffer #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				
				$productoffer->product_status=$_POST['product_status'];
				

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('productoffer', $productoffer, false);
		}

		$this->template->title = "Product Offer";
		$this->template->content = View::forge('productoffer/agri_edit');
	}
	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('productoffer');

		if ( ! $productoffer = Model_Productoffer::find($id))
		{
			Session::set_flash('error', 'Could not find productoffer #'.$id);
			Response::redirect('dashboard');
		}

		$val = Model_Productoffer::validate('edit');

		if ($val->run())
		{
			$productoffer->product_id = Input::post('product_id');
			$productoffer->farmer_id = Input::post('farmer_id');
			$productoffer->market_id = Input::post('market_id');
			$productoffer->price = Input::post('price');
			$productoffer->quanity = Input::post('quanity');
			$productoffer->min_quantity = Input::post('min_quantity');
			$productoffer->quantity_left = Input::post('quantity_left');
			$productoffer->status = Input::post('status');
			$productoffer->product_status = Input::post('product_status');
			$productoffer->count = Input::post('count');
			
			if ($productoffer->save())
			{
				Session::set_flash('success', 'Updated productoffer #' . $id);

				Response::redirect('dashboard');
			}

			else
			{
				Session::set_flash('error', 'Could not update productoffer #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$productoffer->product_id = $val->validated('product_id');
				$productoffer->farmer_id = $val->validated('farmer_id');
				$productoffer->market_id = $val->validated('market_id');
				$productoffer->price = $val->validated('price');
				$productoffer->quanity = $val->validated('quanity');
				$productoffer->min_quantity = $val->validated('min_quantity');
				$productoffer->quantity_left = $val->validated('quanity');
				$productoffer->status = $val->validated('status');
				$productoffer->product_status = Input::post('product_status');
				$productoffer->count = $val->validated('count');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('productoffer', $productoffer, false);
		}

		$this->template->title = "Productoffers";
		$this->template->content = View::forge('productoffer/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('productoffer');

		if ($productoffer = Model_Productoffer::find($id))
		{
			$productoffer->delete();

			Session::set_flash('success', 'Deleted productoffer #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete productoffer #'.$id);
		}

		Response::redirect('dashboard');

	}

}
