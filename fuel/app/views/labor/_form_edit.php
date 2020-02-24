<?php echo Form::open(array("class"=>"form-horizontal", 'enctype' => 'multipart/form-data')); ?>

	<fieldset>
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Skill name', 'skill_name', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::input('skill_name', Input::post('skill_name', isset($labor) ? $labor->skill_name : ''), 
					array('id'=>'skillName','class' => 'btn-block form-control', 'placeholder'=>'Skill name')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Rate', 'rate', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::input('rate', Input::post('rate', isset($labor) ? $labor->rate : ''), 
					array('id'=>'skillRate','class' => 'btn-block form-control', 'placeholder'=>'e.g 0.50 for 50 cents or 2.30 for $2.30')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Rate Time', 'rate_time', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php
						 echo Form::select('rate_time', Input::post('rate_time', isset($labor) ? $labor->rate_time : ''),
						Custom_UserUtility::$getRatePeriods, array('id'=>'skillRateTime','class' => 'btn-block form-control', 
						'placeholder'=>'e.g 0.50 for 50 cents or 2.30 for $2.30')); 
				?>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::input('description', Input::post('description', isset($labor) ? $labor->description : ''), 
					array('id'=>'skillDescription','class' => 'btn-block form-control', 'placeholder'=>'Description')); ?>
			</div>
		</div>
		<?php 
				list(, $userid) = Auth::get_user_id();
				echo Form::hidden('laborer_id', Input::post('laborer_id', $userid), array('id'=>'skillLaborerId')); 
		?>
			
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Upload CV', 'name', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
			<!--input name='file' type="file" id="skillFileName" required="true"/-->	
			<?php echo Form::file('file', array('required','id'=>'skillFileName')); ?>
			</div>
		</div>
		<div class="row">
		<div class="col-md-9 col-md-offset-3">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary', 'style' =>  'min-width: 60px')); ?>		
		</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>

