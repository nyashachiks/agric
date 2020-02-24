<?php
class Controller_Permits extends Controller_Template
{

	public function before()
	{
		parent::before();
		View::set_global('view_legend','Permits');
	}

	public function action_index()
	{
		$data['permits'] = Model_Permit::find('all');
		$this->template->title = "Import permits";
		$this->template->content = View::forge('permits/index', $data);
	}
	
	// shows permits for the logged in user.
	// prevents an ordinary user from viewing permits for others
	public function action_my()
	{
		list(,$uid) = Auth::get_user_id();
		$data['permits'] = Model_Permit::query()
							->where('applicant_id',$uid)
							->get();
		
		$this->template->title = "My import permit applications";
		$this->template->content = View::forge('permits/my', $data);
	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('permits');

		if ( ! $data['permit'] = Model_Permit::find($id))
		{
			Session::set_flash('error', 'Could not find import permit #'.$id);
			Response::redirect('permits');
		}

		$this->template->title = "Import permit";
		$this->template->content = View::forge('permits/view', $data);

	}

	public function action_approve($id =  null)
	{
		if(Input::method() != 'POST')
		{
			Session::set_flash('error','Illegal operation! How did you get here?');
			Response::redirect(Input::referrer());
		}
		
		//lets do the processing
		$val = Model_Permit::validate('approv');
		
		if($val->run()){ 
			
			$permit = Model_Permit::find($id);
			
			//lets update this guy
			$permit->qty_approved = Input::post('qty_approved');
			$permit->comment   	  = Input::post('comment');
			$permit->status 	  = Input::post('status');
			$permit->approv_date  = time();
			
			list(,$uid) = Auth::get_user_id();
			$permit->approv_user_id =  $uid;
			
			if($permit->save()){
				Session::set_flash('success','Import permit review process completed with success.');
			}
			else
			{
				Session::set_flash('error','Import permit review process has failed. Please try again');
				echo "Failed"; exit;
			}
		}
		else
		{ 
			Session::set_flash('error', $val->error());
		}
		Response::redirect('permits/view/'.$id);
	}
	
	public function action_download($file_id = null){
		
		if(!is_null($file_id)){
			
			//get file name from DB
			$file = Model_Permit::find($file_id);
			
			if(empty($file))
			{
				Session::set_flash('error', 'File does not exist. Click on provided links and avoid typing URLs in the address bar');
				Response::redirect('permits/view/'.$file->id);
			}
			$file_name =  $file->doc_name;
			
			//first: does the file exist?
			$target = Asset::get_file('permits/'.$file_name,'img'); 
			
			if(!empty($target))
			{
				$target_dir =  DOCROOT.'/assets/img/permits';
				File::download($target_dir.'/'.$file_name);
				
				Session::set_flash('success','The supporting document has been downloaded successfully. If you didnt see it, press CTRL + J keys to view a list of recent downloads. It should be there.');
			}
			else
			{
				Session::set_flash('error', 'File does not exist. Click on provided links and avoid typing URLs in the address bar');
				Response::redirect('permits/view/'.$file->id);
			}
			Response::redirect('permits/view/'.$file->id);
		}
		Response::redirect(Input::referrer());
	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Permit::validate('create');

			if ($val->run())
			{
				list(,$uid) = Auth::get_user_id();
				
				//doc upload
					$uploaded = false;
					
					$tmpext      = explode(".", $_FILES['doc']['name']);
					$file_ext	 =  ".".@$tmpext[1];

					//in DB
					$save_name = $uid.'_'.str_replace(' ',"_",$_FILES['doc']['name']);
				
					//save the image to approp dir
					$config = array(
					    'path'   => DOCROOT.'/assets/img/permits',
					    'randomize'     => false,
					    'ext_whitelist' => array('png','jpg','jpeg', 'pdf'),
					    'overwrite'   => true,
					    'auto_rename' => false,
					    'new_name' 	  => $save_name,
					);

					Upload::process($config);
					
					if (Upload::is_valid())
					{
					    Upload::save();
					    $uploaded = true;
					}
					else
					{
						Session::set_flash('error',"Import permit support letter could not be uploaded. Please ensure  that it is in one of the following formats: PNG, JPG, JPEG, or PDF.");
						Response::redirect(Input::referrer());
					}					
					//end doc upload
				
				$permit = Model_Permit::forge(array(
					'applicant_id' => $uid,
					'doc_name' 	   => $save_name,
					'status' 	=> 0,
					'commodity' => Input::post('commodity'),
					'certification' => Input::post('certification'),
					'qty_applied' 	=> Input::post('qty_applied'),
					'qty_approved'  => 0,
					'approv_date'   => '',
					'measurement_id'=> Input::post('measurement_id'),
				));

				if ($permit and $permit->save())
				{
					//a quick update to include record number. Guarantees uniq file name!
					$permit->doc_name =  $permit->id.'_'.$save_name;
					$permit->save();
					
					//rename the file too, so as to append the permit id
					$target_dir =  DOCROOT.'/assets/img/permits';
					File::rename($target_dir.'/'.$save_name,$target_dir.'/'.$permit->id.'_'.$save_name);
					
					//the usual ululating, when it works
					Session::set_flash('success', 'Import permit application has been submitted successfully. You will be notified of the progress in the due course.');
					Response::redirect('permits/my');
				}

				else
				{
					Session::set_flash('error', 'Import permit application failed. Please try again');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Import permits";
		$this->template->content = View::forge('permits/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('permits');

		if ( ! $permit = Model_Permit::find($id))
		{
			Session::set_flash('error', 'Could not find import permit #'.$id);
			Response::redirect('permits/my');
		}

		$val = Model_Permit::validate('edit');

		if ($val->run())
		{
			//$permit->applicant_id = Input::post('user_id');
			//$permit->doc_name = Input::post('doc_hash');
			//$permit->status = Input::post('status');
			
			$permit->commodity = Input::post('commodity');

			if ($permit->save())
			{
				Session::set_flash('success', 'Updated import permit #' . $id);

				Response::redirect('permits/my');
			}

			else
			{
				Session::set_flash('error', 'Could not update import permit #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$permit->user_id = $val->validated('user_id');
				$permit->doc_hash = $val->validated('doc_hash');
				$permit->status = $val->validated('status');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('permit', $permit, false);
		}

		$this->template->title = "Edit import permit application";
		$this->template->content = View::forge('permits/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('permits');

		if ($permit = Model_Permit::find($id))
		{
			$permit->delete();

			Session::set_flash('success', 'Import permit application deleted successfully');
		}

		else
		{
			Session::set_flash('error', 'Could not delete import permit #'.$id);
		}

		Response::redirect('permits/my');

	}

}
