<?php
class Controller_Contractstart extends Controller_Template
{
	

	public function action_index()
	{
		$data['contractstarts'] = Model_Contractstart::find('all');
		$this->template->title = "Contractstarts";
		$this->template->content = View::forge('contractstart/index', $data);

	}
	public function action_index_tracker()
	{
		
		$aquery2 = DB::select(
					array('contracts.id', 'contract_id'),
					array('contracts.contractor_id', 'contractor_id'),
					array('contracts.loan_amount', 'loan_amount'),
					array('contracts.status', 'contract_status'),
					array('contractapplications.id', 'contractapplications_id'),
					array('contractapplications.farm_id', 'farm_id'),
					array('contractapplications.farmer_id', 'farmer_id'),
					array('contractapplications.year', 'year'),
					array('contractapplications.product_id', 'product_id'),
					array('contractapplications.size', 'size'),
					array('contractapplications.measure_unit', 'measure_unit')

					)->from('contracts');
		$aquery2->join('contractapplications');
		$aquery2->on('contracts.contractapplication_id', '=', 'contractapplications.id');
		$data['contracts']=$aquery2->where('contracts.contractor_id','=' , Auth::get_user_id()[1])->execute()->as_array();

		//$data['contracts']=$aquery2->where('contractapplications.farmer_id','=' , Auth::get_user_id()[1])->execute()->as_array();
		//$aquery2->where('contracts.status','=' , 'Pending');
		
		
		
		

		$this->template->title = "Contracts";
		$this->template->content = View::forge('contractstart/contract_tracker_mine', $data);

	}
	public function action_contractor_tracker()
	{
		
		$aquery2 = DB::select(
					array('contracts.id', 'contract_id'),
					array('contracts.contractor_id', 'contractor_id'),
					array('contracts.loan_amount', 'loan_amount'),
					array('contracts.status', 'contract_status'),
					array('contractapplications.id', 'contractapplications_id'),
					array('contractapplications.farm_id', 'farm_id'),
					array('contractapplications.farmer_id', 'farmer_id'),
					array('contractapplications.year', 'year'),
					array('contractapplications.product_id', 'product_id'),
					array('contractapplications.size', 'size'),
					array('contractapplications.measure_unit', 'measure_unit')

					)->from('contracts');
		$aquery2->join('contractapplications');
		$aquery2->on('contracts.contractapplication_id', '=', 'contractapplications.id');
		
		$data['contracts']=$aquery2->where('contracts.contractor_id','=' 
		, Auth::get_user_id()[1])->execute()->as_array();
		//$aquery2->where('contracts.status','=' , 'Pending');
		
		
		
		

		$this->template->title = "Contracts";
		$this->template->content = View::forge('contractstart/contractor_tracker', $data);

	}
	public function action_index_mine()
	{
		
		$aquery2 = DB::select(
					array('contracts.id', 'contract_id'),
					array('contracts.contractor_id', 'contractor_id'),
					array('contracts.loan_amount', 'loan_amount'),
					array('contracts.status', 'contract_status'),
					array('contractapplications.id', 'contractapplications_id'),
					array('contractapplications.farm_id', 'farm_id'),
					array('contractapplications.farmer_id', 'farmer_id'),
					array('contractapplications.year', 'year'),
					array('contractapplications.product_id', 'product_id'),
					array('contractapplications.size', 'size'),
					array('contractapplications.measure_unit', 'measure_unit')

					)->from('contracts');
		$aquery2->join('contractapplications');
		$aquery2->on('contracts.contractapplication_id', '=', 'contractapplications.id');
		
		//$data['contracts']=$aquery2->where('contractapplications.farmer_id','=' , Auth::get_user_id()[1])->execute()->as_array();
		$data['contracts']=$aquery2->where('contracts.contractor_id','=' , Auth::get_user_id()[1])->execute()->as_array();

		//$aquery2->where('contracts.status','=' , 'Approved');
		
		
		
		

		$this->template->title = "Contracts";
		$this->template->content = View::forge('contractstart/index_mine', $data);

	}
	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('contractstart');

		if ( ! $data['contractstart'] = Model_Contractstart::find($id))
		{
			Session::set_flash('error', 'Could not find contractstart #'.$id);
			Response::redirect('contractstart');
		}
		Session::set('duration',0);// ('duration',0);
		Session::set('contactApplicationId',$id);
		$this->template->set_global('contactApplicationId',$data['contractstart']->contract_id);
		Session::set_flash('cumulativeTotal',0);
		//$this->templete->set_global('cumulativeTotal',0);
		$this->template->title = "Contract Start";
		$this->template->content = View::forge('contractstart/view', $data);

	}
public function action_contractor_view($id = null)
	{
		is_null($id) and Response::redirect('contractstart');

		if ( ! $data['contractstart'] = Model_Contractstart::find($id))
		{
			Session::set_flash('error', 'Could not find contractstart #'.$id);
			Response::redirect('contractstart');
		}
		Session::set('duration',0);// ('duration',0);
		$this->template->set_global('contactApplicationId',$data['contractstart']->contract_id);
		Session::set_flash('cumulativeTotal',0);
		$this->template->set_global('contractor',TRUE);
		//Session::set('contractor',TRUE);// setting for contractor view
		$this->template->title = "Contract Start";
		$this->template->content = View::forge('contractstart/view', $data);

	}
	public function action_create($id=NULL)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Contractstart::validate('create');
		$date=	new DateTime(Input::post('startdate'));
		//date_timestamp_get($date);
		$date=date_timestamp_get($date);
			if ($val->run())
			{
				$contractstart = Model_Contractstart::forge(array(
					'contract_id' => Input::post('contract_id'),
					'startdate' => $date,
				));

				if ($contractstart and $contractstart->save())
				{
					Session::set_flash('success', 'Added contractstart #'.$contractstart->id.'.');

					Response::redirect('contractstart/view/'.$contractstart->id);
				}

				else
				{
					Session::set_flash('error', 'Could not save contractstart.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
		$this->template->set_global('contactApplicationId',$id);
		
		Session::set_flash('cumulativeTotal',0);
		$data['contractapplication']=Model_Contractapplication::find($id);
		$this->template->title = "Contract Start";
		$this->template->content = View::forge('contractstart/create',$data);

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('contractstart');

		if ( ! $contractstart = Model_Contractstart::find($id))
		{
			Session::set_flash('error', 'Could not find contractstart #'.$id);
			Response::redirect('contractstart');
		}

		$val = Model_Contractstart::validate('edit');

		if ($val->run())
		{
			$contractstart->contract_id = Input::post('contract_id');
			$contractstart->startdate = Input::post('startdate');

			if ($contractstart->save())
			{
				Session::set_flash('success', 'Updated contractstart #' . $id);

				Response::redirect('contractstart');
			}

			else
			{
				Session::set_flash('error', 'Could not update contractstart #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$contractstart->contract_id = $val->validated('contract_id');
				$contractstart->startdate = $val->validated('startdate');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('contractstart', $contractstart, false);
		}

		$this->template->title = "Contract Start";
		$this->template->content = View::forge('contractstart/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('contractstart');

		if ($contractstart = Model_Contractstart::find($id))
		{
			$contractstart->delete();

			Session::set_flash('success', 'Deleted contractstart #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete contractstart #'.$id);
		}

		Response::redirect('contractstart');

	}

}
