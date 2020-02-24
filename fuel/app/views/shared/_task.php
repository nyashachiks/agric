 <p>
      <div class="col-md-3">&nbsp;&nbsp;
      	<a class="accordion-toggle" data-toggle="collapse" 
      	href="#task<?php echo $stageCount.$taskCount;?>">
      	<button type="button" class="btn btn-default btn-xs">+</button>
     		<?php echo (isset($task->task->name)?$task->task->name:'No Task');?>
      	</a>
      	</div> 
      	<div class="col-md-3">
      		<strong>Duration :</strong>
      		<?php echo $task->duration;?> day(s)
      </div>
      <div class="col-md-6">
        	<a href="<?php echo Uri::base().'project/addResources/'.$task->id.'/'.
        	$projectID;?>"
        	 class="btn btn-success btn-xs">Add more Resources</a> | 
        	 <a href="<?php echo Uri::base().'project/delete/'.$task->id.'/'.
        	$projectID.'/task';?>" onclick="return confirm('Are you sure?')"
        	 class="btn btn-danger btn-xs">Delete Task</a>
        </div>
      <div class="clearfix"></div>
      </p>
<div class="collapse" id="task<?php echo $stageCount.$taskCount;?>">
  <div class="well1">
  	<?php echo render('shared/_resources.php',['task'=>$task,'projectID'=>$projectID]);?>
    
  </div>
</div>