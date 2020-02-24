<?php
class Controller_Variablecosts extends Controller_Template
{

	public function action_index()
	{
		$data['variablecosts'] = Model_Variablecost::find('all');
		$this->template->title = "Variablecosts";
		$this->template->content = View::forge('variablecosts/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('variablecosts');

		if ( ! $data['variablecost'] = Model_Variablecost::find($id))
		{
			Session::set_flash('error', 'Could not find variablecost #'.$id);
			Response::redirect('variablecosts');
		}

		$this->template->title = "Variablecost";
		$this->template->content = View::forge('variablecosts/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Variablecost::validate('create');

			if ($val->run())
			{
				$variablecost = Model_Variablecost::forge(array(
					'name' => Input::post('name'),
					'unit'=>Input::post('unit'),
					'disbursed'=>Input::post('disbursed'),
				));

				if ($variablecost and $variablecost->save())
				{
					Session::set_flash('success', 'Added variablecost #'.$variablecost->id.'.');

					Response::redirect('variablecosts');
				}

				else
				{
					Session::set_flash('error', 'Could not save variablecost.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Variablecosts";
		$this->template->content = View::forge('variablecosts/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('variablecosts');

		if ( ! $variablecost = Model_Variablecost::find($id))
		{
			Session::set_flash('error', 'Could not find variablecost #'.$id);
			Response::redirect('variablecosts');
		}

		$val = Model_Variablecost::validate('edit');

		if ($val->run())
		{
			$variablecost->name = Input::post('name');
			$variablecost->unit=Input::post('unit');
			$variablecost->disbursed=Input::post('disbursed');
			

			if ($variablecost->save())
			{
				Session::set_flash('success', 'Updated variablecost #' . $id);

				Response::redirect('variablecosts');
			}

			else
			{
				Session::set_flash('error', 'Could not update variablecost #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$variablecost->name = $val->validated('name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('variablecost', $variablecost, false);
		}

		$this->template->title = "Variablecosts";
		$this->template->content = View::forge('variablecosts/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('variablecosts');

		if ($variablecost = Model_Variablecost::find($id))
		{
			$variablecost->delete();

			Session::set_flash('success', 'Deleted variablecost #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete variablecost #'.$id);
		}

		Response::redirect('variablecosts');

	}

}
