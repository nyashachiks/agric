<?php
class Controller_Vid extends Controller_Template
{

	public function action_index()
	{
		$data['vids'] = Model_Vid::find('all');
		$this->template->title = "Vids";
		$this->template->content = View::forge('vid/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('vid');

		if ( ! $data['vid'] = Model_Vid::find($id))
		{
			Session::set_flash('error', 'Could not find vid #'.$id);
			Response::redirect('vid');
		}

		$this->template->title = "Vid";
		$this->template->content = View::forge('vid/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Vid::validate('create');

			if ($val->run())
			{
				$vid = Model_Vid::forge(array(
					'national_id' => Input::post('national_id'),
					'details' => Input::post('details'),
					'license_type' => Input::post('license_type'),
					'amount' => Input::post('amount'),
				));

				if ($vid and $vid->save())
				{
					Session::set_flash('success', 'Added vid #'.$vid->id.'.');

					Response::redirect('vid');
				}

				else
				{
					Session::set_flash('error', 'Could not save vid.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Vids";
		$this->template->content = View::forge('vid/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('vid');

		if ( ! $vid = Model_Vid::find($id))
		{
			Session::set_flash('error', 'Could not find vid #'.$id);
			Response::redirect('vid');
		}

		$val = Model_Vid::validate('edit');

		if ($val->run())
		{
			$vid->national_id = Input::post('national_id');
			$vid->details = Input::post('details');
			$vid->license_type = Input::post('license_type');
			$vid->amount = Input::post('amount');

			if ($vid->save())
			{
				Session::set_flash('success', 'Updated vid #' . $id);

				Response::redirect('vid');
			}

			else
			{
				Session::set_flash('error', 'Could not update vid #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$vid->national_id = $val->validated('national_id');
				$vid->details = $val->validated('details');
				$vid->license_type = $val->validated('license_type');
				$vid->amount = $val->validated('amount');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('vid', $vid, false);
		}

		$this->template->title = "Vids";
		$this->template->content = View::forge('vid/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('vid');

		if ($vid = Model_Vid::find($id))
		{
			$vid->delete();

			Session::set_flash('success', 'Deleted vid #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete vid #'.$id);
		}

		Response::redirect('vid');

	}

}
