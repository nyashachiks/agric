<?php
class Controller_Raw_Material extends Controller_Template
{

	public function action_index()
	{
		$data['raw_materials'] = Model_Raw_Material::find('all');
		$this->template->title = "Raw_materials";
		$this->template->content = View::forge('raw/material/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('raw/material');

		if ( ! $data['raw_material'] = Model_Raw_Material::find($id))
		{
			Session::set_flash('error', 'Could not find raw_material #'.$id);
			Response::redirect('raw/material');
		}

		$this->template->title = "Raw_material";
		$this->template->content = View::forge('raw/material/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Raw_Material::validate('create');

			if ($val->run())
			{
				$raw_material = Model_Raw_Material::forge(array(
					'name' => Input::post('name'),
					'description' => Input::post('description'),
					'measurement_id' => Input::post('measurement_id'),
				));

				if ($raw_material and $raw_material->save())
				{
					Session::set_flash('success', 'Added raw_material #'.$raw_material->id.'.');

					Response::redirect('raw/material');
				}

				else
				{
					Session::set_flash('error', 'Could not save raw_material.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Raw_Materials";
		$this->template->content = View::forge('raw/material/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('raw/material');

		if ( ! $raw_material = Model_Raw_Material::find($id))
		{
			Session::set_flash('error', 'Could not find raw_material #'.$id);
			Response::redirect('raw/material');
		}

		$val = Model_Raw_Material::validate('edit');

		if ($val->run())
		{
			$raw_material->name = Input::post('name');
			$raw_material->description = Input::post('description');
			$raw_material->measurement_id = Input::post('measurement_id');

			if ($raw_material->save())
			{
				Session::set_flash('success', 'Updated raw_material #' . $id);

				Response::redirect('raw/material');
			}

			else
			{
				Session::set_flash('error', 'Could not update raw_material #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$raw_material->name = $val->validated('name');
				$raw_material->description = $val->validated('description');
				$raw_material->measurement_id = $val->validated('measurement_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('raw_material', $raw_material, false);
		}

		$this->template->title = "Raw_materials";
		$this->template->content = View::forge('raw/material/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('raw/material');

		if ($raw_material = Model_Raw_Material::find($id))
		{
			$raw_material->delete();

			Session::set_flash('success', 'Deleted raw_material #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete raw_material #'.$id);
		}

		Response::redirect('raw/material');

	}

}
