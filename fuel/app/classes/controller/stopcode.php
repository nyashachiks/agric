<?php
class Controller_Stopcode extends Controller_Template
{

	public function action_index()
	{
		$data['stopcodes'] = Model_Stopcode::find('all');
		$this->template->title = "Stopcodes";
		$this->template->content = View::forge('stopcode/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('stopcode');

		if ( ! $data['stopcode'] = Model_Stopcode::find($id))
		{
			Session::set_flash('error', 'Could not find stopcode #'.$id);
			Response::redirect('stopcode');
		}

		$this->template->title = "Stopcode";
		$this->template->content = View::forge('stopcode/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Stopcode::validate('create');

			if ($val->run())
			{
				$vendor=Input::post('vendor');
				$vendor_name=Input::post('vendor_name');
				$code=strtoupper(Input::post('code'));
				$company_code=Input::post('company_code');
				$deduction_rate= Input::post('deduction_rate');
				$description=Input::post('description');
				$commission=Input::post('commission');
				
				$stop_code=Custom_RFCUtility::create_stop_order_code( $vendor, $vendor_name, $code, $company_code, $deduction_rate, $commission, $description);
				$stopcode = Model_Stopcode::forge(array(
					'code' => strtoupper(Input::post('code')),
					'vendor' => strtoupper(Input::post('vendor')),
					'company_code' => Input::post('company_code'),
					'vendor_name' =>strtoupper( Input::post('vendor_name')),
					'deduction_rate' => Input::post('deduction_rate'),
					'description'=> strtoupper(Input::post('description')),
					'commission'=> Input::post('commission'),

					
				));

				if ($stopcode and $stopcode->save())
				{
					Session::set_flash('success', 'Added stopcode #'.$stopcode->id.'.');

					Response::redirect('stopcode');
				}

				else
				{
					Session::set_flash('error', 'Could not save stopcode.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Stopcodes";
		$this->template->content = View::forge('stopcode/create');

	}


	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('stopcode');

		if ( ! $stopcode = Model_Stopcode::find($id))
		{
			Session::set_flash('error', 'Could not find stopcode #'.$id);
			Response::redirect('stopcode');
		}

		$val = Model_Stopcode::validate('edit');
		
		if ($val->run())
		{
			
			$stopcode->code = strtoupper(Input::post('code'));
			$stopcode->vendor = Input::post('vendor');
			$stopcode->company_code = Input::post('company_code');
			$stopcode->vendor_name = Input::post('vendor_name');
			$stopcode->deduction_rate = Input::post('deduction_rate');
			$stopcode->commission = Input::post('commission');
			
			$vendor=Input::post('vendor');
			$vendor_name=strtoupper(Input::post('vendor_name'));
			$code=strtoupper(Input::post('code'));
			$company_code=Input::post('company_code');
			$deduction_rate= Input::post('deduction_rate');
			$description=strtoupper(Input::post('description'));
			$commission=Input::post('commission');
			
			$stop_code=Custom_RFCUtility::update_stop_order_code($id, $vendor, $vendor_name, $code, $company_code, $deduction_rate, $commission, $description);
			if ($stopcode->save())
			{
				Session::set_flash('success', 'Updated stopcode #' . $id);

				Response::redirect('stopcode');
			}

			else
			{
				Session::set_flash('error', 'Could not update stopcode #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				
				$stopcode->code = $val->validated('code');
				$stopcode->vendor = $val->validated('vendor');
				$stopcode->company_code = $val->validated('company_code');
				$stopcode->vendor_name = $val->validated('vendor_name');
				$stopcode->deduction_rate = $val->validated('deduction_rate');
				$stopcode->commission = Input::post('commission');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('stopcode', $stopcode, false);
		}

		$this->template->title = "Stopcodes";
		$this->template->content = View::forge('stopcode/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('stopcode');
		
		
		if ($stopcode = Model_Stopcode::find($id))
		{
			$stop_code=Custom_RFCUtility::delete_stop_order_code( $stopcode->code);
			$stopcode->delete();

			Session::set_flash('success', 'Deleted stopcode #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete stopcode #'.$id);
		}

		Response::redirect('stopcode');

	}

}
