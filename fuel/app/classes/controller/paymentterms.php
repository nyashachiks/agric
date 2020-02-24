<?php
class Controller_Paymentterms extends Controller_Template
{

	public function action_index()
	{
		$data['paymentterms'] = Model_Paymentterm::find('all');
		$this->template->title = "Paymentterms";
		$this->template->content = View::forge('paymentterms/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('paymentterms');

		if ( ! $data['paymentterm'] = Model_Paymentterm::find($id))
		{
			Session::set_flash('error', 'Could not find paymentterm #'.$id);
			Response::redirect('paymentterms');
		}

		$this->template->title = "Paymentterm";
		$this->template->content = View::forge('paymentterms/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Paymentterm::validate('create');

			if ($val->run())
			{
				$paymentterm = Model_Paymentterm::forge(array(
					'code' => Input::post('code'),
					'description' => Input::post('description'),
				));

				if ($paymentterm and $paymentterm->save())
				{
					Session::set_flash('success', 'Added paymentterm #'.$paymentterm->id.'.');

					Response::redirect('paymentterms');
				}

				else
				{
					Session::set_flash('error', 'Could not save paymentterm.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Paymentterms";
		$this->template->content = View::forge('paymentterms/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('paymentterms');

		if ( ! $paymentterm = Model_Paymentterm::find($id))
		{
			Session::set_flash('error', 'Could not find paymentterm #'.$id);
			Response::redirect('paymentterms');
		}

		$val = Model_Paymentterm::validate('edit');

		if ($val->run())
		{
			$paymentterm->code = Input::post('code');
			$paymentterm->description = Input::post('description');

			if ($paymentterm->save())
			{
				Session::set_flash('success', 'Updated paymentterm #' . $id);

				Response::redirect('paymentterms');
			}

			else
			{
				Session::set_flash('error', 'Could not update paymentterm #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$paymentterm->code = $val->validated('code');
				$paymentterm->description = $val->validated('description');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('paymentterm', $paymentterm, false);
		}

		$this->template->title = "Paymentterms";
		$this->template->content = View::forge('paymentterms/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('paymentterms');

		if ($paymentterm = Model_Paymentterm::find($id))
		{
			$paymentterm->delete();

			Session::set_flash('success', 'Deleted paymentterm #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete paymentterm #'.$id);
		}

		Response::redirect('paymentterms');

	}

}
