<?php
class Controller_Profilepic extends Controller_Base
{

	public function action_index()
	{
		
		Response::redirect('dashboard');

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('profilepic');

		if ( ! $data['profilepic'] = Model_Profilepic::find($id))
		{
			Session::set_flash('error', 'Could not find profilepic #'.$id);
			Response::redirect('profilepic');
		}

		$this->template->title = "Profilepic";
		$this->template->content = View::forge('profilepic/view', $data);

	}
	public function action_create()
	{
		try{
		if (Input::method() == 'POST')
		{
			$val = Model_Profilepic::validate('create');
			
			if ($val->run())
			{
					
				$file=Custom_Filehandler::upload(TRUE); //calling file upload function
				$document = Model_Profilepic::forge(array(
					'user_id' => Auth::get_user_id()[1],
					//'description' => Input::post('description'),
					'saved_as' => $file[0]['saved_as'],
					'actual_name' => $file[0]['name'],
				));

				if ($document and $document->save())
				{
					Session::set_flash('success', 'Document added successfully');

					Response::redirect('profilepic');
				}

				else
				{
					Session::set_flash('error', 'Could not save document.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
		}
		catch(Exception $e)
		{
			Session::set_flash('error',$e->getMessage());
			
		}	

		$this->template->title = "Profile picture";
		$this->template->content = View::forge('profilepic/create');;

	}


	public function action_create2()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Profilepic::validate('create');

			if ($val->run())
			{
				$profilepic = Model_Profilepic::forge(array(
					'user_id' => Input::post('user_id'),
					'saved_as' => Input::post('saved_as'),
					'actual_name' => Input::post('actual_name'),
				));

				if ($profilepic and $profilepic->save())
				{
					Session::set_flash('success', 'Added profilepic #'.$profilepic->id.'.');

					Response::redirect('profilepic');
				}

				else
				{
					Session::set_flash('error', 'Could not save profilepic.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Profilepics";
		$this->template->content = View::forge('profilepic/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('profilepic');

		if ( ! $profilepic = Model_Profilepic::find($id))
		{
			Session::set_flash('error', 'Could not find profilepic #'.$id);
			Response::redirect('profilepic');
		}

		$val = Model_Profilepic::validate('edit');

		if ($val->run())
		{
			$profilepic->user_id = Input::post('user_id');
			$profilepic->saved_as = Input::post('saved_as');
			$profilepic->actual_name = Input::post('actual_name');

			if ($profilepic->save())
			{
				Session::set_flash('success', 'Updated profilepic #' . $id);

				Response::redirect('profilepic');
			}

			else
			{
				Session::set_flash('error', 'Could not update profilepic #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$profilepic->user_id = $val->validated('user_id');
				$profilepic->saved_as = $val->validated('saved_as');
				$profilepic->actual_name = $val->validated('actual_name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('profilepic', $profilepic, false);
		}

		$this->template->title = "Profilepics";
		$this->template->content = View::forge('profilepic/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('profilepic');

		if ($profilepic = Model_Profilepic::find($id))
		{
			$profilepic->delete();

			Session::set_flash('success', 'Deleted profilepic #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete profilepic #'.$id);
		}

		Response::redirect('profilepic');

	}

}
