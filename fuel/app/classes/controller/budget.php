<?php
class Controller_Budget extends Controller_Template
{

	public function before()
	{
		parent::before();
		View::set_global('view_legend','Budgets');
	}
	
	public function action_index()
	{
		$data['budgets'] = Model_Budget::find('all');
		$this->template->title = "Budgets";
		$this->template->content = View::forge('budget/index', $data);

	}
	public function action_viewindex()
	{
		$data['budgets'] = Model_Budget::find('all');
		$this->template->title = "Budgets";
		$this->template->content = View::forge('budget/viewindex', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('budget');

		if ( ! $data['budget'] = Model_Budget::find($id))
		{
			Session::set_flash('error', 'Could not find budget #'.$id);
			Response::redirect('budget');
		}
		$data['activities'] = Model_Activity::query()->where('budget_id',$id)->get();
		//Session::set('activities', $activities);
		$this->template->title = "Budget";
		$this->template->content = View::forge('budget/view', $data);

	}
	
	public function action_viewprint($id = null)
	{
		is_null($id) and Response::redirect('budget');

		if ( ! $data['budget'] = Model_Budget::find($id))
		{
			Session::set_flash('error', 'Could not find budget #'.$id);
			Response::redirect('budget');
		}
		$data['activities'] = Model_Activity::query()->where('budget_id',$id)->get();
		//Session::set('activities', $activities);
		$this->template->title = "Budget";
		$this->template->content = View::forge('budget/viewprint_accordian', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Budget::validate('create');

			if ($val->run())
			{
				$budget = Model_Budget::forge(array(
					'name' => Input::post('name'),
					'product' => Input::post('product'),
					'region' => Input::post('region'),
					'soiltype' => Input::post('soiltype'),
					'user_id' => Input::post('user_id'),
				));

				if ($budget and $budget->save())
				{
					Session::set_flash('success', 'Added budget #'.$budget->id.'.');

					Response::redirect('dashboard/agri');
				}

				else
				{
					Session::set_flash('error', 'Could not save budget.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Budgets";
		$this->template->content = View::forge('budget/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('budget');

		if ( ! $budget = Model_Budget::find($id))
		{
			Session::set_flash('error', 'Could not find budget #'.$id);
			Response::redirect('budget');
		}

		$val = Model_Budget::validate('edit');

		if ($val->run())
		{
			$budget->name = Input::post('name');
			$budget->product = Input::post('product');
			$budget->region = Input::post('region');
			$budget->soiltype = Input::post('soiltype');
			$budget->user_id = Input::post('user_id');

			if ($budget->save())
			{
				Session::set_flash('success', 'Updated budget #' . $id);

				Response::redirect('budget');
			}

			else
			{
				Session::set_flash('error', 'Could not update budget #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$budget->name = $val->validated('name');
				$budget->product = $val->validated('product');
				$budget->region = $val->validated('region');
				$budget->soiltype = $val->validated('soiltype');
				$budget->user_id = $val->validated('user_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('budget', $budget, false);
		}
		
		$this->template->title = "Budgets";
		$this->template->content = View::forge('budget/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('budget');

		if ($budget = Model_Budget::find($id))
		{
			$budget->delete();

			Session::set_flash('success', 'Deleted budget #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete budget #'.$id);
		}

		Response::redirect('budget');

	}

}
