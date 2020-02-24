<style>
	.progress-bar-prefix{
		background-color: #f5f5f5 !important;
	}
	.progress{
		margin-bottom:0 !important;
	}
</style>
 <?php
    $prefix=new Custom_criticalpath();
    $prefixDuration=$prefix->getPrefixDuration($task->prefix);
    $criticalDays=Session::get_flash('criticalDays');
    /*getting percentage*/
    $prefixPerc=($prefixDuration *100)/$criticalDays; 
    $durationPerc=($task->duration *100)/$criticalDays;
   // echo $prefixDuration.' '.$task->duration.' '. Session::get_flash('criticalDays');    
    ?> 
<div class="col-md-12">
	<div class="col-md-3">
		<?php echo (isset($task->task->name)?$task->task->name:'No Task');?>
	</div>
	<div class="col-md-9">
	<div class="progress">
	<div class="progress-bar progress-bar-prefix" style="width:<?php echo $prefixPerc;?>%">
  </div>
		 <div class="progress-bar progress-bar-info" role="progressbar" 
  aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $durationPerc;?>%">
    <?php echo $task->duration.'day(s)';?>  
  </div>
  </div>
	</div>
</div>

 