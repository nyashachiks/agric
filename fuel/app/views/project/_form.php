<!--left side-->
<div class='col-md-6'>
<div class="form-group">

			<?php echo Form::label('Stage', 'name', array('class'=>'control-label')); ?>
			<br />
<div class="col-md-6">	
				<?php echo Form::select('name', Input::post('name', isset($region) ? $region->name : ''),
				['stage1','stage2'], array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>
</div><div class="col-md-1">bu</div>
<div class="clearfix"></div>
		</div>
	<div class="form-group">

			<?php echo Form::label('End Date', 'name', array('class'=>'control-label')); ?>
			<br />
<div class="col-md-6">	
				<?php echo Form::input('name', Input::post('name', isset($region) ? $region->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name' ,'type'=>'date')); ?>
</div><div class="col-md-1">bu</div>
<div class="clearfix"></div>
		</div>
<div class="form-group">

			<?php echo Form::label('Unit price', 'name', array('class'=>'control-label')); ?>
			<br />
<div class="col-md-6">	
				<?php echo Form::input('Unit Price', Input::post('name', isset($region) ? $region->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>
</div><div class="col-md-1">bu</div>
<div class="clearfix"></div>
		</div>
</div>
<!--end of left side-->
<!--right side-->
<div class='col-md-6'>
<div class="form-group">

			<?php echo Form::label('Start Date', 'name', array('class'=>'control-label')); ?>
			<br />
<div class="col-md-6">	
				<?php echo Form::input('name', Input::post('name', isset($region) ? $region->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name','type'=>'date')); ?>
</div><div class="col-md-1">bu</div>
<div class="clearfix"></div>
		</div>
	<div class="form-group">

			<?php echo Form::label('Cost', 'name', array('class'=>'control-label')); ?>
			<br />
<div class="col-md-6">	
				<?php echo Form::select('name', Input::post('name', isset($region) ? $region->name : ''),
				['labour in labour/hrs','Fertilizer in kg(s)'], array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>
</div><div class="col-md-1">bu</div>
<div class="clearfix"></div>
		</div>
<div class="form-group">

			<?php echo Form::label('Notes', 'name', array('class'=>'control-label')); ?>
			<br />
<div class="col-md-6">	
				<?php echo Form::textarea('name', Input::post('name', isset($region) ? $region->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>
</div><div class="col-md-1">bu</div>
<div class="clearfix"></div>
		</div>
</div>
<!--end of right side-->