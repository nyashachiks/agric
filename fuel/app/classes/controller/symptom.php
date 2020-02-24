<?php
class Controller_Symptom extends Controller_Template
{

	public function action_index()
	{
		$data['symptoms'] = Model_Symptom::find('all');
		$this->template->title = "Symptoms";
		$this->template->content = View::forge('symptom/index', $data);

	}
	public function action_byid($product_id)
	{
		$arr=array();
		$diseases= Model_Disease::query()->where('product_id', $product_id)->get(); 
		{	
			foreach($diseases  as $disease)
			{	
				
				$diseasesymptoms = Model_Diseasesymptom:: query()->where('disease_id', $disease->id)->get(); 
				 
				foreach($diseasesymptoms  as $diseasesymptom)
				{
					
					$arr[$diseasesymptom->symptom->id] =$diseasesymptom->symptom->description;
				}
			}
		}
		
		return json_encode($arr);
						
	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('symptom');

		if ( ! $data['symptom'] = Model_Symptom::find($id))
		{
			Session::set_flash('error', 'Could not find symptom #'.$id);
			Response::redirect('symptom');
		}

		$this->template->title = "Symptom";
		$this->template->content = View::forge('symptom/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Symptom::validate('create');

			if ($val->run())
			{
				$symptom = Model_Symptom::forge(array(
					'description' => Input::post('description')
				));

				if ($symptom and $symptom->save())
				{
					Session::set_flash('success', 'Added symptom #'.$symptom->id.'.');

					Response::redirect('symptom');
				}

				else
				{
					Session::set_flash('error', 'Could not save symptom.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Symptoms";
		$this->template->content = View::forge('symptom/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('symptom');

		if ( ! $symptom = Model_Symptom::find($id))
		{
			Session::set_flash('error', 'Could not find symptom #'.$id);
			Response::redirect('symptom');
		}

		$val = Model_Symptom::validate('edit');

		if ($val->run())
		{
			$symptom->description = Input::post('description');
			

			if ($symptom->save())
			{
				Session::set_flash('success', 'Updated symptom #' . $id);

				Response::redirect('symptom');
			}

			else
			{
				Session::set_flash('error', 'Could not update symptom #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$symptom->description = $val->validated('description');
				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('symptom', $symptom, false);
		}

		$this->template->title = "Symptoms";
		$this->template->content = View::forge('symptom/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('symptom');

		if ($symptom = Model_Symptom::find($id))
		{
			$symptom->delete();

			Session::set_flash('success', 'Deleted symptom #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete symptom #'.$id);
		}

		Response::redirect('symptom');

	}

}
