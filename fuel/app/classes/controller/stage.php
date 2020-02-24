<?php
class Controller_Stage extends Controller_Template
{
public function action_allstages()
	{
		$data['stages'] = Model_Stage::find('all');
		$this->template->title = "Stages";
		$this->template->content = View::forge('stage/allstages', $data);

	}
	public function action_index()
	{
		$data['stages'] = Model_Stage::find('all');
		$this->template->title = "Stages";
		$this->template->content = View::forge('stage/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('stage');

		if ( ! $data['stage'] = Model_Stage::find($id))
		{
			Session::set_flash('error', 'Could not find stage #'.$id);
			Response::redirect('stage');
		}

		$this->template->title = "Stage";
		$this->template->content = View::forge('stage/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Stage::validate('create');

			if ($val->run())
			{
				$stage = Model_Stage::forge(array(
					'name' => Input::post('name'),
				));

				if ($stage and $stage->save())
				{
					Session::set_flash('success', 'Added stage #'.$stage->id.'.');

					Response::redirect('stage');
				}

				else
				{
					Session::set_flash('error', 'Could not save stage.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Stages";
		$this->template->content = View::forge('stage/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('stage');

		if ( ! $stage = Model_Stage::find($id))
		{
			Session::set_flash('error', 'Could not find stage #'.$id);
			Response::redirect('stage');
		}

		$val = Model_Stage::validate('edit');

		if ($val->run())
		{
			$stage->name = Input::post('name');

			if ($stage->save())
			{
				Session::set_flash('success', 'Updated stage #' . $id);

				Response::redirect('stage');
			}

			else
			{
				Session::set_flash('error', 'Could not update stage #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$stage->name = $val->validated('name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('stage', $stage, false);
		}

		$this->template->title = "Stages";
		$this->template->content = View::forge('stage/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('stage');

		if ($stage = Model_Stage::find($id))
		{
			$stage->delete();

			Session::set_flash('success', 'Deleted stage #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete stage #'.$id);
		}

		Response::redirect('stage');

	}

}
