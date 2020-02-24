	
		<div class="row">
			<div class="col-md-3">	
				<?php echo Form::label('Country:', 'country', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::select('country', Input::post('country', isset($country) ? $country->country : ''), 
					array("Select Country"),array('class' => ' form-control btn-block', 'id'=>'country' ));?>
				
			</div>	
		</div>
		<div class="row">
			<div class="col-md-3">	
				<?php echo Form::label('Province:', 'province', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::select('province', Input::post('province', isset($province) ? $province->province : ''),
				array("Select Province"), array('class' => ' form-control btn-block', 'id'=>'state'));?>
			</div>
			
		</div>