<?php
class Controller_Logistic extends Controller_Base
{

	public function before(){
		parent::before();
		View::set_global('view_legend','Logistics');
	}
	
	public function action_index()
	{
		$data['logistics'] = Model_Logistic::find('all');
		$this->template->title = "Logistics";
		$this->template->content = View::forge('logistic/index', $data);

	}
	public function action_indexview()
	{
		$data['logistics'] =Model_Logistic::query()->where('supplier_id','<>', Auth::get_user_id()[1])->get();
		$this->template->title = "Logistics";
		$this->template->content = View::forge('logistic/indexview', $data);

	}

	public function action_indexmine()
	{
		$data['mylogistics'] = Model_Logistic::find_by('supplier_id',  Auth::get_user_id()[1]);
		$this->template->title = "Logistics";
		$this->template->content = View::forge('logistic/indexmine', $data);

	}
	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('logistic');

		if ( ! $data['logistic'] = Model_Logistic::find($id))
		{
			Session::set_flash('error', 'Could not find logistic #'.$id);
			Response::redirect('logistic');
		}

		$this->template->title = "Logistic";
		$this->template->content = View::forge('logistic/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			
			$val = Model_Logistic::validate('create');
			
			if ($val->run())
			{
				$logistic = Model_Logistic::forge(array(
					'equipmentname' => Input::post('equipmentname'),
					'capacity' => Input::post('capacity'),
					'rateperhour' => Input::post('rateperhour'),
					'description' => Input::post('description'),
					'supplier_id' => Input::post('supplier_id'),
				));

				if ($logistic and $logistic->save())
				{
					Session::set_flash('success', 'Added logistic successfully');
					Response::redirect('logistic/indexmine');
				}

				else
				{
					//Session::set_flash('error', 'Could not save logistic.');
				}
			}
			else
			{
				//Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Logistics";
		$this->template->content = View::forge('logistic/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('logistic');

		if ( ! $logistic = Model_Logistic::find($id))
		{
			Session::set_flash('error', 'Could not find logistic #'.$id);
			Response::redirect('logistic');
		}

		$val = Model_Logistic::validate('edit');

		if ($val->run())
		{
			$logistic->equipmentname = Input::post('equipmentname');
			$logistic->capacity = Input::post('capacity');
			$logistic->rateperhour = Input::post('rateperhour');
			$logistic->description = Input::post('description');
			$logistic->supplier_id = Input::post('supplier_id');

			if ($logistic->save())
			{
				Session::set_flash('success', 'Updated logistic');
				Response::redirect('logistic/indexmine');
			}
			else
			{
				Session::set_flash('error', 'Could not update logistic');
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$logistic->equipmentname = $val->validated('equipmentname');
				$logistic->capacity = $val->validated('capacity');
				$logistic->rateperhour = $val->validated('rateperhour');
				$logistic->description = $val->validated('description');
				$logistic->supplier_id = $val->validated('supplier_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('logistic', $logistic, false);
		}

		$this->template->title = "Logistics";
		$this->template->content = View::forge('logistic/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('logistic');

		if ($logistic = Model_Logistic::find($id))
		{
			$logistic->delete();

			Session::set_flash('success', 'Logistic deleted successfully.');
		}

		else
		{
			Session::set_flash('error', 'Could not delete logistic.');
		}

		Response::redirect('logistic');

	}

}
