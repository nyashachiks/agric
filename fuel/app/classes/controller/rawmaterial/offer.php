<?php
class Controller_Rawmaterial_Offer extends Controller_Template
{

		public function action_index()
	{
		//lets accomodate a search
		$query =  Model_Rawmaterial_Offer::query();
		
		
		if(!empty($_GET)){
			$prod_name 	= Input::get('name');
			$raw_material_id =  Input::get('raw_material_id');
			
			if(!empty($prod_name)) 	
				$query->related('raw_material') -> where('brand_name','like',"%{$prod_name}%");
			if(!empty($raw_material_id)) $query->where('raw_material_id','=',$raw_material_id);
			
			
		}
		$offers = $query->where('quantity_left','>', 0)->where('seller_id','<>', Auth::get_user_id()[1])->get();
		$data['rawmaterial_offers'] = $offers;
		
		$this->template->title = "Raw Material Offers";
		$this->template->content = View::forge('rawmaterial/offer/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('rawmaterial/offer');

		if ( ! $data['rawmaterial_offer'] = Model_Rawmaterial_Offer::find($id))
		{
			Session::set_flash('error', 'Could not find rawmaterial_offer #'.$id);
			Response::redirect('rawmaterial/offer');
		}

		$this->template->title = "Raw Material Offers";
		$this->template->content = View::forge('rawmaterial/offer/view', $data);

	}
	
	public function action_agri_edit($id = null)
	{
		is_null($id) and Response::redirect('rawmaterial_offer');

		if ( ! $rawmaterial_offer = Model_Rawmaterial_Offer::find($id))
		{
			Session::set_flash('error', 'Could not find  raw material offer');
			Response::redirect('dashboard/agri');
			
		}
		
		
		$val = Model_Rawmaterial_Offer::validate('edit');

		if ($val->run())
		{	
			$rawmaterial_offer->raw_material_status=$_POST['raw_material_status'];
			
			if ($rawmaterial_offer->save())
			{
				Session::set_flash('success', 'Updated Raw Material offer');
				Response::redirect('dashboard/agri');
			}

			else
			{
				Session::set_flash('error', 'Could not update raw material offer');
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				
				$raw_material->raw_material_status=$_POST['raw_material_status'];
				

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('rawmaterial_offer', $rawmaterial_offer, false);
		}

		$this->template->title = "Product Offer";
		$this->template->content = View::forge('rawmaterial/offer/agri_edit');
	}
	public function action_agri_view($id = null)
	{
		is_null($id) and Response::redirect('rawmaterial_offer');

		if ( ! $data['rawmaterial_offer'] = Model_Rawmaterial_Offer::find($id))
		{
			Session::set_flash('error', 'Could not find offer #'.$id);
			Response::redirect('dashboard');
		}

		$this->template->title = "Raw Material Offer";
		$this->template->content = View::forge('rawmaterial/offer/agri_view', $data);
	}
	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Rawmaterial_Offer::validate('create');

			if ($val->run())
			{
				//upload the image.
					//1. hash the filename to current time, update the record
					//2. move the uploaded file to assets/images/rawmaterial
					// -- when displaying the image, we also need a default in case the uploaded cant be read
					//    for any reason
					
					
					//product upload
					$uploaded = false;
					
					//has the file been uploaded?
					if($_FILES['raw_pic']['size'] == 0){
						Session::set_flash('error',"Please select a picture for your raw material. Its required.");
						Response::redirect(Input::referrer());
					}

					$tmpext      = explode(".", $_FILES['raw_pic']['name']);
					$file_ext	 =  ".".$tmpext[1];

					//in DB
					$save_name = md5(time()); 
				
					//save the image to approp dir
					$config = array(
					    'path'   => DOCROOT.'/assets/img/rawmaterial',
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
						Session::set_flash('error',"Image for the raw material could not be uploaded");
					}					
					//end raw material upload
				
				$rawmaterial_offer = Model_Rawmaterial_Offer::forge(array(
					'raw_material_id' => Input::post('raw_material_id'),
					'seller_id' => Input::post('seller_id'),
					'brand_name' => Input::post('brand_name'),
					'price' => Input::post('price'),
					'offer_dscription' => Input::post('offer_dscription'),
					'quantity' => Input::post('quantity'),
					'quantity_left' => Input::post('quantity'),
					'status' => Input::post('status'),
					'raw_matrial_status' => Input::post('raw_matrial_status'),
					'count' => Input::post('count'),
					'image_name' =>  $save_name.$file_ext,
				));

				if ($rawmaterial_offer and $rawmaterial_offer->save())
				{
					
					//Session::set_flash('success', 'Added rawmaterial_offer #'.$rawmaterial_offer->id.'.');
					Response::redirect('rawmaterial/offer/index_mine');
				}

				else
				{
					Session::set_flash('error', 'Could not save rawmaterial_offer.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Raw Material Offers";
		$this->template->content = View::forge('rawmaterial/offer/create');

	}
	public function action_index_mine()
	{
		$query =  Model_Rawmaterial_Offer::query();
		
		if(!empty($_GET)){
			$prod_name 	= Input::get('name');
			$raw_material_id =  Input::get('raw_material_id');
			
			if(!empty($prod_name)) 	
				$query->related('raw_material') -> where('brand_name','like',"%{$prod_name}%");
			if(!empty($raw_material_id)) $query->where('raw_material_id','=',$raw_material_id);
			
			
		}
		$rawmaterial_offers = $query->where('seller_id','=', Auth::get_user_id()[1])->get();
		
		$this->template->set_global('rawmaterial_offers', $rawmaterial_offers);
		$this->template->title="Your products on offer";
		$this->template->content = View::forge('rawmaterial/offer/index_mine');
	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('rawmaterial/offer');

		if ( ! $rawmaterial_offer = Model_Rawmaterial_Offer::find($id))
		{
			Session::set_flash('error', 'Could not find rawmaterial_offer #'.$id);
			Response::redirect('rawmaterial/offer');
		}

		$val = Model_Rawmaterial_Offer::validate('edit');

		if ($val->run())
		{
			$rawmaterial_offer->raw_material_id = Input::post('raw_material_id');
			$rawmaterial_offer->seller_id = Input::post('seller_id');
			$rawmaterial_offer->brand_name =  Input::post('brand_name');
			$rawmaterial_offer->price = Input::post('price');
			$rawmaterial_offer->offer_dscription = Input::post('offer_dscription');
			$rawmaterial_offer->quantity = Input::post('quantity');
			$rawmaterial_offer->quantity_left = Input::post('quantity_left');
			$rawmaterial_offer->status = Input::post('status');
			$rawmaterial_offer->raw_matrial_status = Input::post('raw_matrial_status');
			$rawmaterial_offer->count = Input::post('count');
			$rawmaterial_offer->image_name = Input::post('image_name');

			if ($rawmaterial_offer->save())
			{
				Session::set_flash('success', 'Updated rawmaterial_offer #' . $id);

				Response::redirect('rawmaterial/offer');
			}

			else
			{
				Session::set_flash('error', 'Could not update rawmaterial_offer #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$rawmaterial_offer->raw_material_id = $val->validated('raw_material_id');
				$rawmaterial_offer->seller_id = $val->validated('seller_id');
				$rawmaterial_offer->brand_name =  $val->validated('brand_name');
				$rawmaterial_offer->price = $val->validated('price');
				$rawmaterial_offer->offer_dscription = $val->validated('offer_dscription');
				$rawmaterial_offer->quantity = $val->validated('quantity');
				$rawmaterial_offer->quantity_left = $val->validated('quantity_left');
				$rawmaterial_offer->status = $val->validated('status');
				$rawmaterial_offer->raw_matrial_status = $val->validated('raw_matrial_status');
				$rawmaterial_offer->count = $val->validated('count');
				$rawmaterial_offer->image_name = $val->validated('image_name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('rawmaterial_offer', $rawmaterial_offer, false);
		}

		$this->template->title = "Raw Material Offers";
		$this->template->content = View::forge('rawmaterial/offer/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('rawmaterial/offer');

		if ($rawmaterial_offer = Model_Rawmaterial_Offer::find($id))
		{
			$rawmaterial_offer->delete();

			Session::set_flash('success', 'Deleted rawmaterial_offer #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete rawmaterial_offer #'.$id);
		}

		Response::redirect('rawmaterial/offer');

	}

}
