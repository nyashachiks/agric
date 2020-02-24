<?php
class Controller_Contract_Disburse extends Controller_Template
{

	public function action_index()
	{
		$data['contract_disburses'] = Model_Contract_Disburse::find('all');
		$this->template->title = "Contract_disburses";
		$this->template->content = View::forge('contract/disburse/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('contract/disburse');

		if ( ! $data['contract_disburse'] = Model_Contract_Disburse::find($id))
		{
			Session::set_flash('error', 'Could not find contract_disburse #'.$id);
			Response::redirect('contract/disburse');
		}

		$this->template->title = "Contract_disburse";
		$this->template->content = View::forge('contract/disburse/view', $data);

	}

	public function action_create($contractID)
	{
	try{
		if (Input::method() == 'POST')
		{
			list(, $userid) = Auth::get_user_id();
			foreach(Input::post('disburse') as $item)
			{
				$arr=explode('_',$item);
				$costID=$arr[0];
				$quantitiesID=$arr[1];	
				
				$contract_disburse = Model_Contract_Disburse::forge(array(
					'contractquantities_id' => $quantitiesID,// Input::post('contractquantities_id'),
					'userdisbursed' => $userid,
					'date' => Input::post('date'.$costID),
					'quantities' => Input::post('qty'.$costID),
				));	
				
				$contract_disburse->save();
			}
			Session::set_flash('success', ' Successfully disbursed inputs.');

			Response::redirect('contract/contractor_indexmine');
		
			}
		}
		catch(Exception $e)
		{
			//Debug::dump($e->getMessage());die;
			Session::set_flash('error',"Please tick products you want to disburse");	
			Response::redirect('contract/view_mine/'.$contractID);
		}

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('contract/disburse');

		if ( ! $contract_disburse = Model_Contract_Disburse::find($id))
		{
			Session::set_flash('error', 'Could not find contract_disburse #'.$id);
			Response::redirect('contract/disburse');
		}

		$val = Model_Contract_Disburse::validate('edit');

		if ($val->run())
		{
			$contract_disburse->contractquantities_id = Input::post('contractquantities_id');
			$contract_disburse->userdisbursed = Input::post('userdisbursed');
			$contract_disburse->date = Input::post('date');
			$contract_disburse->quantities = Input::post('quantities');

			if ($contract_disburse->save())
			{
				Session::set_flash('success', 'Updated contract_disburse #' . $id);

				Response::redirect('contract/disburse');
			}

			else
			{
				Session::set_flash('error', 'Could not update contract_disburse #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$contract_disburse->contractquantities_id = $val->validated('contractquantities_id');
				$contract_disburse->userdisbursed = $val->validated('userdisbursed');
				$contract_disburse->date = $val->validated('date');
				$contract_disburse->quantities = $val->validated('quantities');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('contract_disburse', $contract_disburse, false);
		}

		$this->template->title = "Contract_disburses";
		$this->template->content = View::forge('contract/disburse/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('contract/disburse');

		if ($contract_disburse = Model_Contract_Disburse::find($id))
		{
			$contract_disburse->delete();

			Session::set_flash('success', 'Deleted contract_disburse #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete contract_disburse #'.$id);
		}

		Response::redirect('contract/disburse');

	}

}
