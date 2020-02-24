<?php
class Controller_Producttype extends Controller_Template
{

	public function action_index()
	{
		$data['producttypes'] = Model_Producttype::find('all');
		$this->template->title = "Producttypes";
		$this->template->content = View::forge('producttype/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('producttype');

		if ( ! $data['producttype'] = Model_Producttype::find($id))
		{
			Session::set_flash('error', 'Could not find producttype #'.$id);
			Response::redirect('producttype');
		}

		$this->template->title = "Producttype";
		$this->template->content = View::forge('producttype/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Producttype::validate('create');

			if ($val->run())
			{
				$producttype = Model_Producttype::forge(array(
					'name' => Input::post('name'),
					'description' => Input::post('description'),
				));

				if ($producttype and $producttype->save())
				{
					Session::set_flash('success', 'Added producttype #'.$producttype->id.'.');

					Response::redirect('producttype');
				}

				else
				{
					Session::set_flash('error', 'Could not save producttype.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Producttypes";
		$this->template->content = View::forge('producttype/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('producttype');

		if ( ! $producttype = Model_Producttype::find($id))
		{
			Session::set_flash('error', 'Could not find producttype #'.$id);
			Response::redirect('producttype');
		}

		$val = Model_Producttype::validate('edit');

		if ($val->run())
		{
			$producttype->name = Input::post('name');
			$producttype->description = Input::post('description');

			if ($producttype->save())
			{
				Session::set_flash('success', 'Updated producttype #' . $id);

				Response::redirect('producttype');
			}

			else
			{
				Session::set_flash('error', 'Could not update producttype #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$producttype->name = $val->validated('name');
				$producttype->description = $val->validated('description');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('producttype', $producttype, false);
		}

		$this->template->title = "Producttypes";
		$this->template->content = View::forge('producttype/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('producttype');

		if ($producttype = Model_Producttype::find($id))
		{
			$producttype->delete();

			Session::set_flash('success', 'Deleted producttype #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete producttype #'.$id);
		}

		Response::redirect('producttype');

	}

}
