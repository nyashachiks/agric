<?php
class Controller_Ajax_Project extends Controller_Rest
{
	public function get_list()
	{
		$productID=(Input::get('productID'));
		$project=Model_Project::query()->select('id','name')
		->where('product_id',$productID)
		->get();
		if(count($project)==0)
			return ['error'=>'false'];
		else
			return $project;
		
	}
	public function post_position()
	{
		if (Input::method() == 'POST')
		{
			//$ArrId=explode('|',Input::post('info'));
			$id=Input::post('info');//$ArrId[1];
			
			$project_stage=Model_Project_Stage::find($id);
			$project_stage->position=Input::post('count');// new position of menu item;
			//$project_stage->prefix=Input::post('prefix');
			$project_stage->save();
	
		}

	}
	public function post_positionTask()
	{
		if (Input::method() == 'POST')
		{
			//$ArrId=explode('|',Input::post('info'));
			$id=Input::post('info');//$ArrId[1];
			
			$item=Model_Project_Stage_Task::find($id);
			$item->position=Input::post('count');// new position of menu item;
			$item->prefix=Input::post('prefix');
			$item->save();
	
		}

	}
}