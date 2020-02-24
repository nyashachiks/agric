<?php
class Controller_Disease extends Controller_Template
{

	public function before()
{
	parent::before();
	View::set_global('view_legend','Diseases');
}

	public function action_index()
	{
		$data['diseases'] = Model_Disease::find('all');
		$this->template->title = "Diseases";
		$this->template->content = View::forge('disease/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('disease');

		if ( ! $data['disease'] = Model_Disease::find($id))
		{
			Session::set_flash('error', 'Could not find disease #'.$id);
			Response::redirect('disease');
		}

		$this->template->title = "Disease";
		$this->template->content = View::forge('disease/view', $data);

	}
	
		public function action_searchResults()
	{
		$diseases	= array();
		$diseases1	= array();
		$diseases2	= array();
		$symptom1_id	= Input::post('symptom_id1');
		$symptom2_id	= Input::post('symptom_id2');
		$product_id		= Input::post('product_id');
		$diseasesymptoms1 = Model_Diseasesymptom:: query()->where('symptom_id', $symptom1_id)->get();
		$same	=	FALSE;
		foreach($diseasesymptoms1 as $diseasesymptom)
		{
			$diseases[]=$diseasesymptom->disease;
		}
		
		if((intval($symptom1_id)<>intval($symptom2_id))&& (intval($symptom2_id)>0))
		{
			$diseasesymptoms2 = Model_Diseasesymptom:: query()->where('symptom_id', $symptom2_id)->get();
			foreach($diseasesymptoms2 as $adiseasesymptom)
			{
				$diseases1[]=$adiseasesymptom->disease;
			}
		
			foreach($diseases as $adisease)
			{
				foreach($diseases1 as $disease)
				{
					if($adisease->id==$disease->id)
					{
						$diseases=$diseases1;
						$same=TRUE;
					}
				}
			}
				
			if($same==FALSE)
			{
				foreach($diseases1 as $disease)
				{
					$diseases[]=$disease;
				}
			}
			
			
		}
		
		$diseases2=$diseases;
		unset($diseases); 
		$diseases = array();
		foreach($diseases2 as $disease)
		{ 
			
			if($disease->product_id==$product_id)
			{	
				$diseases[]=$disease;
			}
			
		}
		
		$this->template->set_global('diseases',$diseases);
		$this->template->title = "Search Results";
		$this->template->content = View::forge('disease/searchResults');

	}
/*	public function action_searchResults()
	{
		$diseases	= array();
		$diseases1	= array();
		$symptom1_id	= Input::post('symptom_id1');
		$symptom2_id	= Input::post('symptom_id2');
		$diseasesymptoms1 = Model_Diseasesymptom:: query()->where('symptom_id', $symptom1_id)->get();
		$same	=	FALSE;
		foreach($diseasesymptoms1 as $diseasesymptom)
		{
			$diseases[]=$diseasesymptom->disease;
		}
		
		if((intval($symptom1_id)<>intval($symptom2_id))&& (intval($symptom2_id)>0))
		{
			$diseasesymptoms2 = Model_Diseasesymptom:: query()->where('symptom_id', $symptom2_id)->get();
			foreach($diseasesymptoms2 as $adiseasesymptom)
			{
				$diseases1[]=$adiseasesymptom->disease;
			}
		
			foreach($diseases as $adisease)
			{
				foreach($diseases1 as $disease)
				{
					if($adisease->id==$disease->id)
					{
						$diseases=$diseases1;
						$same=TRUE;
					}
				}
			}
				
			if($same==FALSE)
			{
				foreach($diseases1 as $disease)
				{
					$diseases[]=$disease;
				}
			}
		}
		
		
		$this->template->set_global('diseases',$diseases);
		$this->template->title = "Search Results";
		$this->template->content = View::forge('disease/searchResults');

	}*/
	public function action_search()
	{
		$data['diseases'] = Model_Disease::find('all');
		$this->template->title = "Search Diseases";
		$this->template->content = View::forge('disease/search', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Disease::validate('create');

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
					//Debug::dump($_FILES);die;
					if($_FILES['dis_pic']['size'] == 0){
						Session::set_flash('error',"Please select a picture for your raw material. Its required.");
						Response::redirect(Input::referrer());
					}

					$tmpext      = explode(".", $_FILES['dis_pic']['name']);
					$file_ext	 =  ".".$tmpext[1];

					//in DB
					$save_name = md5(time()); 
				
					//save the image to approp dir
					$config = array(
					    'path'   => DOCROOT.'/assets/img/disease',
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
				$disease = Model_Disease::forge(array(
					'name' => Input::post('name'),
					'description' => Input::post('description'),
					'product_id' => Input::post('product_id'),
					'image_name' =>  $save_name.$file_ext,
				));

				if ($disease and $disease->save())
				{
					Session::set_flash('success', 'Added disease #'.$disease->id.'.');

					Response::redirect('disease');
				}

				else
				{
					Session::set_flash('error', 'Could not save disease.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Diseases";
		$this->template->content = View::forge('disease/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('disease');

		if ( ! $disease = Model_Disease::find($id))
		{
			Session::set_flash('error', 'Could not find disease #'.$id);
			Response::redirect('disease');
		}

		$val = Model_Disease::validate('edit');

		if ($val->run())
		{
			$disease->name = Input::post('name');
			$disease->description = Input::post('description');
			$disease->product_id = Input::post('product_id');

			if ($disease->save())
			{
				Session::set_flash('success', 'Updated disease #' . $id);

				Response::redirect('disease');
			}

			else
			{
				Session::set_flash('error', 'Could not update disease #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$disease->name = $val->validated('name');
				$disease->description = $val->validated('description');
				$disease->product_id = $val->validated('product_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('disease', $disease, false);
		}

		$this->template->title = "Diseases";
		$this->template->content = View::forge('disease/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('disease');

		if ($disease = Model_Disease::find($id))
		{
			$disease->delete();

			Session::set_flash('success', 'Deleted disease #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete disease #'.$id);
		}

		Response::redirect('disease');

	}

}
