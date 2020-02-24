<?php
class Controller_Testjo extends Controller_Template
{

	public function action_index()
	{
		$data['testjos'] = Model_Testjo::find_all();
		$this->template->title = "Testjos";
		$this->template->content = View::forge('testjo/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('testjo');

		$data['testjo'] = Model_Testjo::find_by_pk($id);

		$this->template->title = "Testjo";
		$this->template->content = View::forge('testjo/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Testjo::validate('create');

			if ($val->run())
			{
				$testjo = Model_Testjo::forge(array(
					'name' => Input::post('name'),
					'id' => Input::post('id'),
					'address' => Input::post('address'),
				));

				if ($testjo and $testjo->save())
				{
					Session::set_flash('success', 'Added testjo #'.$testjo->id.'.');
					Response::redirect('testjo');
				}
				else
				{
					Session::set_flash('error', 'Could not save testjo.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Testjos";
		$this->template->content = View::forge('testjo/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('testjo');

		$testjo = Model_Testjo::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Testjo::validate('edit');

			if ($val->run())
			{
				$testjo->name = Input::post('name');
				$testjo->id = Input::post('id');
				$testjo->address = Input::post('address');

				if ($testjo->save())
				{
					Session::set_flash('success', 'Updated testjo #'.$id);
					Response::redirect('testjo');
				}
				else
				{
					Session::set_flash('error', 'Nothing updated.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->set_global('testjo', $testjo, false);
		$this->template->title = "Testjos";
		$this->template->content = View::forge('testjo/edit');

	}

	public function action_delete($id = null)
	{
		if ($testjo = Model_Testjo::find_one_by_id($id))
		{
			$testjo->delete();

			Session::set_flash('success', 'Deleted testjo #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete testjo #'.$id);
		}

		Response::redirect('testjo');

	}

}
