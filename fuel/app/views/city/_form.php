
	<div class="row-fluid">
		<div class="col-md-2">	
			<?php echo Form::label('City', 'city', array('class'=>'control-label')); ?>
		</div>
		<div class="col-md-10">		
			<?php echo Form::input('city', Input::post('city', isset($city) ? $city->city : ''), array('class' => 'form-control'						, 'placeholder'=>'City')); ?>
		</div>
	</div>
		<?php
			if(isset($country)) 
			{
				$country=$city->country;
				echo render('country/_form' ,array('country'=>$country));
			}
			else
			{
				echo render('country/_form');
			} ?>
	
