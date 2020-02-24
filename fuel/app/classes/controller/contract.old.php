<?php
class Controller_Contract extends Controller_Base
{
	public function before()
	{
		parent::before();
		View::set_global('view_legend','Contracts');
	}
	
	public function action_index()
	{
		$data['contracts'] = Model_Contract::find('all');
		$this->template->title = "Contracts";
		$this->template->content = View::forge('contract/index', $data);

	}
	public function action_contractors()
	{
		$role=Auth\Model\Auth_Role::query()->where('name','contractor')->get();
		/*there is only one farmer role, so looping in it to extract users*/
		$data['users']='';
		foreach($role as $item)
		{
			$data['users']=($item->users);
			break;
			
		}
		$this->template->title = "Agents";
		$this->template->content = View::forge('contract/contractors', $data);

	}
	public function action_search_page()
	{
		if(Input::method() == 'POST')
		{
			$year = Input::post('year');
			
			$season = Input::post('season_id');
			
			$product = Input::post('product_id');
			
			$contracts1 = Model_Contract::find('all');
			$contracts=array();
			if($season==0&& $product==0)
			{
				foreach($contracts1 as $contract)
				{
					if($contract->contractapplication->year==$year)
					{
						array_push($contracts, $contract);
					}
				}
			}
			else if ($season==0)
			{
				foreach($contracts1 as $contract)
				{
					if($contract->contractapplication->year==$year && $contract->contractapplication->product_id==$product)
					{
						array_push($contracts, $contract);
					}
				}
			}
			else if ($product==0)
			{
				foreach($contracts1 as $contract)
				{
					if($contract->contractapplication->year==$year && $contract->contractapplication->season_id==$season)
						{
							array_push($contracts, $contract);
						}
				}
			}
			else{
					foreach($contracts1 as $contract)
					{
						if($contract->contractapplication->year==$year && $contract->contractapplication->product_id==$product && $contract->contractapplication->season_id==$season)
						{
							array_push($contracts, $contract);
						}
					}
				
			}
			Session::set("contracts", $contracts);
			Session::set("season", $season);
			Session::set("year", $year);
			Session::set("product", $product);
			
			Response::redirect('contract/search');
		}
		$this->template->title = "Search";
		$this->template->content = View::forge('contract/search_page');
	}
	public function action_search()
	{
		
		$this->template->title = "Search";
		$this->template->content = View::forge('contract/search');

	}
	
