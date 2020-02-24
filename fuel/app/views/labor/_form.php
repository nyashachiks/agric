<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
	<h2><?php echo $form_label; ?> </h2>
	
	<div class="clearfix"></div>
	</div>
	<div class="x_content">
	<br/>
	<form method="post" id="labor_form" enctype="multipart/form-data" class="form-horizontal">
		<div class="form-group">
				<?php echo Form::label('Skill name', 'skill_name', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-7 col-sm-7 col-xs-12">
				<?php echo Form::input('skill_name', Input::post('skill_name', isset($labor) ? $labor->skill_name : ''), 
					array('id'=>'skillName','class' => 'form-control', 'placeholder'=>'Skill name')); ?>
			</div>
		</div>
		<div class="form-group">
				<?php echo Form::label('Rate', 'rate', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-5 col-sm-5 col-xs-7">
				<?php echo Form::input('rate', Input::post('rate', isset($labor) ? $labor->rate : ''), 
					array('id'=>'skillRate','class' => 'form-control', 'placeholder'=>'e.g 0.50 for 50 cents or 2.30 for $2.30')); ?>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-5">
				<?php
						 echo Form::select('rate_time', Input::post('rate_time', isset($labor) ? $labor->rate_time : ''),
						Custom_UserUtility::$getRatePeriods, array('id'=>'skillRateTime','class' => 'form-control', 
						'placeholder'=>'e.g 0.50 for 50 cents or 2.30 for $2.30')); 
				?>
			</div>
		</div>
		
		<div class="form-group">
				<?php echo Form::label('Description', 'description', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-7 col-sm-7 col-xs-12">
				<?php echo Form::textarea('description', Input::post('description', isset($labor) ? $labor->description : ''), 
					array('id'=>'skillDescription','class' => 'form-control', 'placeholder'=>'Describe your skill in interesting words.', 'form' => 4)); ?>
			</div>
		</div>
		
		
		
		<?php 
				list(, $userid) = Auth::get_user_id();
				echo Form::hidden('laborer_id', Input::post('laborer_id', $userid), array('id'=>'skillLaborerId')); 
		?>
			
		<div class="form-group">
				<?php echo Form::label('Upload CV', 'name', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-7 col-sm-7 col-xs-12">
			<?php 
				$required =  "required";
				if(strtolower(Uri::segment(2)) == 'create') $required = "required";
			?>
			<input class="form-control" name='file' type="file" id="skillFileName" <?=$required?> />	
			</div>
		</div>
		<div class="ln_solid"></div>
		<div class="form-group">
			<div class="col-sm-9 col-xs-12 col-md-offset-3">
              <button class="btn btn-md btn-success btn-round"><?php echo $btn_label; ?></button>
              <a href="<?php echo Uri::create('labor/indexmine'); ?>" style="text-decoration: none">
						<button type="button" class="btn btn-md btn-warning btn-round">Cancel</button>
					</a>
            </div>
		</div>
		
	</form>
	
	</div>
</div>
</div>