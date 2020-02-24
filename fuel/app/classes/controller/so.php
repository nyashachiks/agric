<?php

// Stop Order class
class Controller_So extends Controller_Template
{
	public function before()
	{
		parent::before();
		View::set_global('view_legend','Stop orders');
	}
	
	// display a list of stop order applications
	public function action_index()
	{
		// init
		$data = array();
		list(,$uid) = Auth::get_user_id();
		
		
			$data['sos'] =  Model_SO::query()
						->where('approval_status',0)
						->related('contract')
						->where('contract.contractor_id',$uid)
						->get();
				
		$this->template->title = "Stop order applications";
		$this->template->content = View::forge('so/index', $data);
		
	}
	public function action_admin_index()
	{
		// init
		$data = array();
		list(,$uid) = Auth::get_user_id();
		
		
		
			$data['sos'] =  Model_SO::query()
						->where('approval_status',0)
						->get();
				
		$this->template->title = "Stop order applications";
		$this->template->content = View::forge('so/index', $data);
		
	}
	
	// shows a list of completed stop orders: either acepted or declined
	public function action_completed()
	{
		// init
		$data = array();
		list(,$uid) = Auth::get_user_id();
		
		
			
			$data['sos'] =  Model_SO::query()
						->where('approval_status','=',1)
						->related('contract')
						->where('contract.contractor_id',$uid)
						->get();
		
		
		$this->template->title = "Stop orders";
		$this->template->content = View::forge('so/completed', $data);
	}
	public function action_admin_completed()
	{
		// init
		$data = array();
		list(,$uid) = Auth::get_user_id();
		
		// sosa is stop order approved
					$data['sosa'] =  Model_SO::query()
						->where('approval_status','=',1)
						->get();
		// sosd is stop order declines				
		$data['sosd'] =  Model_SO::query()
						->where('approval_status','=',-1)
						->get();
		
		$this->template->title = "Stop orders";
		$this->template->content = View::forge('so/admin_completed', $data);
	}
		// detailed view of a stop order
	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('so/completed');
		
		$so = Model_SO::find($id);
		
		if(empty($so))
		{
			Session::set_flash('error', 'That Stop Order does not exist. Click on given links and avoid typing URLs in address bar!');
			Response::redirect('so/completed');
		}
		
		$data['so'] = $so;
		
