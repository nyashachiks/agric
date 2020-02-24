<?php
class Controller_Registration extends Controller_Template
{

	public function action_index()
	{
		$data['registrations'] = Model_Registration::find('all');
		$this->template->title = "Registrations";
		$this->template->content = View::forge('registration/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('registration');

		if ( ! $data['registration'] = Model_Registration::find($id))
		{
			Session::set_flash('error', 'Could not find registration #'.$id);
			Response::redirect('registration');
		}

		$this->template->title = "Registration";
		$this->template->content = View::forge('registration/view', $data);

	}
	

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Registration::validate('create');

			if ($val->run())
			{
				$registration = Model_Registration::forge(array(
					'user_id' => Input::post('user_id'),
					'amount' => Input::post('amount'),
					'narrative' => Input::post('narrative'),
					'status' => Input::post('status'),
					'browseurl' => Input::post('browseurl'),
					'pollurl' => Input::post('pollurl'),
					'paynowref' => Input::post('paynowref'),
					'paymentstatus' => Input::post('paymentstatus'),
					'mobile' => Input::post('mobile'),
				));

				if ($registration and $registration->save())
				{
					Session::set_flash('success', 'Added registration #'.$registration->id.'.');

					Response::redirect('registration');
				}

				else
				{
					Session::set_flash('error', 'Could not save registration.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Registrations";
		$this->template->content = View::forge('registration/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('registration');

		if ( ! $registration = Model_Registration::find($id))
		{
			Session::set_flash('error', 'Could not find registration #'.$id);
			Response::redirect('registration');
		}

		$val = Model_Registration::validate('edit');

		if ($val->run())
		{
			$registration->user_id = Input::post('user_id');
			$registration->amount = Input::post('amount');
			$registration->narrative = Input::post('narrative');
			$registration->status = Input::post('status');
			$registration->browseurl = Input::post('browseurl');
			$registration->pollurl = Input::post('pollurl');
			$registration->paynowref = Input::post('paynowref');
			$registration->paymentstatus = Input::post('paymentstatus');
			$registration->mobile = Input::post('mobile');

			if ($registration->save())
			{
				Session::set_flash('success', 'Updated registration #' . $id);

				Response::redirect('registration');
			}

			else
			{
				Session::set_flash('error', 'Could not update registration #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$registration->user_id = $val->validated('user_id');
				$registration->amount = $val->validated('amount');
				$registration->narrative = $val->validated('narrative');
				$registration->status = $val->validated('status');
				$registration->browseurl = $val->validated('browseurl');
				$registration->pollurl = $val->validated('pollurl');
				$registration->paynowref = $val->validated('paynowref');
				$registration->paymentstatus = $val->validated('paymentstatus');
				$registration->mobile = $val->validated('mobile');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('registration', $registration, false);
		}

		$this->template->title = "Registrations";
		$this->template->content = View::forge('registration/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('registration');

		if ($registration = Model_Registration::find($id))
		{
			$registration->delete();

			Session::set_flash('success', 'Deleted registration #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete registration #'.$id);
		}

		Response::redirect('registration');

	}

}
