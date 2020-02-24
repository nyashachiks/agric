<?php
class Controller_Unit extends Controller_Template
{

	public function action_index()
	{
		$data['units'] = Model_Unit::find('all');
		$this->template->title = "Units";
		$this->template->content = View::forge('unit/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('unit');

		if ( ! $data['unit'] = Model_Unit::find($id))
		{
			Session::set_flash('error', 'Could not find unit #'.$id);
			Response::redirect('unit');
		}

		$this->template->title = "Unit";
		$this->template->content = View::forge('unit/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Unit::validate('create');

			if ($val->run())
			{
				$unit = Model_Unit::forge(array(
					'name' => Input::post('name'),
				));

				if ($unit and $unit->save())
				{
					Session::set_flash('success', 'Added unit #'.$unit->id.'.');

					Response::redirect('unit');
				}

				else
				{
					Session::set_flash('error', 'Could not save unit.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Units";
		$this->template->content = View::forge('unit/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('unit');

		if ( ! $unit = Model_Unit::find($id))
		{
			Session::set_flash('error', 'Could not find unit #'.$id);
			Response::redirect('unit');
		}

		$val = Model_Unit::validate('edit');

		if ($val->run())
		{
			$unit->name = Input::post('name');

			if ($unit->save())
			{
				Session::set_flash('success', 'Updated unit #' . $id);

				Response::redirect('unit');
			}

			else
			{
				Session::set_flash('error', 'Could not update unit #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$unit->name = $val->validated('name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('unit', $unit, false);
		}

		$this->template->title = "Units";
		$this->template->content = View::forge('unit/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('unit');

		if ($unit = Model_Unit::find($id))
		{
			$unit->delete();

			Session::set_flash('success', 'Deleted unit #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete unit #'.$id);
		}

		Response::redirect('unit');

	}

}
