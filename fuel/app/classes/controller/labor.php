<?php
class Controller_Labor extends Controller_Template
{

	public function before()
	{
		parent::before();
		View::set_global('view_legend','Labour');
	}
	
	public function action_index()
	{
		
		$data['labors'] = Model_Labor::find('all');
		$this->template->title = "Labors";
		$this->template->content = View::forge('labor/index', $data);

	}
	public function action_indexview()
	{
		$data['labors'] =Model_Labor::query()->where('laborer_id','<>', Auth::get_user_id()[1])->get();
		$this->template->title = "Labors";
		$this->template->content = View::forge('labor/indexview', $data);

	}
	public function action_indexmine()
	{
		$data['mylabors'] = Model_Labor::find_by('laborer_id',  Auth::get_user_id()[1]);
		$this->template->title = "Labors";
		$this->template->content = View::forge('labor/indexmine', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('labor');

		if ( ! $data['labor'] = Model_Labor::find($id))
		{
			Session::set_flash('error', 'Could not find labor #'.$id);
			Response::redirect('labor');
		}

		$this->template->title = "Labor";
		$this->template->content = View::forge('labor/view', $data);

	}
	
	public function action_viewonly($id = null)
	{
		is_null($id) and Response::redirect('labor');

		if ( ! $data['labor'] = Model_Labor::find($id))
		{
			Session::set_flash('error', 'Could not find labor #'.$id);
			Response::redirect('labor');
		}

		$this->template->title = "Labor";
		$this->template->content = View::forge('labor/viewonly', $data);

	}

	public function action_create()
	{
		
			
		if (Input::method() == 'POST')
		{
			
			$val = Model_Labor::validate('create');
			
					
			if ($val->run())
			{
				
				$file=Custom_Filehandler::upload(); //calling file upload function
				
							
				$labor = Model_Labor::forge(array(
					'skill_name' => Input::post('skill_name'),
					'rate' => Input::post('rate'),
					'rate_time' => Input::post('rate_time'),
					'description' => Input::post('description'),
					'laborer_id' => Input::post('laborer_id'),
					'saved_as' => $file[0]['saved_as'],
					'actual_name'=>$file[0]['name'],
				));

				if ($labor and $labor->save())
				{ 	
					Session::set_flash('success', 'Skillset added successfully');

					Response::redirect('labor/indexmine');
				}

				else
				{
					
					Session::set_flash('error', 'Could not save labor.');
				}
			}
			else
			{
				
				Session::set_flash('error', $val->error());
				
			}
		}

		$this->template->title = "Labors";
		$this->template->content = View::forge('labor/create');

	}

	public function action_download($id=null)
	{
		$labor = Model_Labor::find($id);
		Custom_Filehandler::filedownload($labor->saved_as, $labor->actual_name);
	}
	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('dashboard');

		if ( ! $labor = Model_Labor::find($id))
		{
			Session::set_flash('error', 'Could not find record');
			Response::redirect('dashboard');
		}

		$val = Model_Labor::validate('edit');

		if ($val->run())
		{
			$file=Custom_Filehandler::upload(); //calling file upload function
			
			$labor->skill_name = Input::post('skill_name');
			$labor->rate = Input::post('rate');
			$labor->rate_time = Input::post('rate_time');
			$labor->saved_as = $file[0]['saved_as'];
			$labor->actual_name = $file[0]['name'];
			$labor->laborer_id = Input::post('laborer_id');
			$labor->description = Input::post('description');

			if ($labor->save())
			{
				Session::set_flash('success', 'Skillset updated successfully');

				Response::redirect('labor/indexmine');
			}

			else
			{
				Session::set_flash('error', 'Could not update labor');
			}
		}

		else
		{
				
			if (Input::method() == 'POST')
			{
				$labor->skill_name = $val->validated('skill_name');
				$labor->rate = $val->validated('rate');
				$labor->rate_time = $val->validated('rate_time');
				$labor->saved_as = $val->validated('saved_as');
				$labor->actual_name = $val->validated('actual_name');
				$labor->laborer_id = $val->validated('laborer_id');
				$labor->description = $val->validated('description');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('labor', $labor, false);
		}

		$this->template->title = "Labors";
		$this->template->content = View::forge('labor/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('dashboard');

		if ($labor = Model_Labor::find($id))
		{
			$labor->delete();

			Session::set_flash('success', 'Deleted labor');
		}

		else
		{
			Session::set_flash('error', 'Could not delete labor');
		}

		Response::redirect('labor/indexmine');

	}

}
