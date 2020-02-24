<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($variablecost) ? $variablecost->name : ''),
				 array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Units', 'affectsindividualstage',
			 array('class'=>'control-label')); ?>

				<?php 
				$arr=[];
				foreach(Model_Unit::find('all') as $item)
				{
					$arr[$item->id]=$item->name;
				}
				echo Form::select('unit',Input::post('unit', isset($variablecost)?$variablecost->unit:''),
				$arr,array('class' => 'col-md-4 form-control'));?>
				
		</div>
<div class="form-group">
			<?php echo Form::label('Disbursed By Contractor', 'disbursed',
			 array('class'=>'control-label')); ?>

				<?php 
				$arr=[0=>'No',1=>'Yes'];
					echo Form::select('disbursed',Input::post('unit', isset($variablecost)?$variablecost->disbursed:''),
				$arr,array('class' => 'col-md-4 form-control'));?>
				
		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>
