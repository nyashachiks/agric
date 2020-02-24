		<div class="row">
			<div class="col-md-3">	
				<?php echo Form::label('Address:', 'address', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">	
					<?php echo Form::textarea('address', Input::post('address', isset($address) ? $address->address : ''),
					 array('class' => ' form-control btn-block', 'rows' =>3, 'placeholder'=>'House Number and Street name')); ?>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-3">	
				<?php echo Form::label('Tel:', 'phone', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::input('phone', Input::post('phone', isset($address) ? $address->phone : ''), array('class' =>' form-control btn-block','placeholder'=>'Phone')); ?>
			</div>
		</div>
		
		<?php 
			echo (isset($country)?render('country/_form' ,array('country'=>$country)): render('country/_form'));
		?>
		
		<div class="row">
			<div class="col-md-3">	
				<?php echo Form::label('City or District:', 'district', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::select('district', Input::post('district', isset($address) ? $address->district : ''), array(
					"Select District"), array('class' => ' form-control btn-block', 'id'=>'district')); ?>
				<?php echo Form::input('district2', Input::post('district2', isset($address) ? $address->district : ''), array('class' =>
					' form-control btn-block', 'placeholder'=>'District', 'style'=>'display:none', 'id'=>'district_2')); ?>
			</div>
		</div>
	<?php if(!isset($country)){?>
			<script language="javascript">
				populateCountries("country", "state","district");
			</script>
		<?php };?>
