<?php

class Controller_Project extends Controller_Base
{
	public function action_addprojectName($previous=NULL)
	{
		if (Input::method() == 'POST')
		{
			//check if previous button clicked
					if(trim($previous)=='stages')
					{
						$project= Model_Project::find(Session::get('project_projectID'));
						if(count($project)>0)
						$project->delete();
					}
			
			//lets avoid duplicates
			
			$project=Model_Project::query()
			->where('product_id',Session::get('productID'))
			->where('name', Input::post('name'))
			->where('expected_yield', Input::post('expected_yield'))

			->get_one();
			if(count($project)==0)
			{
				$project=Model_Project::forge(array(
				'product_id'=>Session::get('productID'),//$product_id,//Input::post('product_id'),
				'name'=>Input::post('name'),
				'expected_yield'=>Input::post('expected_yield'),
				));
				$project->save();
				//loop through and add region
				foreach(Input::post('Region') as $item)
						{
				$project->regions[]=Model_Region::find($item);
				$project->save();
			}
			//loop through conditions
				foreach(Input::post('Condition') as $item)
						{
				$project->conditions[]=Model_Condtion::find($item);
				$project->save();
			}
				//loop through soil tyoe
				foreach(Input::post('Soil_Type') as $item)
						{
				$project->soiltypes[]=Model_Soiltype::find($item);
				$project->save();
			}
			}
			//what i now have is projectname id;
			//storing it session to maintain integrity
			Session::set('project_projectID',$project->id);	
		
			Response::redirect('project/addprojectstage');
			
		}
		$data='';
		$arr=[];
		if(trim($previous)=='stages')
		{
			$project= Model_Project::find(Session::get('project_projectID'));
			$arr['projectname']=$project->name;
			if(count($project->regions)>0)
			{
				foreach($project->regions as $item)
				{
					$arr['regionID']=$item->id;
					break;
				}
			}
			//condition
			if(count($project->conditions)>0)
			{
				foreach($project->conditions as $item)
				{
					$arr['conditionID']=$item->id;
					break;
				}
			}
			//soil type
			if(count($project->soiltypes)>0)
			{
				foreach($project->soiltypes as $item)
				{
					$arr['soiltypeID']=$item->id;
					break;
				}
			}
			
			//we need to repopulate data with values
			
		}

		$data['dataToRestore']=$arr;
		$this->template->title = 'Project &raquo; Index';
		$this->template->content = View::forge('project/revised/projectname',$data);		
	}
	public function action_addprojectstage($previous=NULL)
	{
		$data='';
		if (Input::method() == 'POST')
		{
			//check if previous button clicked
					if(trim($previous)=='task')
					{
						$stages= Model_Project_Stage::query()
						->where('project_id',Session::get('project_projectID'))
						->get();
						if(count($stages)>0)
						foreach($stages as $item)
						{
							$item->delete();
						}
						
					}
			if(count(Input::post('stages'))>0)
			{
				foreach(Input::post('stages') as $item)
				{
				//lets avoid duplication
				$check=Model_Project_Stage::query()
				->where('project_id',Session::get('project_projectID'))
				->where('stage_id',$item)
				->get_one();
				if(count($check)==0)
				{
					$project_stage= Model_Project_Stage::forge(
					[
					'project_id'=>Session::get('project_projectID'),
					'stage_id'=>$item,
					]
					);
					$project_stage->save();
				}
			}
				Response::redirect('project/addprojectTask');
			}
			else
			{
				Session::set_flash('error','Please check stages required in the project');
			}
		}
		
		if(trim($previous)=='task')
		{
			$data['dataToReset']= Model_Project_Stage::query()
						->where('project_id',Session::get('project_projectID'))
						->get();
		}
		$data['stages']=Model_Stage::find('all');
		
		$this->template->title = 'Project &raquo; Index';
		$this->template->content = View::forge('project/revised/projectstages',$data);
		
	}
	public function action_addprojectTask($previous=NULL)
	{
		if(count(Session::get('project_projectID'))==0)
		{// we not going to bother our selves move back to the start
			Session::set_flash('error','No project name set');
			Response::redirect('project/addprojectName');
			
		}
		
		//we need to datasets
		if (Input::method() == 'POST')
		{
			$addATask=false;//check if any task has been added
			for($x=0;$x<count(Input::post('projectStage'));$x++)
			{
				
				if(!empty(Input::post('projectStage')[$x]))
				{
					$addATask=TRUE; //a task has been added
					//check if previous button clicked
					if(trim($previous)=='costs')
					{
						$stages= Model_Project_Stage::query()
						->where('project_id',Session::get('project_projectID'))
						->get();
						foreach($stages as $item)
						{
							$del=Model_Project_Stage_Task::query()
							->where('project_stage_id',$item->id)
							->get();
							foreach($del as $sub)
							{
								$sub->delete();
							}
						}
						
						
					}
					//add tasks to DB
					//avoid duplication
					$check=Model_Project_Stage_Task::query()
					->where('project_stage_id',Input::post('projectStage')[$x])
					->where('task_id',Input::post('task')[$x])
					->get_one();
					if(count($check)==0)
					{
						$Model_Project_Stage_Task=Model_Project_Stage_Task::forge(
						[
						'project_stage_id'=>Input::post('projectStage')[$x],
						'task_id'=>Input::post('task')[$x],
						'duration'=>Input::post('duration')[$x]
						]
						); 
						$Model_Project_Stage_Task->save();
					}
						
				}
			}
			if($addATask)
			Response::redirect('project/addprojectCosts');
			else
			Session::set_flash('error','Please select stage which coincides with a task!');
		}
		if(trim($previous)=='costs')
			{
			$data['dataToReset']= Model_Project_Stage_Task::query()
			->related('project_stage')
			->related('project_stage.project')
			->where('project_stage.project.id',Session::get('project_projectID'))
			->get();
			}
		$data['tasks']=Model_Task::find('all');
		$project= Model_Project::find(Session::get('project_projectID'));
		$data['projectStages']=$project->project_stages;	
		$this->template->title = 'Project &raquo; Index';
		$this->template->content = View::forge('project/revised/projecttasks',$data);
		
	}
	public function action_addprojectCosts()
		{
			if (Input::method() == 'POST')
			{
				foreach(Input::post('selected') as $item)
				{
					$arr=explode('_',$item);
				//lets prevent duplicates
				$check= Model_Project_Stage_Task_Variablecost::query()
				->where('project_stage_task_id',$arr[0])
				->where('variablecost_id',$arr[1])
				->where('unitprice',Input::post('unitprice'.$item))
				->where('qty',Input::post('qty'.$item))
				->where('pertonner',Input::post('pertonne'.$item))
				->where('notes',Input::post('notes'.$item))
				->get_one();
				if(count($check==0))	
					{
						$cost=Model_Project_Stage_Task_Variablecost::forge([
										'project_stage_task_id'=>$arr[0],
										'variablecost_id'=>$arr[1],
										'unitprice'=>Input::post('unitprice'.$item),
										'qty'=>Input::post('qty'.$item),
										'pertonner'=>Input::post('pertonne'.$item),
										'notes'=>trim(Input::post('notes'.$item))
										]
									);
									$cost->save();
					}
				}
				$project=Model_Project::find(Session::get('project_projectID'));
				Session::delete('project_projectID');
				Session::set_flash('success','Project '.$project->name.' created successfully');
				Response::redirect('project/projectlist');
			}
			
			//need to load 2 data sets
		 	$data['project_Stage_Task']	= Model_Project_Stage_Task::query()
			->related('project_stage')
			->related('project_stage.project')
			->where('project_stage.project.id',Session::get('project_projectID'))
			->get();
			$data['variableCosts']= Model_Variablecost::find('all');
			$this->template->title = 'Project &raquo; Index';
		$this->template->content = View::forge('project/revised/projectcosts',$data);
		}
	public function action_delete($id = null,$projectID=NULL,$task=NULL)
	{
		is_null($id) and Response::redirect('region');
	$collection=NULL;	
	if($task=='stage')
		$collection=Model_Project_Stage::find($id);
	if($task=='task')
		$collection=Model_Project_Stage_Task::find($id);
	if($task=='cost')
		$collection=Model_Project_Stage_Task_Variablecost::find($id);	
	if (!is_null($collection))
	{
		$collection->delete();

	Session::set_flash('success', 'Deleted region #'.$id);
	}
	else
	{
		Session::set_flash('error', 'Could not delete region #'.$id);
	}

		Response::redirect('project/report/'.$projectID);

	}
	public function action_projectFromProduct($productID)
	{
		$project=Model_Project::query()->select('id','name')
		->where('product_id',$productID)
		->get();
		
	}
	public function action_addtask($projectStageID=NULL,$projectID)
	{
		if(Input::method()=='POST')
		{
			//check if task already is stored
			$Model_Project_Stage_Task=Model_Project_Stage_Task::query()->select('id')
			->where('project_stage_id',Input::post('projectStageID'))
			->where('task_id',Input::post('taskID'))
			//->where('duration',Input::post('duration'))
			->get_one();
			if(is_null($Model_Project_Stage_Task))
				{
					$Model_Project_Stage_Task=Model_Project_Stage_Task::forge(
						[
						'project_stage_id'=>Input::post('projectStageID'),
						'task_id'=>Input::post('taskID'),
						'duration'=>Input::post('duration')
						]); 
						$Model_Project_Stage_Task->save();
				}
			foreach(Input::post('check') as $item)
			{
				
				$cost=Model_Project_Stage_Task_Variablecost::forge([
						'project_stage_task_id'=>$Model_Project_Stage_Task->id,
						'variablecost_id'=>$item,
						'unitprice'=>Input::post('unitpric'.$item),
						'qty'=>Input::post('qt'.$item),
						'pertonner'=>Input::post('pertonn'.$item),
						'notes'=>Input::post('note'.$item)
						]);
				$cost->save();
			}
				Response::redirect('project/report/'.$projectID);
		}
		$data['stage']=Model_Stage::find('all');
		$data['task']=Model_Task::find('all');
		$data['costs']=Model_Variablecost::find('all');
		$data['projectStageID']=$projectStageID;
		$this->template->title = 'Project &raquo; Index';
		$this->template->content = View::forge('wizard/wizard2phase',$data);
	}
public function action_addResources($projectStageTaskID=NULL,$projectID)
	{
		if(Input::method()=='POST')
		{
			foreach(Input::post('check') as $item)
			{
				
				$cost=Model_Project_Stage_Task_Variablecost::forge([
						'project_stage_task_id'=>Input::post('projectStageTaskID'),
						'variablecost_id'=>$item,
						'unitprice'=>Input::post('unitpric'.$item),
						'qty'=>Input::post('qt'.$item),
						'pertonner'=>Input::post('pertonn'.$item),
						'notes'=>Input::post('note'.$item)
						]);
				$cost->save();
			}
				Response::redirect('project/report/'.$projectID);
		}
		$data['stage']=Model_Stage::find('all');
		$data['task']=Model_Task::find('all');
		$data['costs']=Model_Variablecost::find('all');
		$data['projectStageTaskID']=$projectStageTaskID;
		$this->template->title = 'Project &raquo; Index';
		$this->template->content = View::forge('wizard/wizard1phase',$data);
	}
	public function action_addline($id=NULL)
	{
		if(Input::method()=='POST')
		{
			//check if stage already is stored
			$project_stage=Model_Project_Stage::query()->select('id')
			->where('project_id',Input::post('projectID'))
			->where('stage_id',Input::post('stageID'))
			->get_one();
			if(is_null($project_stage))
				{
					$project_stage= Model_Project_Stage::forge(
					[
					'project_id'=>Input::post('projectID'),
					'stage_id'=>Input::post('stageID'),
					]);
					$project_stage->save();
				}
			//check if task already is stored
			$Model_Project_Stage_Task=Model_Project_Stage_Task::query()->select('id')
			->where('project_stage_id',$project_stage->id)
			->where('task_id',Input::post('taskID'))
			//->where('duration',Input::post('duration'))
			->get_one();
			if(is_null($Model_Project_Stage_Task))
				{
					$Model_Project_Stage_Task=Model_Project_Stage_Task::forge(
						[
						'project_stage_id'=>$project_stage->id,
						'task_id'=>Input::post('taskID'),
						'duration'=>Input::post('duration')
						]); 
						$Model_Project_Stage_Task->save();
				}
			foreach(Input::post('check') as $item)
			{
				
				$cost=Model_Project_Stage_Task_Variablecost::forge([
						'project_stage_task_id'=>$Model_Project_Stage_Task->id,
						'variablecost_id'=>$item,
						'unitprice'=>Input::post('unitpric'.$item),
						'qty'=>Input::post('qt'.$item),
						'pertonner'=>Input::post('pertonn'.$item),
						'notes'=>Input::post('note'.$item)
						]);
				$cost->save();
			}
				Response::redirect('project/report/'.Input::post('projectID'));
		}
		$data['stage']=Model_Stage::find('all');
		$data['task']=Model_Task::find('all');
		$data['costs']=Model_Variablecost::find('all');
		$data['projectID']=$id;
		$this->template->title = 'Project &raquo; Index';
		$this->template->content = View::forge('wizard/wizard3stages',$data);
	}
	
