<?php
class Controller_Grainreceipts extends Controller_Template
{

	public function action_index()
	{
		$data['grainreceipts'] = Model_Grainreceipt::find('all');
		$this->template->title = "Grainreceipts";
		$this->template->content = View::forge('grainreceipts/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('grainreceipts');

		if ( ! $data['grainreceipt'] = Model_Grainreceipt::find($id))
		{
			Session::set_flash('error', 'Could not find grainreceipt #'.$id);
			Response::redirect('grainreceipts');
		}

		$this->template->title = "Grainreceipt";
		$this->template->content = View::forge('grainreceipts/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Grainreceipt::validate('create');

			if ($val->run())
			{
				$grainreceipt = Model_Grainreceipt::forge(array(
					'farmer_id' => Input::post('farmer_id'),
					'grain_id' => Input::post('grain_id'),
					'qty' => Input::post('qty'),
					'grade_id' => Input::post('grade_id'),
					'value' => Input::post('value'),
					'received_by' => Auth::get('id'),
				));

				if ($grainreceipt and $grainreceipt->save())
				{
					
					//lets deal with grading stuff
					$criteria 	= Input::post('criteria');
					$critvalues = Input::post('comm');
					
					$count = 0;
					foreach($criteria as $crit){
						
						//determine the value
							if(!empty($crit) and !empty($critvalues[$count])){
								$props = array(
								'receipt_id' => $grainreceipt->id,
								'key' => $crit,
								'value' => $critvalues[$count]
							);
							
							Model_Grainreceiptsdatum::forge($props)->save();
						}
						$count++;
					}
					
					Session::set_flash('success', 'Added grain receipt #'.$grainreceipt->id.'.');
					Response::redirect('grainreceipts');
				}

				else
				{
					Session::set_flash('error', 'Could not save grainreceipt.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
		
		$criteria = Model_Gradingcriterium::find('all');
		View::set_global('criteria', $criteria);

		$this->template->title = "Grainreceipts";
		$this->template->content = View::forge('grainreceipts/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('grainreceipts');

		if ( ! $grainreceipt = Model_Grainreceipt::find($id))
		{
			Session::set_flash('error', 'Could not find grainreceipt #'.$id);
			Response::redirect('grainreceipts');
		}

		$val = Model_Grainreceipt::validate('edit');

		if ($val->run())
		{
			$grainreceipt->farmer_id = Input::post('farmer_id');
			$grainreceipt->grain_id = Input::post('grain_id');
			$grainreceipt->qty = Input::post('qty');
			$grainreceipt->grade_id = Input::post('grade_id');
			$grainreceipt->value = Input::post('value');
			$grainreceipt->received_by = Input::post('received_by');

			if ($grainreceipt->save())
			{
				Session::set_flash('success', 'Updated grainreceipt #' . $id);

				Response::redirect('grainreceipts');
			}

			else
			{
				Session::set_flash('error', 'Could not update grainreceipt #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$grainreceipt->farmer_id = $val->validated('farmer_id');
				$grainreceipt->grain_id = $val->validated('grain_id');
				$grainreceipt->qty = $val->validated('qty');
				$grainreceipt->grade_id = $val->validated('grade_id');
				$grainreceipt->value = $val->validated('value');
				$grainreceipt->received_by = $val->validated('received_by');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('grainreceipt', $grainreceipt, false);
		}

		$this->template->title = "Grainreceipts";
		$this->template->content = View::forge('grainreceipts/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('grainreceipts');

		if ($grainreceipt = Model_Grainreceipt::find($id))
		{
			$grainreceipt->delete();

			Session::set_flash('success', 'Deleted grainreceipt #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete grainreceipt #'.$id);
		}

		Response::redirect('grainreceipts');

	}

}
