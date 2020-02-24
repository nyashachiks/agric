<?php
class Controller_Contractquantities extends Controller_Template
{

	public function action_index()
	{
		$data['contractquantities'] = Model_Contractquantity::find('all');
		$this->template->title = "Contractquantities";
		$this->template->content = View::forge('contractquantities/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('contractquantities');

		if ( ! $data['contractquantity'] = Model_Contractquantity::find($id))
		{
			Session::set_flash('error', 'Could not find contractquantity #'.$id);
			Response::redirect('contractquantities');
		}

		$this->template->title = "Contractquantity";
		$this->template->content = View::forge('contractquantities/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
				for($x=0;$x<count(Input::post('qty'));$x++)
				{
					//delete pre-existing
					$contractquantity=Model_Contractquantity::query()
					->where('contractapplication_id',Input::post('contractapplication_id'))
					->where('projectStagesTasksVariableCost_id', 
					Input::post('projectStagesTasksVariableCost_id')[$x])
					->get();
					if($contractquantity!=NULL)
						{
							foreach($contractquantity as $item)
								$item->delete();
						}
					
					$contractquantity = Model_Contractquantity::forge(array(
					'contractapplication_id' => Input::post('contractapplication_id'),
					'projectStagesTasksVariableCost_id' => 
					Input::post('projectStagesTasksVariableCost_id')[$x],
					'quantities' => Input::post('qty')[$x],
					//'disburse'=>Input::post('disburse')[$x],
					));
					$contractquantity->save();
				}	
				Response::redirect('contract/createcontract/'.
				Input::post('contractapplication_id'));
				
		}

		$this->template->title = "Contractquantities";
		$this->template->content = View::forge('contractquantities/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('contractquantities');

		if ( ! $contractquantity = Model_Contractquantity::find($id))
		{
			Session::set_flash('error', 'Could not find contractquantity #'.$id);
			Response::redirect('contractquantities');
		}

		$val = Model_Contractquantity::validate('edit');

		if ($val->run())
		{
			$contractquantity->contractapplication_id = Input::post('contractapplication_id');
			$contractquantity->projectStagesTasksVariableCost_id = 
			Input::post('projectStagesTasksVariableCost_id');
			$contractquantity->quantities = Input::post('quantities');

			if ($contractquantity->save())
			{
				Session::set_flash('success', 'Updated contractquantity #' . $id);

				Response::redirect('contractquantities');
			}

			else
			{
				Session::set_flash('error', 'Could not update contractquantity #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$contractquantity->contract_id = $val->validated('contract_id');
				$contractquantity->product_id = $val->validated('product_id');
				$contractquantity->quantities = $val->validated('quantities');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('contractquantity', $contractquantity, false);
		}

		$this->template->title = "Contractquantities";
		$this->template->content = View::forge('contractquantities/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('contractquantities');

		if ($contractquantity = Model_Contractquantity::find($id))
		{
			$contractquantity->delete();

			Session::set_flash('success', 'Deleted contractquantity #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete contractquantity #'.$id);
		}

		Response::redirect('contractquantities');

	}

}
