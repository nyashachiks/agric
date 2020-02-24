<?php
class Controller_Seasonfarming extends Controller_Template
{

	public function action_index()
	{
		$data['seasonfarmings'] = Model_Seasonfarming::find('all');
		$this->template->title = "Season Farmings";
		$this->template->content = View::forge('seasonfarming/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('seasonfarming');

		if ( ! $data['seasonfarming'] = Model_Seasonfarming::find($id))
		{
			Session::set_flash('error', 'Could not find season farming #'.$id);
			Response::redirect('seasonfarming');
		}

		$this->template->title = "Season Farming";
		$this->template->content = View::forge('seasonfarming/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Seasonfarming::validate('create');

			if ($val->run())
			{
				$seasonfarming = Model_Seasonfarming::forge(array(
					'contract_id' => Input::post('contract_id'),
					'expectedyield' => Input::post('expectedyield'),
					'actualyield' => Input::post('actualyield'),
									));

				if ($seasonfarming and $seasonfarming->save())
				{
					Session::set_flash('success', 'Added season farming #'.$seasonfarming->id.'.');

					Response::redirect('seasonfarming');
				}

				else
				{
					Session::set_flash('error', 'Could not save season farming.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Season farming";
		$this->template->content = View::forge('seasonfarming/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('seasonfarming');

		if ( ! $seasonfarming = Model_Seasonfarming::find($id))
		{
			Session::set_flash('error', 'Could not find season farming #'.$id);
			Response::redirect('seasonfarming');
		}

		$val = Model_Seasonfarming::validate('edit');

		if ($val->run())
		{
			$seasonfarming->contract_id = Input::post('contract_id');
			$seasonfarming->expectedyield = Input::post('expectedyield');
			$seasonfarming->actualyield = Input::post('actualyield');

			if ($seasonfarming->save())
			{
				Session::set_flash('success', 'Updated season farming #' . $id);

				Response::redirect('seasonfarming');
			}

			else
			{
				Session::set_flash('error', 'Could not update seasonfarming #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$seasonfarming->contract_id = Input::post('contract_id');
				$seasonfarming->expectedyield = Input::post('expectedyield');
				$seasonfarming->actualyield = Input::post('actualyield');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('seasonfarming', $seasonfarming, false);
		}

		$this->template->title = "Season farming";
		$this->template->content = View::forge('seasonfarming/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('seasonfarming');

		if ($seasonfarming = Model_Seasonfarming::find($id))
		{
			$seasonfarming->delete();

			Session::set_flash('success', 'Deleted season farming #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete season farming #'.$id);
		}

		Response::redirect('seasonfarming');

	}

}
