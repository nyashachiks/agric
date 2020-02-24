<?php
class Controller_Material extends Controller_Template
{

	public function action_index()
	{
		$data['materials'] = Model_Material::find('all');
		$this->template->title = "Materials";
		$this->template->content = View::forge('material/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('material');

		if ( ! $data['material'] = Model_Material::find($id))
		{
			Session::set_flash('error', 'Could not find material #'.$id);
			Response::redirect('material');
		}

		$this->template->title = "Material";
		$this->template->content = View::forge('material/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Material::validate('create');

			if ($val->run())
			{
				$material = Model_Material::forge(array(
					'code' => Input::post('code'),
					'description' => Input::post('description'),
				));

				if ($material and $material->save())
				{
					Session::set_flash('success', 'Added material #'.$material->id.'.');

					Response::redirect('material');
				}

				else
				{
					Session::set_flash('error', 'Could not save material.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Materials";
		$this->template->content = View::forge('material/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('material');

		if ( ! $material = Model_Material::find($id))
		{
			Session::set_flash('error', 'Could not find material #'.$id);
			Response::redirect('material');
		}

		$val = Model_Material::validate('edit');

		if ($val->run())
		{
			$material->code = Input::post('code');
			$material->description = Input::post('description');

			if ($material->save())
			{
				Session::set_flash('success', 'Updated material #' . $id);

				Response::redirect('material');
			}

			else
			{
				Session::set_flash('error', 'Could not update material #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$material->code = $val->validated('code');
				$material->description = $val->validated('description');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('material', $material, false);
		}

		$this->template->title = "Materials";
		$this->template->content = View::forge('material/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('material');

		if ($material = Model_Material::find($id))
		{
			$material->delete();

			Session::set_flash('success', 'Deleted material #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete material #'.$id);
		}

		Response::redirect('material');

	}

}
