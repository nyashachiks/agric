<?php echo Form::open();?>
<?php echo Form::hidden('projectStageTaskID',$projectStageTaskID);?>
<p>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Resources</h2>
<div class="clearfix"></div>
</div>
<div class="x_content">
<?php echo render('project/_cost',array('collection'=>$costs));
//echo render('project/_form'); ?>
</div>
</div>
</div>
</p>
<div class="col-md-12 col-sm-12 col-xs-12">
<button class="btn btn-default">Save</button>
</div>
<?php echo Form::close();?> 