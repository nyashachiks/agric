<?php
class Controller_Contracttracker extends Controller_Base
{

	public function action_index($id)
	{
		$data['contactApplicationId']=Session::get('contactApplicationId');
		$data['project_stage_task_id']=$id;
		$data['contracttrackers'] = Model_Contracttracker::query()
		->where('project_stage_task_id',$id)
		->get();
		$this->template->title = "Contracts Tracker";
		$this->template->content = View::forge('contracttracker/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('contracttracker');

		if ( ! $data['contracttracker'] = Model_Contracttracker::find($id))
		{
			Session::set_flash('error', 'Could not find contracttracker #'.$id);
			Response::redirect('contracttracker');
		}

		$this->template->title = "Contract Tracker";
		$this->template->content = View::forge('contracttracker/view', $data);

	}

	public function action_create($contactApplicationId=null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Contracttracker::validate('create');

			if ($val->run())
			{
				$file=Custom_Filehandler::upload(TRUE); //calling file upload function
				$save_as="";
				$picturename="";
				if(!is_null($file))
				{
					$save_as=$file[0]['saved_as'];
					$picturename=$file[0]['name'];
				}
				
				$date=	new DateTime(Input::post('enddate'));
		//date_timestamp_get($date);
		$date=date_timestamp_get($date);
				$contracttracker = Model_Contracttracker::forge(array(
					'project_stage_task_id' => Input::post('contract_id'),
					'enddate' => $date,
					'notes' => Input::post('notes'),
					'picture' => $picturename,
					'picture_saved_as'=>$save_as,
					'status'=>Input::post('status'),
				));

				if ($contracttracker and $contracttracker->save())
				{
					Session::set_flash('success', 'Added contracttracker #'.$contracttracker->id.'.');

					Response::redirect('contracttracker/index/'.$contactApplicationId);
				}

				else
				{
					Session::set_flash('error', 'Could not save contracttracker.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
		$this->template->set_global('contactApplicationId',$contactApplicationId);
		//$data['contactApplicationId']=$contactApplicationId;
		$this->template->title = "Contract Tracker";
		$this->template->content = View::forge('contracttracker/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('contracttracker');

		if ( ! $contracttracker = Model_Contracttracker::find($id))
		{
			Session::set_flash('error', 'Could not find contracttracker #'.$id);
			Response::redirect('contracttracker');
		}

		$val = Model_Contracttracker::validate('edit');

		if ($val->run())
		{
			$contracttracker->project_stage_task_id = Input::post('contract_id');
			$contracttracker->enddate = Input::post('enddate');
			$contracttracker->notes = Input::post('notes');
			$contracttracker->picture = Input::post('picture');

			if ($contracttracker->save())
			{
				Session::set_flash('success', 'Updated contracttracker #' . $id);

				Response::redirect('contracttracker');
			}

			else
			{
				Session::set_flash('error', 'Could not update contracttracker #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$contracttracker->project_stage_task_id = $val->validated('contract_id');
				$contracttracker->enddate = $val->validated('enddate');
				$contracttracker->notes = $val->validated('notes');
				$contracttracker->picture = $val->validated('picture');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('contracttracker', $contracttracker, false);
		}

		$this->template->title = "Contract Tracker";
		$this->template->content = View::forge('contracttracker/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('contracttracker');

		if ($contracttracker = Model_Contracttracker::find($id))
		{
			$contracttracker->delete();

			Session::set_flash('success', 'Deleted contracttracker #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete contracttracker #'.$id);
		}

		Response::redirect('contracttracker');

	}

}