	public function action_setting()
	{
		$this->template->title = 'Project &raquo; Index';
		$this->template->content = View::forge('project/setting');
	}
	public function action_listallproducts()
	{
		$data['product']='';
		if (Input::method() == 'POST')
		{
			$data['product']=Model_Product::query()
			->where('name','like','%'.Input::post('search').'%')
			->get();
			//Debug::dump($data);die;
		}
		else
		{
			$data['product']=Model_Product::find('all');
		}
	
		$this->template->title = 'Project &raquo; Index';
		$this->template->content = View::forge('project/index', $data);
		
	}

	
	public function action_create($product_id=NULL,$product_name=NULL)
	{
		is_null($product_id)and Response::redirect('project');
		Session::set('productID',$product_id);
		Response::redirect('project/addprojectName');		
	}
	public function action_report($id=NULL)
	{
		//$data["product"] =['id'=>$product_id,'name'=>$product_name];
		$data["project"]=Model_Project::find($id);
		//$data['product']=Model_Product::find($product_id);
		$this->template->title = 'Project &raquo; Index';
		Session::set_flash('cumulativeTotal',0);
		//$this->template->content = View::forge('project/bootsnip', $data);
		$this->template->content = View::forge('project/report', $data);
	}
	public function action_gnattchart($id=NULL)
	{
		//$data["product"] =['id'=>$product_id,'name'=>$product_name];
		$data["project"]=Model_Project::find($id);
		 $criticalPath=new Custom_criticalpath();
		 Session::set_flash('criticalDays',$criticalPath->getCriticalPath($data["project"]->project_stages));
		$this->template->title = 'Project &raquo; Index';
		Session::set_flash('cumulativeTotal',0);
		//Debug::dump(Input::get());die;
		//$this->template->content = View::forge('project/bootsnip', $data);
		$this->template->content = View::forge('project/gnatt', $data);
	}
	public function action_Arrange($project_id)
	{
		//$data['bids'] = Model_Bid::find('all');
		$data['menu']=DB::select('stages.name','project_stages.id')
		->from('project_stages')
		->join('stages')
		->on('project_stages.stage_id','=','stages.id')
		->where('project_id',
		$project_id)
		->order_by('position','asc')->execute()->as_array();
		$data['url']=Uri::create('ajax/project/position');
		$this->template->title = "Arrange Stages";
		$this->template->content = View::forge('mainmenu/arrange',$data);

	}
	public function action_ArrangeTasks($project_stage_id,$projectId)
	{
		
		$data['menu']=DB::select('tasks.name','project_stage_tasks.id','project_stage_tasks.prefix')
		->from('project_stage_tasks')
		->join('tasks')
		->on('project_stage_tasks.task_id','=','tasks.id')
		->join('project_stages')
		->on('project_stage_tasks.project_stage_id','=','project_stages.id')
		->join('projects')
		->on('project_stages.project_id','=','projects.id')
		->where('projects.id',$projectId)
		->order_by('project_stage_tasks.position','asc')->execute()->as_array();
			
		$data['url']=Uri::create('ajax/project/positionTask');
		$this->template->set_global('prefix',TRUE);
		$this->template->title = "Arrange Stages";
		$this->template->content = View::forge('mainmenu/arrange',$data);

	}
	public function action_projectlist()//($product_id=NULL,$product_name=null)
	{
		//$data["product"] =['id'=>$product_id,'name'=>$product_name];
		$data['project']=Model_Project::query()->get();//->where('product_id',$product_id)
		$this->template->title = 'Project &raquo; Index';
		$this->template->content = View::forge('project/projectlist', $data);		
	}
	public function action_projectreport()//($product_id=NULL,$product_name=null)
	{
		$data['project']=Model_Project::query();
		if(Input::method()=='POST')
		{
			$data['project']=$data['project']->related('product')
			->where('product.name','like',Input::post('productname') .'%')
			->where('name','like',Input::post('name') .'%');	
			//if(Input)
		}
		$data['project']=$data['project']->get();//->where('product_id',$product_id)
		$this->template->title = 'Project &raquo; Index';
		$this->template->content = View::forge('project/projectreport', $data);		
	}
	public function action_lineitem
	($product_id=NULL,$product_name=NULL,$projectid=null,
	$projectname)
	{
		is_null($product_id)and Response::redirect('project');
		
		$data["product"] =['id'=>$product_id,'name'=>$product_name];
		$data['project']=['id'=>$projectid,'name'=>$projectname];
		$data['project_data']=Model_Project::find($projectid);
		//Debug::dump($data['project_data']->regions);die;
		$data['region']= Model_Region::find('all');
		$data['stage']= Model_Stage::find('all');
		$data['condition']= Model_Condtion::find('all');
		$data['costs']=Model_Variablecost::find('all');
		$data['soiltype']=Model_Soiltype::find('all');
		$data['task']=Model_Task::find('all');
		if (Input::method() == 'POST')
		{
			$stage_value='';
			$project=Model_Project::find(Input::post('project_id'));
		//loop through and add region
			foreach(Input::post('region') as $item)
			{
				$project->regions[]=Model_Region::find($item);
			}
		//loop through conditions
			foreach(Input::post('condition') as $item)
			{
				$project->conditions[]=Model_Condtion::find($item);
			}
		//loop through stages
			foreach(Input::post('stage') as $item)
			{
				$stage_value=$item;
				//$project->stages[]=Model_Stage::find($item);
			}
		//loop through soil tyoe
			foreach(Input::post('soiltype') as $item)
			{
				$project->soiltypes[]=Model_Soiltype::find($item);
			}
			$project->save();
			//add costs
			for($x=0;$x<count(Input::post('unitprice'));$x++)
			{
				if(empty(Input::post('unitprice')[$x])|| empty(Input::post('qty')[$x]))
				{
					//do nothing
				}
				else{
				$cost=Model_Project_Variablecost::forge(array(
					'project_id'=>$project->id,
					'variable_id'=>Input::post('variable_id')[$x],
					'stage_id'=>$stage_value,
					'unitprice'=>Input::post('unitprice')[$x],
					'qty'=>Input::post('qty')[$x],
					'pertonne'=>Input::post('pertonne')[$x],
					//'startdate'=>Input::post('startdate')[$x],
					//'enddate'=>Input::post('enddate')[$x],
					'duration'=>Input::post('duration')[$x],
					'notes'=>Input::post('notes')[$x]
					)
				);
				$cost->save();
				}
			}
			Session::set_flash('success', 'Project '. $project->name.' successfully added.');
			Response::redirect('project/report/'.$project->id);
		}
		
		$this->template->title = 'Project &raquo; Index';
		$this->template->content = View::forge('project/createlineitem', $data);
	}
}
