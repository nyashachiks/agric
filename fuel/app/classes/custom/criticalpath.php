<?php
class Custom_criticalpath
{
	public function getCriticalPath($allStages)
	{
		$arr=[];//takes in key value pairs
		 foreach($allStages as $item){
			   foreach($item->project_stages_tasks as $task)
			   {
			   		//check to see if key exits
			   		try{
						if($arr[$task->prefix]<$task->duration)// if duration is longer replace duration
						$arr[$task->prefix]=$task->duration;	
					}
					catch(Exception $e){
						//means no key yet, so lets populate is
						$arr[$task->prefix]=$task->duration;
					}	
			   }
		  }
		  // adding up to get total number of critical days
		 $criticalDays=0;
		 foreach($arr as $days)
		 {
		 	$criticalDays+=$days;
		 }
		 return $criticalDays;
	}
	public function getPrefixDuration($id)
	{
		try{
				$item= Model_Project_Stage_Task::query()->select('duration','prefix')
				->where('id',$id)->get_one();
				//now am going to loop
				$check=false;
				$duration = $item->duration;
				while(!$check)
				{
					if($item->prefix!=0)
					{
						$id=$item->prefix;
						$item= Model_Project_Stage_Task::query()->select('duration','prefix')
						->where('id',$id)->get_one();
						$duration += $item->duration;
					}
					else
					{
						$check=TRUE;
					}
				}
				
				
		return $duration;	
		}
		catch(Exception $e){
			return 0;
			}
	}
}