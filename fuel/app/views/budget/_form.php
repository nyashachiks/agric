<?php echo Form::open(array("class"=>"form-horizontal")); 
	
?>

	<fieldset>
		<div class="row-fluid">
			<div class="col-md-2">
				<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-10">
				<?php echo Form::input('name', Input::post('name', isset($budget) ? $budget->name : ''), 
					array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-2">
				<?php echo Form::label('Product', 'product', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-10">
				<?php 
					$arr=array(0=>'--Please Select--');
					$product = Model_Product::find('all');
					foreach($product as $item)
						$arr[]=$item->name;
					echo Form::select('product', Input::post('product', isset($budget) ? $budget->product : ''),
					$arr,			
					 array('class' => 'col-md-4 form-control')); 
				?>
			
			</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-2">
				<?php echo Form::label('Region', 'region', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-10">
				<?php echo Form::select('region', Input::post('region', isset($budget) ? $budget->region : ''), 
					Custom_UserUtility::$getRegions, array('class' => 'col-md-4 form-control', 'placeholder'=>'Region')); ?>
			</div>
			
		</div>
		<div class="row-fluid">
			<div class="col-md-2">
				<?php echo Form::label('Soil Type', 'soiltype', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-10">
				<?php echo Form::select('soiltype', Input::post('soiltype', isset($budget) ? $budget->soiltype : ''), 
					Custom_UserUtility::$getSoilType, array('class' => 'col-md-4 form-control', 'placeholder'=>'Soil Type')); ?>
			</div>
		</div>
		
			
			<?php list(, $userid) = Auth::get_user_id(); 
			echo Form::hidden('user_id', Input::post('user_id', $userid)); ?>
		
			
		<div class="row-fluid">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
		</div>
	</fieldset>
<?php echo Form::close(); ?>