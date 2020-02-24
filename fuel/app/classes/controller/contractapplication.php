<?php
class Controller_Contractapplication extends Controller_Base
{

	public function before()
	{
		parent::before();
		View::set_global('view_legend','Contracts');
	}
	
	public function action_index()
	{
		$data['contractapplications'] = Model_Contractapplication::find('all');
		$this->template->title = "Contract Applications";
		$this->template->content = View::forge('contractapplication/index', $data);

	}
	public function action_index_history()
	{
		$data['contractapplications'] = Model_Contractapplication::find('all');
		$this->template->title = "Contract Applications";
		$this->template->content = View::forge('contractapplication/index_history', $data);

	}
	public function action_index_mine()
	{

		
		list(, $userid) = Auth::get_user_id(); 
		$query =  Model_Contractapplication::query();
		$aquery =  Model_Contractapplication::query();
		//$data['contractapplicationshistory']= $aquery->where('status','=', 'Closed')->where('farmer_id','=', Auth::get_user_id()[1])->get();
		$data['contractapplications'] = $query->where('farmer_id','=', Auth::get_user_id()[1])->get();
		
		$this->template->title = "Contract Applications";
		$this->template->content = View::forge('contractapplication/index_mine', $data);

	}
	public function action_index_open()
	{
		$query =  Model_Contractapplication::query();
		list(, $userid) = Auth::get_user_id(); 
		$data['contractapplications'] = $query->where('status','=', 'Open')
		->where('farmer_id','<>', Auth::get_user_id()[1])->get();
		//Debug::dump($data['contractapplications']);die;
		$this->template->title = "Contract Applications";
		$this->template->content = View::forge('contractapplication/index_open', $data);

	}
	public function action_admin_indexopen()
	{	
		$query =  Model_Contractapplication::query();
		list(, $userid) = Auth::get_user_id(); 
		$data['contractapplications'] = $query->where('status','=', 'Open')->get();
		$this->template->title = "Contract Applications";
		$this->template->content = View::forge('contractapplication/admin_indexopen', $data);

	}
	public function action_index_closed()
	{
		$query =  Model_Contractapplication::query();
		list(, $userid) = Auth::get_user_id(); 
		$data['contractapplications'] = $query->where('status','=', 'Closed')->where('farmer_id','<>', Auth::get_user_id()[1])->get();
		$this->template->title = "Contract Applications";
		$this->template->content = View::forge('contractapplication/indexclosed', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('contractapplication');

		if ( ! $data['contractapplication'] = Model_Contractapplication::find($id))
		{
			Session::set_flash('error', 'Could not find contract application #'.$id);
			Response::redirect('contractapplication');
		}

		$this->template->title = "Contract Application";
		$this->template->content = View::forge('contractapplication/view', $data);

	}
	public function action_view_only($id = null)
	{
		is_null($id) and Response::redirect('contractapplication');

		if ( ! $data['contractapplication'] = Model_Contractapplication::find($id))
		{
			Session::set_flash('error', 'Could not find contract application #'.$id);
			Response::redirect('contractapplication');
		}

		$this->template->title = "Contract Application";
		$this->template->content = View::forge('contractapplication/view_only', $data);

	}
	public function action_admin_view_only($id = null)
	{
		is_null($id) and Response::redirect('contractapplication');

		if ( ! $data['contractapplication'] = Model_Contractapplication::find($id))
		{
			Session::set_flash('error', 'Could not find contract application #'.$id);
			Response::redirect('contractapplication');
		}

		$this->template->title = "Contract Application";
		$this->template->content = View::forge('contractapplication/admin_view_only', $data);

	}
	public function action_viewcontract($id = null)
	{
		is_null($id) and Response::redirect('contractapplication');

		if ( ! $data['contractapplication'] = Model_Contractapplication::find($id))
		{
			Session::set_flash('error', 'Could not find contract application #'.$id);
			Response::redirect('contractapplication');
		}
		//$data["project"]=Model_Project::find(1);
		Session::set("contractid",$id);
		Session::set('contractapplication', $data['contractapplication']);
		Session::set_flash('cumulativeTotal',0);
		
		$this->template->set_global('updateQty',true);
		$this->template->title = "Contract Application";
		$this->template->content = View::forge('contractapplication/viewcontract', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Contractapplication::validate('create');

			if ($val->run())
			{
				$contractapplication = Model_Contractapplication::forge(array(
					'farm_id' => Input::post('farm_id'),
					'farmer_id' => Input::post('farmer_id'),
					'season_id' => Input::post('season_id'),
					'year' => Input::post('year'),
					'product_id' => Input::post('product_id'),
					'project_id'=> Input::post('project_id'),
					'size' => Input::post('size'),
					'measure_unit' => Input::post('measure_unit'),
					'status' => Input::post('status'),
				));

				if ($contractapplication and $contractapplication->save())
				{
					list(, $userid) = Auth::get_user_id(); 
					$data['contractapplications'] = Model_Contractapplication::find_by('farmer_id', $userid);
					Session::set_flash('success','Contract application has been created.');
					Response::redirect('contractapplication/index_mine');
				}

				else
				{
					Session::set_flash('error', 'Could not create contract application.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Contract Applications";
		$this->template->content = View::forge('contractapplication/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('contractapplication');

		if ( ! $contractapplication = Model_Contractapplication::find($id))
		{
			Session::set_flash('error', 'Could not find contract application #'.$id);
			Response::redirect('contractapplication');
		}

		$val = Model_Contractapplication::validate('edit');

		if ($val->run())
		{
			$contractapplication->farm_id = Input::post('farm_id');
			$contractapplication->farmer_id = Input::post('farmer_id');
			$contractapplication->season_id = Input::post('season_id');
			$contractapplication->year = Input::post('year');
			$contractapplication->product_id = Input::post('product_id');
			$contractapplication->size = Input::post('size');
			$contractapplication->measure_unit = Input::post('measure_unit');
			$contractapplication->status = Input::post('status');

			if ($contractapplication->save())
			{
				Session::set_flash('success', 'Updated contract application #' . $id);

				Response::redirect('contractapplication');
			}

			else
			{
				Session::set_flash('error', 'Could not update contract application #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$contractapplication->farm_id = $val->validated('farm_id');
				$contractapplication->farmer_id = Input::post('farmer_id');
				$contractapplication->season_id = $val->validated('season_id');
				$contractapplication->year = $val->validated('year');
				$contractapplication->product_id = $val->validated('product_id');
				$contractapplication->size = $val->validated('size');
				$contractapplication->measure_unit = $val->validated('measure_unit');
				$contractapplication->status = $val->validated('status');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('contractapplication', $contractapplication, false);
		}

		$this->template->title = "Contract Applications";
		$this->template->content = View::forge('contractapplication/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('contractapplication');

		if ($contractapplication = Model_Contractapplication::find($id))
		{
			$contractapplication->delete();

			Session::set_flash('success', 'Deleted contract application #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete contract application #'.$id);
		}

		Response::redirect('contractapplication');

	}

}
