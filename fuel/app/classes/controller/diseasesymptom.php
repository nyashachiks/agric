<?php
class Controller_Diseasesymptom extends Controller_Template
{

	public function before()
	{
		parent::before();
		View::set_global('view_legend','Disease symptoms');
	}
	
	public function action_index()
	{
		$data['diseasesymptoms'] = Model_Diseasesymptom::find('all');
		$this->template->title = "Disease symptoms";
		$this->template->content = View::forge('diseasesymptom/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('diseasesymptom');

		if ( ! $data['diseasesymptom'] = Model_Diseasesymptom::find($id))
		{
			Session::set_flash('error', 'Could not find diseasesymptom #'.$id);
			Response::redirect('diseasesymptom');
		}

		$this->template->title = "Diseasesymptom";
		$this->template->content = View::forge('diseasesymptom/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Diseasesymptom::validate('create');

			if ($val->run())
			{
				$diseasesymptom = Model_Diseasesymptom::forge(array(
					'disease_id' => Input::post('disease_id'),
					'symptom_id' => Input::post('symptom_id'),
				));

				if ($diseasesymptom and $diseasesymptom->save())
				{
					Session::set_flash('success', 'Added diseasesymptom #'.$diseasesymptom->id.'.');

					Response::redirect('diseasesymptom');
				}

				else
				{
					Session::set_flash('error', 'Could not save diseasesymptom.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Diseasesymptoms";
		$this->template->content = View::forge('diseasesymptom/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('diseasesymptom');

		if ( ! $diseasesymptom = Model_Diseasesymptom::find($id))
		{
			Session::set_flash('error', 'Could not find diseasesymptom #'.$id);
			Response::redirect('diseasesymptom');
		}

		$val = Model_Diseasesymptom::validate('edit');

		if ($val->run())
		{
			$diseasesymptom->disease_id = Input::post('disease_id');
			$diseasesymptom->symptom_id = Input::post('symptom_id');

			if ($diseasesymptom->save())
			{
				Session::set_flash('success', 'Updated diseasesymptom #' . $id);

				Response::redirect('diseasesymptom');
			}

			else
			{
				Session::set_flash('error', 'Could not update diseasesymptom #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$diseasesymptom->disease_id = $val->validated('disease_id');
				$diseasesymptom->symptom_id = $val->validated('symptom_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('diseasesymptom', $diseasesymptom, false);
		}

		$this->template->title = "Diseasesymptoms";
		$this->template->content = View::forge('diseasesymptom/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('diseasesymptom');

		if ($diseasesymptom = Model_Diseasesymptom::find($id))
		{
			$diseasesymptom->delete();

			Session::set_flash('success', 'Deleted diseasesymptom #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete diseasesymptom #'.$id);
		}

		Response::redirect('diseasesymptom');

	}

}
