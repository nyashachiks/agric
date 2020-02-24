<?php

// Stop Order class
class Controller_Loans extends Controller_Template
{
	public function action_index()
	{
		$data = array();
		if(!empty($_GET)){

			$fname = Input::get('fname');
			$agro = Input::get('agro');
			$status = Input::get('status');
			
			$sql = Model_Loan::query();
			
			if(!empty($fname)) $sql->where('farmer','like',"%{$fname}%");
			if(!empty($agro)) $sql->where('agronomist','like',"%{$agro}%");
			if(!($status == 10)) $sql->where('status',$status);
			
			$loans = $sql->get();
			
		}
		else
		{
			$loans = Model_Loan::find('all');
		}
		
		$data['sos'] =  $loans;
		
		//get loan details from a dummy DB table
		
		$this->template->title = "Loan management";
		$this->template->content = View::forge('loans/index', $data);
	}
}