	public function action_reports_dash()
	{
		$contracts = Model_Contract::find('all');
		$data['count_contracts']=  sizeof($contracts);
		
		$role=Auth\Model\Auth_Role::query()->where('name','contractor')->get();
		/*there is only one farmer role, so looping in it to extract users*/
		$users='';
		foreach($role as $item)
		{
			$users=($item->users);
			break;
			
		}
		$data['count_contractors']=  sizeof($users);
		
		$this->template->title = "Contracts";
		$this->template->content = View::forge('contract/reports_dash', $data);

	}
public function action_report_all()
	{
				
		$data['contracts'] = Model_Contract::find('all');
		$this->template->title = "Contracts";
		
				$this->template->title = "Contracts";
		$this->template->content = View::forge('contract/report_all', $data);

	}
	public function action_contract_view($id = null)
	{
		$query =  Model_Contract::query();
		$data['contracts'] = $query->where('status','=', 'Approved')->where('contractor_id','=', $id)->get();
		$data['contractor_id']=$id;
		$this->template->title = "Contracts";
		$this->template->content = View::forge('contract/contract_view', $data);

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
		
		$data['contracts']=$aquery2->where('contractapplications.farmer_id','=' , Auth::get_user_id()[1])->execute()->as_array();
		//$aquery2->where('contracts.status','=' , 'Pending');
		
		
		
		

		$this->template->title = "Contracts";
		$this->template->content = View::forge('contract/index_mine', $data);

	}
	public function action_contractor_indexmine()
	{
		$query =  Model_Contract::query();
		$data['contracts'] = $query->where('contractor_id','=', Auth::get_user_id()[1])->get();
		//$query2 =  Model_Contract::query();
		//$data['contractsdeclined']= $query2->where('status','=', 'Declined')->where('contractor_id','=', Auth::get_user_id()[1])->get();
		$this->template->title = "Contracts";
		$this->template->content = View::forge('contract/contractor_indexmine', $data);

	}
	public function action_contractor_indexapproved()
	{	
		$query1 =  Model_Contract::query();
		$data['contractsapproved'] = $query1->where('status','=', 'Approved')->where('contractor_id','=', Auth::get_user_id()[1])->get();
		
		$this->template->title = "Contracts";
		$this->template->content = View::forge('contract/contractor_indexapproved', $data);

	}
	public function action_index_admin()
	{
		//$data['contracts'] = Model_Contract::find('all');
		$query =  Model_Contract::query();
		$data['contracts'] = $query->where('status','=', 'Pending')->get();
		$this->template->title = "Contracts";
		$this->template->content = View::forge('contract/index_admin', $data);

	}
	public function action_index_history()
	{
		//$data['contracts'] = Model_Contract::find('all');
		$query =  Model_Contract::query();
		$aquery =  Model_Contract::query();
		$data['contractsapproved'] = $query->where('status','=', 'Approved')->get();
		$data['contractsdeclined']= $aquery->where('status','=', 'Declined')->get();
		
		
		$this->template->title = "Contracts History";
		$this->template->content = View::forge('contract/index_history', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('contract');

		if ( ! $data['contract'] = Model_Contract::find($id))
		{
			Session::set_flash('error', 'Could not find contract #'.$id);
			Response::redirect('contract');
		}

		$this->template->title = "Contract";
		$this->template->content = View::forge('contract/view', $data);

	}
	
	// method to display a list of all contract applications
	// filters are availed so that a user can choose which ones to display
	public function action_applications()
	{
		$data = array();
		$sql =  Model_Contract::query();
		
		if(Input::method() == 'POST')
		{
			$product = Input::post('prod');
			//$status = Input::post('status');
			$status = 'Pending';

			if(!empty($status))  $sql->where('status',$status);
			if(!empty($product)) $sql->related('contractapplication')->where('contractapplication.product_id', $product);
			
		}
		$status = 'Pending';

			if(!empty($status))  $sql->where('status',$status);

		$open_contracts = $sql->get();
		$this->template->set_global('open_contracts', $open_contracts);
		
		$this->template->title = "Contract applications";
		$this->template->content = View::forge('contract/applications', $data);
	}
	
	
	public function action_admin_view($id = null)
	{
		is_null($id) and Response::redirect('contract');

		if ( ! $data['contract'] = Model_Contract::find($id))
		{
			Session::set_flash('error', 'Could not find contract #'.$id);
			Response::redirect('contract');
		}
		if (Input::method() == 'POST')
		{
			$data['contract']->status = Input::post('status');
			$data['contract']->comment = Input::post('comment');
			$data['contract']->save();
						
			$contract_application_id=$data['contract']->contractapplication_id;
			$contractapplication= Model_Contractapplication::find($contract_application_id);
			
			if($data['contract']->status==='Approved')
			{
				$contractapplication->status='Closed';
				$contractapplication->save();
						
			}
			if($data['contract']->status==='Declined')
			{
				$contractapplication->status='Open';
				$contractapplication->save();
						
			}

			Response::redirect('contract/applications');
		}

		$this->template->title = "Contract";
		$this->template->content = View::forge('contract/admin_view', $data);

	}
	public function action_admin_view_only($id = null)
	{
		is_null($id) and Response::redirect('contract');

		if ( ! $data['contract'] = Model_Contract::find($id))
		{
			Session::set_flash('error', 'Could not find contract #'.$id);
			Response::redirect('contract');
		}
		

		$this->template->title = "Contract";
		$this->template->content = View::forge('contract/admin_view_only', $data);

	}
	public function action_view_mine($id = null)
	{
		is_null($id) and Response::redirect('contract/index_mine');

		if ( ! $data['contract'] = Model_Contract::find($id))
		{
			Session::set_flash('error', 'Could not find contract #'.$id);
			Response::redirect('contract');
		}
		$contract =  Model_Contract::find($id); 
		
		// To find out if the inputs have been disbursed. If yes, then we do not show the disburse 
		// input field even if there is a balance
		$app_id =  $contract->contractapplication_id;
		$sql = "SELECT count(*) as ct FROM contract_disburses cd, contractquantities cq
				WHERE 1
				and cq.contractapplication_id = $app_id and cq.id =  cd.contractquantities_id"; 
				
		$res =  \DB::query($sql)->execute()->as_array();
		$count =  (int)$res[0]['ct'];
		$show_update_disburse_text_field = ($count > 0) ? false : true;
		View::set_global('show_update_disburse_text_field', $show_update_disburse_text_field);
		
		$this->template->set_global('disburse',false);
		$this->template->title = "Contract";
		$this->template->content = View::forge('contract/view_mine', $data);

	}
		public function action_farmer_view($id = null)
	{
		is_null($id) and Response::redirect('contract/index_mine');

		if ( ! $data['contract'] = Model_Contract::find($id))
		{
			Session::set_flash('error', 'Could not find contract #'.$id);
			Response::redirect('contract');
		}
		

		$this->template->title = "Contract";
		$this->template->set_global('contactApplicationId',$data['contract']->contractapplication_id);
		//$this->template->content = View::forge('contract/farmer_view', $data);
		$this->template->content = View::forge('contract/view_mine', $data);

	}


	public function action_viewcontract($id = null)
	{
		is_null($id) and Response::redirect('contract');

		if ( ! $data['contract'] = Model_Contract::find($id))
		{
			Session::set_flash('error', 'Could not find contract #'.$id);
			Response::redirect('contract');
		}

		$this->template->title = "Contract";
		$this->template->content = View::forge('contract/viewcontract', $data);

	}

	public function action_create()
	{
		
		if (Input::method() == 'POST')
		{
			$val = Model_Contract::validate('create');

			if ($val->run())
			{
				$contract = Model_Contract::forge(array(
					'contractapplication_id' => Input::post('contractapplication_id'),
					'contractor_id' => Input::post('contractor_id'),
					'loan_amount' => Input::post('loan_amount'),
					'balance_brought_forward' => Input::post('balance_brought_forward'),
					'amount_paid' => Input::post('amount_paid'),
					'balance_carried_forward' => Input::post('balance_carried_forward'),
					'date_paid' => Input::post('date_paid'),
					'status' => Input::post('status'),
					'comment' => Input::post('comment'),

				));

				if ($contract and $contract->save())
				{
					Session::set_flash('success', 'Added contract #'.$contract->id.'.');

					Response::redirect('contract');
				}

				else
				{
					Session::set_flash('error', 'Could not save contract.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
		//$this->template->set_global('contactApplicationId',$id);
		$this->template->title = "Contracts";
		$this->template->content = View::forge('contract/create');

	}
	public function action_createcontract($id)
	{
		if (Input::method() == 'POST')
		{
			//Debug::dump(Input::post());die;
			$val = Model_Contract::validate('create');
	//check if contract has already been saved
	$contapp=Model_Contractapplication::find(Input::post('contractapplication_id'));
	if($contapp->status!='Closed')
		{	
		if ($val->run())
			{
				$contract = Model_Contract::forge(array(
					'contractapplication_id' => Input::post('contractapplication_id'),
					'contractor_id' => Input::post('contractor_id'),
					'loan_amount' => Input::post('loan_amount'),
					'balance_brought_forward' => Input::post('loan_amount'),
					'amount_paid' => Input::post('amount_paid'),
					'balance_carried_forward' => Input::post('loan_amount'),
					'date_paid' => Input::post('date_paid'),
					'status' => Input::post('status'),
					'comment' => Input::post('comment'),

				));

				if ($contract and $contract->save())
				{
					//change status of Contract Appplication
					//$contapp=Model_Contractapplication::find(Input::post('contractapplication_id'));
					$contapp->status='Closed';
					$contapp->save();

					//Create season farming
					$seasonfarming = Model_SeasonFarming::forge(array(
					'contract_id' => $contract->id,
					'expectedyield' => Input::post('expectedyield'),
					'actualyield' => Input::post('actualyield'),
					));
					$seasonfarming->save();
					Session::set_flash('success',"Contract has been sent for approval!");
					
					Response::redirect('contract/contractor_indexmine');
			}
				else
				{
					Session::set_flash('error', 'Could not save contract.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
		else{
			Session::set_flash('error',"Contract has already been sent for approval!");
					
			Response::redirect('contract/contractor_indexmine');
		}
		
		}
		//echo 'tate';die;
		$contractapplication=Model_Contractapplication::find($id);
		Session::set('contractapplication', $contractapplication);
		$this->template->set_global('contactApplicationId',$id);
		Session::set_flash('cumulativeTotal',0);
		$this->template->title = "Contracts";
		$this->template->content = View::forge('contract/createcontract');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('contract');

		if ( ! $contract = Model_Contract::find($id))
		{
			Session::set_flash('error', 'Could not find contract #'.$id);
			Response::redirect('contract');
		}

		$val = Model_Contract::validate('edit');

		if ($val->run())
		{
			$contract->contractapplication_id = Input::post('contractapplication_id');
			$contract->contractor_id = Input::post('contractor_id');
			$contract->loan_amount = Input::post('loan_amount');
			$contract->balance_brought_forward = Input::post('balance_brought_forward');
			$contract->amount_paid = Input::post('amount_paid');
			$contract->balance_carried_forward = Input::post('balance_carried_forward');
			$contract->date_paid = Input::post('date_paid');
			$contract->status = Input::post('status');
			$contract->comment = $val->validated('comment');


			if ($contract->save())
			{
				Session::set_flash('success', 'Updated contract #' . $id);

				Response::redirect('contract');
			}

			else
			{
				Session::set_flash('error', 'Could not update contract #' . $id);
			}
		}
		
		else
		{
			if (Input::method() == 'POST')
			{
				$contract->contractapplication_id = $val->validated('contractapplication_id');
				$contract->contractor_id = $val->validated('contractor_id');
				$contract->loan_amount = $val->validated('loan_amount');
				$contract->balance_brought_forward = $val->validated('balance_brought_forward');
				$contract->amount_paid = $val->validated('amount_paid');
				$contract->balance_carried_forward = $val->validated('balance_carried_forward');
				$contract->date_paid = $val->validated('date_paid');
				$contract->status = $val->validated('status');
				$contract->comment = $val->validated('comment');


				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('contract', $contract, false);
		}

		$this->template->title = "Contracts";
		$this->template->content = View::forge('contract/edit');

	}
	

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('contract');

		if ($contract = Model_Contract::find($id))
		{
			$contract->delete();

			Session::set_flash('success', 'Deleted contract #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete contract #'.$id);
		}

		Response::redirect('contract');

	}

}
