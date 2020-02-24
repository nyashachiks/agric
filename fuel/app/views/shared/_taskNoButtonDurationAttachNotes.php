 <p>
      <div class="col-md-3">&nbsp;&nbsp;
      	<a class="accordion-toggle" data-toggle="collapse" 
      	href="#task<?php echo $stageCount.$taskCount;?>">
      	<button type="button" class="btn btn-default btn-xs">+</button>
     		<?php echo (isset($task->task->name)?$task->task->name:'No Task');?>
      	</a>
      	</div> 
    <div class="col-md-3">
      		<strong>Start Date :</strong>
      		<?php 
      		$date=$timestamp+(60 * 60 * 24 *Session::get('duration'));
      		Session::set('duration',Session::get('duration')+$task->duration);
      		echo  Date::forge($date)->format("%d/%m/%Y "); //unix time is in seconds;?> 
      </div>
      <?php 
      $contractorCheck=false;
       if (isset($contractor)&& $contractor==TRUE)
      	{
			$contractorCheck=TRUE;
		} 
		if(!$contractorCheck):
      ?>
      <div class="col-md-3">
      	<a href="<?php echo Uri::base().'contracttracker/index/'
      	.$task->id;?>" class="btn btn-info btn-xs">Attach Notes</a>
      </div>
      <?php endif;?>
      <div class="clearfix"></div>
      </p>
<div class="collapse" id="task<?php echo $stageCount.$taskCount;?>">
  
  	<?php 
  	if(!$contractorCheck):
  	echo render('shared/_resourcesUpdatedQty.php',['task'=>$task,'projectID'=>$projectID]);
  	else:
  	 echo render('shared/_AppendedNotesAndResources.php',
  	['task'=>$task,'projectID'=>$projectID]);
  	endif;
  	?>
    
  
</div>