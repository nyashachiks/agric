<?php //echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
	<div class="form-group">
		<div class="col-md-2">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>
	</div>
	<div class="col-md-9">
				<?php 
					echo Form::input('name', Input::post('name', isset($structure) ? $structure->name : ''),		
				 array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>
			</div>
		</div>
		<div class="form-group">
		<div class="col-md-2">
			<?php echo Form::label('Structure', 'name', array('class'=>'control-label')); ?>
	</div>
	<div class="col-md-9">
				<?php 
				$arr=array(0=>'--Please Select--');
				$group = Auth\Model\Auth_Structure::query()->where('id','>',0)->get();
				foreach($group as $item)
					$arr[$item->id]=$item->name;
				echo Form::select('type', Input::post('name', isset($structure) ? $structure->name : ''),
				$arr,			
				 array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>
			</div>
		</div>
		
	</fieldset>
<?php //echo Form::close(); ?>