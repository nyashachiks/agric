<?php
class Controller_Productoffer extends Controller_Base
{

	public function before()
	{
		parent::before();
		View::set_global('view_legend','Product offers');
	}
	public function action_index()
	{
		//lets accomodate a search
		$query =  Model_Productoffer::query();
		
		if(!empty($_GET)){
			$prod_name 	= Input::get('name');
			$market_id  =  Input::get('market_id');
			$product_id =  Input::get('product_id');
			
			if(!empty($prod_name)) 	
				$query->related('product') -> where('product.name','like',"%{$prod_name}%");
			if(!empty($product_id)) $query->where('product_id','=',$product_id);
			if(!empty($market_id))	$query->where('market_id',$market_id);
			
		}
		$offers = $query->where('quantity_left','>', 0)->where('farmer_id','<>', Auth::get_user_id()[1])->get();
		$data['productoffers'] = $offers;
		
		$this->template->title = "Productoffers";
		$this->template->content = View::forge('productoffer/index', $data);

	}
	public function action_index_admin()
	{
		$productoffer=Model_Productoffer::find('all');
		$this->template->title="Product";
		$this->template->content = View::forge('productoffer/index_admin', $productoffer);
	}
	public function action_index_mine()
	{
		$query =  Model_Productoffer::query();
		
		if(!empty($_GET)){
			$prod_name 	= Input::get('name');
			$market_id  =  Input::get('market_id');
			$product_id =  Input::get('product_id');
			
			if(!empty($prod_name)) 	
				$query->related('product') -> where('product.name','like',"%{$prod_name}%");
			if(!empty($product_id)) $query->where('product_id','=',$product_id);
			if(!empty($market_id))	$query->where('market_id',$market_id);
			
		}
		$offers = $query->where('farmer_id','=', Auth::get_user_id()[1])->get();
		
		//$myproductoffers = Model_Productoffer::find_by('farmer_id', Auth::get_user_id()[1]);
		$this->template->set_global('productoffers', $offers);
		$this->template->title="Your products on offer";
		$this->template->content = View::forge('productoffer/index_mine');
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
					
			if ($val->run())
				{
					//product upload
					$uploaded = false;
					
					//has the file been uploaded?
					if($_FILES['product_pic']['size'] == 0){
						Session::set_flash('error',"Please select a picture for your product. Its required.");
						Response::redirect(Input::referrer());
					}

					$tmpext      = explode(".", $_FILES['product_pic']['name']);
					$file_ext	 =  ".".$tmpext[1];

					//in DB
					$save_name = md5(time()); 
				
					//save the image to approp dir
					$config = array(
					    'path'   => DOCROOT.'/assets/img/productoffer',
					    'randomize'     => false,
					    'ext_whitelist' => array('png','jpg','jpeg'),
					    'overwrite'   => true,
					    'auto_rename' => false,
					    'new_name' 	  => $save_name,
					);

					Upload::process($config);
					
					if (Upload::is_valid())
					{
					    Upload::save();
					    $uploaded = true;
					}
					else
					{
						Session::set_flash('error',"Image for the product could not be uploaded");
					}					
					//end product upload
					
					$productoffer = Model_Productoffer::forge(array(
						'product_id' => Input::post('product_id'),
						'farmer_id' => Input::post('farmer_id'),
						'market_id' => Input::post('market_id'),
						'price' => Input::post('price'),
						'offer_description' => Input::post('offer_description'),
						'quanity' => Input::post('quanity'),
						'min_quantity' => Input::post('min_quantity'),
						'quantity_left' => Input::post('quanity'),
						'status' => Input::post('status'),
						'product_status' => Input::post('product_status'),
						'count' => Input::post('count'),
						'image_name' => $save_name.$file_ext,
					));

					if ($productoffer and $productoffer->save())
					{
						Session::set_flash('success', 'Your offer has been created successfully.');
						Response::redirect('productoffer/index_mine');
					}

					else
					{
						Session::set_flash('error', 'We could not create your product offer at the moment. Please try again');
					}
				}
				else
				{
					Session::set_flash('error', $val->error());
				}
		}

		$this->template->title = "Create a product offer";
		$this->template->content = View::forge('productoffer/create');

	}
	public function action_agri_edit($id = null)
	{
		is_null($id) and Response::redirect('productoffer');

		if ( ! $productoffer = Model_Productoffer::find($id))
		{
			Session::set_flash('error', 'Could not find productoffer');
			Response::redirect('dashboard/agri');
			//Response::redirect('productoffer/index_mine');
		}
		
		
		$val = Model_Productoffer::validate('edit');

		if ($val->run())
		{	
			$productoffer->product_status=$_POST['product_status'];
			
			if ($productoffer->save())
			{
				Session::set_flash('success', 'Updated productoffer');
				Response::redirect('dashboard/agri');
			}

			else
			{
				Session::set_flash('error', 'Could not update productoffer');
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
			Session::set_flash('error', 'Could not find the product offer');
			Response::redirect('dashboard');
		}

		$val = Model_Productoffer::validate('edit');

		if ($val->run())
		{
			$productoffer->product_id = Input::post('product_id');
			$productoffer->farmer_id = Input::post('farmer_id');
			$productoffer->market_id = Input::post('market_id');
			$productoffer->price = Input::post('price');
			$productoffer->offer_description = Input::post('offer_description');
			$productoffer->quanity = Input::post('quanity');
			$productoffer->min_quantity = Input::post('min_quantity');
			$productoffer->quantity_left = Input::post('quantity_left');
			$productoffer->status = Input::post('status');
			$productoffer->product_status = Input::post('product_status');
			$productoffer->count = Input::post('count');
			
			//lets upload and replace the image.
			$old_img = $productoffer->image_name;
			//product upload
			$uploaded = false;

			$tmpext      = explode(".", $_FILES['product_pic']['name']);
			$file_ext	 =  ".".@$tmpext[1];

			//in DB
			$save_name = md5(time()); 
		
			//save the image to uploads/cvs
			$config = array(
			    'path'   		=> DOCROOT.'/assets/img/productoffer',
			    'randomize'     => false,
			    'ext_whitelist' => array('png','jpg','jpeg'),
			    'overwrite'   => true,
			    'auto_rename' => false,
			    'new_name' 	  => $save_name,
			);

			Upload::process($config);
			
			if (Upload::is_valid() && !empty($tmpext))
			{
			    Upload::save();
			    $uploaded = true;
			    $productoffer->image_name = $save_name.$file_ext;
			}
			
			if ($productoffer->save())
			{
				Session::set_flash('success', 'Updated product offer successfully');
				Response::redirect('productoffer/index_mine');
			}
			else
			{
				Session::set_flash('error', 'Could not update productoffer');
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
				$productoffer->offer_description = $val->validated('offer_description');
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

			Session::set_flash('success', 'Product offer deleted successfully.');
		}

		else
		{
			Session::set_flash('error', 'Could not delete productoffer');
		}

		Response::redirect(Input::referrer());

	}

}