		$this->template->title = "View Stop Order";
		$this->template->content = View::forge('so/view', $data);
		
	}
	
	public function action_approve()
	{
		if(Input::method() != 'POST')
		{
			Response::redirect('so/index');
		}
		
		$so_id   = Input::post('so_id');
		$status  = Input::post('status');
		$comment = Input::post('comment');
		
		list(,$uid) = Auth::get_user_id();
		$so = Model_SO::find($so_id);
		if(!empty($so))
		{
			$so->approval_date   = Date::forge()->format("%Y-%m-%d");
			$so->processed_by 	 = $uid;
			$so->approval_status = $status;
			$so->comment 		 = $comment;
			
			if($so->save())
			{
				Session::set_flash('success','Approval process completed. An approval letter has also been generated automatically');
				
				//lets generate a letter for the approval status
				if($status == 1){
					
					Package::load('pdf');
					$dompdf = \Pdf\Pdf::forge('dompdf')->init();
					
					$approv_templ = "so_approval.html";
					$file = File::read(APPPATH.'/views/templates/'.$approv_templ, true);
					
					//lets put in some values for dynamic data
					$contract = Model_Contract::find($so->contract_id);
					
					$farmer_id= $contract->contractapplication->farmer_id;
			$farmer= Auth\Model\Auth_User::find($farmer_id);
						
			$ffirstname='';
			$flastname='';
					  	
			//getting metadata
			 foreach($farmer->metadata as $meta)
			  {
					//Debug::dump($meta);die;
					if($meta->key=='first_name')
						$ffirstname=$meta->value;
					if($meta->key=='last_name')
						$flastname=$meta->value;
			  }
			
			$farmer = $ffirstname." ".$flastname;
			$farm_name = $contract->contractapplication->farm->name;
			$farm_size = $contract->contractapplication->size." ".$contract->contractapplication->measure_unit;
			$product = $contract->contractapplication->product->name;
			
			$contractor_id= $contract->contractor_id; 
						$contractor= Auth\Model\Auth_User::find($contractor_id);
									
						$cfirstname='';
						$clastname='';
								  	
						//getting metadata
						 foreach($contractor->metadata as $meta)
						  {
								//Debug::dump($meta);die;
								if($meta->key=='first_name')
									$cfirstname=$meta->value;
								if($meta->key=='last_name')
									$clastname=$meta->value;
						  }
						 $financier =  $cfirstname." ".$clastname;
					
					$file = str_replace("#financier",$financier, $file);
					$file = str_replace("#farm",$farm_name, $file);
					$file = str_replace("#farmer",$farmer, $file);
					$file = str_replace("#product",$product, $file);
					$file = str_replace("#size",$farm_size, $file);
					
					$loan = '$'. number_format($contract->loan_amount,2);
					$file = str_replace("#loan",$loan, $file);
					
					$dompdf->load_html($file);		
					$dompdf->set_paper('letter','portrait');
					$dompdf->render();		
							
					$pdf = $dompdf->output();

					$backup_path = DOCROOT.'assets/docs/so_approval_letters/';
					
					Config::load('so','so');
					$so_approv_doc = Config::get('so.so_approval_prefix').$so->id.'.pdf';	
					
					file_put_contents($backup_path . $so_approv_doc, $pdf);
					
					$so->doc_name = $so_approv_doc;
					$so->save();
				}
			}
			else
			{
				Session::set_flash('error','Approval process failed. Please try again.');
			}
			Response::redirect('so/admin_index');
		}
	}
	
	// download approval letter
	public function action_dl($file_id = null){
		
		if(!is_null($file_id)){
			
			//get file name from DB
			$file = Model_SO::find($file_id);
			
			if(empty($file))
			{
				Session::set_flash('error', 'Approval letter does not exist. Click on provided links and avoid typing URLs in the address bar');
				Response::redirect(Input::referrer());
			}
			$file_name =  $file->doc_name;
			
			//first: does the file exist?
			Asset::add_path('assets/docs/', 'so_approval_letters');
			$target = Asset::get_file('so_approval_letters/'. $file_name,'so_approval_letters'); 
			
			if(!empty($target))
			{
				$target_dir =  DOCROOT.'/assets/docs/so_approval_letters';
				File::download($target_dir.'/'.$file_name);
				
				Session::set_flash('success','The approval letters has been downloaded successfully. If you didnt see it, press CTRL + J keys to view a list of recent downloads. It should be there.');
			}
			else
			{
				Session::set_flash('error', 'Approval letter does not exist. Click on provided links and avoid typing URLs in the address bar');
				Response::redirect(Input::referrer());
			}
			Response::redirect(Input::referrer());
		}
		Response::redirect(Input::referrer());
	}
	
	// create a stop order from the chosen contract
	public function action_create(){
		
		if(Input::method() != 'POST')
		{
			Session::set_flash('error','Wrong route. Click on given buttons');
			Response::redirect(Input::referrer());
		}
		
		// data is ok, lets process
		$contract_id = Input::post('contract_id');
		
		// grep contract data
		$contract = Model_Contract::find($contract_id);
		
		list(,$uid) = Auth::get_user_id();
		
		$objDate = new DateTime();
		$now 	 = $objDate->format('Y-m-d');
		
		$props = array(
			'applied_by' 	=> $uid,
			'request_date'  => $now,
			'contract_id'   => $contract_id,
			'approval_status' => 0,
			'processed_by' 	  => '',
			'approval_date'   => ''
			
		);
		
		$so = Model_SO::forge($props);
		
		if($so and $so->save()){
			Session::set_flash('success', 'Stop order application created. You shall hear of the outcome from Admin');
		}
		else{
			Session::set_flash('error','We could not create the stop order at the moment. Please try again');
		}
		Response::redirect(Input::referrer());
		
	}
}
