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
      <div class="clearfix"></div>
      </p>
<div class="collapse" id="task<?php echo $stageCount.$taskCount;?>">
  <div class="well1">
  
  	<?php 
  	if(isset($disburse))
  	{
		echo render('shared/_resourcsDisburseInputs.php',
  		['task'=>$task,'projectID'=>$projectID]);
	}
  	else if(isset($updateQty))
  	{
		echo render('shared/_resourcsUpdateField.php',
  		['task'=>$task,'projectID'=>$projectID]);
	}
  	else
  	{
  		echo render('shared/_resourcesUpdatedQty.php',
  		['task'=>$task,'projectID'=>$projectID]);
  	}
  	?>
    
  </div>
</div>