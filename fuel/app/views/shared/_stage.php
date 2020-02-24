  <?php 
   $stagecount=0;
  foreach($project->project_stages as $item):
  $stagecount++;
  ?>
  <!---stage-->
   <p>
      <div class="col-md-6">
        <a class="accordion-toggle" data-toggle="collapse" 
        href="#stage1<?php echo $stagecount?>">
        <button type="button" class="btn btn-default btn-xs">+</button>
        	<?php echo (isset($item->stage->name)?$item->stage->name:'No Stage');?>
        </a>
        </div>
        <div class="col-md-5">
        	<a href="<?php echo Uri::base().'project/addtask/'.$item->id.'/'.
        	$project->id;?>" onclick="return confirm('Are you sure?')"
        	 class="btn btn-success btn-xs">Add more Tasks</a>|
        	 <a href="<?php echo Uri::base().'project/arrangeTasks/'.$item->id.'/'.
        	$project->id;?>" onclick="return confirm('Are you sure?')"
        	 class="btn btn-primary  btn-xs">Arrange Tasks</a>|
        	  <a href="<?php echo Uri::base().'project/delete/'.$item->id.'/'.
        	$project->id.'/stage';?>"
        	 class="btn btn-danger btn-xs">Delete Stage</a>
        </div>
<div class="clearfix"></div>
</p>
 
<div class="collapse" id="stage1<?php echo $stagecount?>">
  <div class="well1">
   <!--lets work with tasks-->
   <?php $taskcount=0;
      foreach($item->project_stages_tasks as $task):?>
 <?php $taskcount++;
 echo render('shared/_task.php',['stageCount'=>$stagecount, 'taskCount'=>$taskcount,
 'task'=>$task,'projectID'=>$project->id]);?>
   
   <?php  //Debug::dump(($task->task->name));
    endforeach;?>

  </div>
</div> 
  <!--stage-->
  <?php endforeach;?>
