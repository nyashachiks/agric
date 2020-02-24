  <div class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span> Budget is showing $/ha</div>
  <?php 
   $stagecount=0;
   
   		//cleanup!
   		$target = Uri::segment(3);
		$fname 		 = '/tmp/load_'.$target.'.txt';
		if(\File::exists($fname)){
			\File::delete($fname);
			
			$devil = "delete from nasty_tricks where target = $target";
			\DB::query($devil)->execute();
		}
		
 if(isset($project->project_stages)) : 
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
      
<div class="clearfix"></div>
</p>
 
<div class="collapse" id="stage1<?php echo $stagecount?>">
  <div class="well1">
   <!--lets work with tasks-->
   <?php $taskcount=0;
   
      foreach($item->project_stages_tasks as $task):      ?>
 <?php $taskcount++;
 if(isset($durationAttachNotes))
 {
 	 echo render('shared/_taskNoButtonDurationAttachNotes.php',
 	['stageCount'=>$stagecount, 'taskCount'=>$taskcount,
 	'task'=>$task,'projectID'=>$project->id,'timestamp'=>$timestamp]);
 }
 else
 {
 	echo render('shared/_taskNoButton.php',['stageCount'=>$stagecount, 'taskCount'=>$taskcount,
 	'task'=>$task,'projectID'=>$project->id]); 
 }
 	?>
   
   <?php
    endforeach;?>

  </div>
</div> 
  <!--stage-->
  <?php endforeach;
  else:?>
  <div class="alert alert-danger">
  No Project Template Found
  </div>
  <?php  endif; ?>
