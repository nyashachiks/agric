  <?php 
   $stagecount=0;
 if(isset($project->project_stages)) : 
  foreach($project->project_stages as $item):
  $stagecount++;
  ?>
    <?php 
  if(Input::get('stages')!=null):?>
  <div class="well1">
   <!--lets work with tasks-->
   <?php $taskcount=0;
      foreach($item->project_stages_tasks as $task){
	 	$taskcount++;
 		echo render('shared/_taskGraph.php',['stageCount'=>$stagecount, 'taskCount'=>$taskcount,
 		'task'=>$task,'projectID'=>$project->id]);
 	}?>
  </div>
 <?php else: ?>
  <!---stage-->
   <p>
      <div class="col-md-6">
        <a class="accordion-toggle" data-toggle="collapse" 
        href="#stage1<?php echo $stagecount?>">
        <button type="button" class="btn btn-default btn-xs">+</button>
        	<?php echo (isset($item->stage->name)?$item->stage->name:'No Stage');?>
        </a>
        </div>
      
<div class="clearfix"></div>
</p>
 
<div class="collapse in" id="stage1<?php echo $stagecount?>">
  <div class="well1">
   <!--lets work with tasks-->
   <?php $taskcount=0;
      foreach($item->project_stages_tasks as $task){
	 	$taskcount++;
 		echo render('shared/_taskGraph.php',['stageCount'=>$stagecount, 'taskCount'=>$taskcount,
 		'task'=>$task,'projectID'=>$project->id]);
 	}?>
  </div>
</div> 
  <!--stage-->
  <?php endif;?>
  <?php endforeach;
  else:?>
  <div class="alert alert-danger">
  No Project Template Found
  </div>
  <?php  endif; ?>
