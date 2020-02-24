<div class="form-group col-md-6" >
<div class="row-fluid" >
<div class="col-md-3">
			<?php echo Form::label('Organisation', 'type', array('class'=>'control-label')); ?>
</div>
<div class="col-md-9" >
				<?php $arr=array(-1=>'--Please Select--');
				
				foreach($structure as $item)
					{
						$arr[$item->id]=$item->name;
					}
				echo Form::select('type', -1,$arr,
				array('class' => 'col-md-12 form-control', 'placeholder'=>'Type')); ?>

		</div>
		</div>
		</div>
