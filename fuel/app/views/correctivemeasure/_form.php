<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Disease', 'disease_id', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
			
			<?php 
				$arr=array(0=>'--Please Select--');
				$disease = Model_Disease::find('all');
				foreach($disease as $item)
					$arr[$item->id]=$item->name;
				echo Form::select('disease_id', Input::post('disease_id', isset($correctivemeasure) ? $correctivemeasure->disease_id : ''),
				$arr,			
				 array('class' => 'col-md-6 form-control')); 
			?>
			
			</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::textarea('description', Input::post('description', isset($correctivemeasure) ? $correctivemeasure->description : ''), array('class' => 'col-md-4 form-control', 'rows'=>'4', 'placeholder'=>'Description')); ?>
			</div>
		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
		</div>
	</fieldset>
<?php echo Form::close(); ?>