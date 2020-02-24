<?php
class Controller_Stakeholder_Product extends Controller_Template
{

	public function action_index()
	{
		list(, $userid) = Auth::get_user_id();
		$data['stakeholder_Products'] = Model_Stakeholder_Product::query()
		->where('userid',$userid)->get();
		$this->template->title = "Stakeholder_Products";
		$this->template->content = View::forge('stakeholder/product/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('stakeholder/product');

		if ( ! $data['stakeholder_Product'] = Model_Stakeholder_Product::find($id))
		{
			Session::set_flash('error', 'Could not find stakeholder_Product #'.$id);
			Response::redirect('stakeholder/product');
		}

		$this->template->title = "Stakeholder_Product";
		$this->template->content = View::forge('stakeholder/product/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Stakeholder_Product::validate('create');

			if ($val->run())
			{
				list(, $userid) = Auth::get_user_id();
				$file=Custom_Filehandler::upload(TRUE); //calling file upload function
				$stakeholder_Product = Model_Stakeholder_Product::forge(array(
					'tradingname'=>Input::post('tradingname'),
					'name' => Input::post('name'),
					'description' => Input::post('description'),
					'pic' =>$file[0]['saved_as'],
					'additional_details' => Input::post('additional_details'),
					'userid'=>$userid,
				));

				if ($stakeholder_Product and $stakeholder_Product->save())
				{
					Session::set_flash('success', 'Added stakeholder_Product #'.$stakeholder_Product->id.'.');

					Response::redirect('stakeholder/product');
				}

				else
				{
					Session::set_flash('error', 'Could not save stakeholder_Product.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Stakeholder_Products";
		$this->template->content = View::forge('stakeholder/product/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('stakeholder/product');

		if ( ! $stakeholder_Product = Model_Stakeholder_Product::find($id))
		{
			Session::set_flash('error', 'Could not find stakeholder_Product #'.$id);
			Response::redirect('stakeholder/product');
		}

		$val = Model_Stakeholder_Product::validate('edit');

		if ($val->run())
		{
			$stakeholder_Product->name = Input::post('name');
			$stakeholder_Product->description = Input::post('description');
			$stakeholder_Product->pic = Input::post('pic');
			$stakeholder_Product->additional_details = Input::post('additional_details');

			if ($stakeholder_Product->save())
			{
				Session::set_flash('success', 'Updated stakeholder_Product #' . $id);

				Response::redirect('stakeholder/product');
			}

			else
			{
				Session::set_flash('error', 'Could not update stakeholder_Product #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$stakeholder_Product->name = $val->validated('name');
				$stakeholder_Product->description = $val->validated('description');
				$stakeholder_Product->pic = $val->validated('pic');
				$stakeholder_Product->additional_details = $val->validated('additional_details');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('stakeholder_Product', $stakeholder_Product, false);
		}

		$this->template->title = "Stakeholder_Products";
		$this->template->content = View::forge('stakeholder/product/edit');

	}
	public function action_viewserviceoffer($id = null)
	{
		is_null($id) and Response::redirect('stakeholder/product/serviceoffer');

		if ( ! $data['productoffer'] = Model_Stakeholder_Product::find($id))
		{
			Session::set_flash('error', 'Could not find serviceoffer #'.$id);
			Response::redirect('dashboard');
		}

		$this->template->title = "Product Offer";
		$this->template->content = View::forge('stakeholder/product/viewservice', $data);

	}
public function action_serviceoffer()
	{
		//lets accomodate a search
		$query =  Model_Stakeholder_Product::query();
		$data=[];
		if(!empty($_GET)){
			$prod_name 	= Input::get('name');
			$market_id  =  Input::get('market_id');
			//$product_id =  Input::get('product_id');
			
			if(!empty($prod_name)) 	
				{
					$query-> where('name','like',"%{$prod_name}%");
					$data['prod_name']=$prod_name;
				}
			if(!empty($market_id)){
					$query->where('tradingname','like',"{$market_id}%");
					$data['market_id']=$market_id;
			}
		
			
		}

		$data['servicesoffered'] = $query->get();// $offers;
		
		$this->template->title = "Productoffers";
		$this->template->content = View::forge('stakeholder/product/serviceoffer', $data);

	}
	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('stakeholder/product');

		if ($stakeholder_Product = Model_Stakeholder_Product::find($id))
		{
			$stakeholder_Product->delete();

			Session::set_flash('success', 'Deleted stakeholder_Product #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete stakeholder_Product #'.$id);
		}

		Response::redirect('stakeholder/product');

	}

}
