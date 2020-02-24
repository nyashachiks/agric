<style>
.col-md-3 {
	text-align: right;
}
.col-md-9{
	text-align: left;
}
</style>
<?php echo Form::open(array("class"=>"form-horizontal")); ?>
<?php echo Form::hidden('next',$next);//this is how i know at wat stage i am in the wizard?>

	<fieldset>
	<div class="form-group">
		<div class="col-md-3">
			<?php echo Form::label('Name', 'description', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::textarea('description', Input::post('description', isset($structure) ? $structure->description : ''),
				 array('class' => 'col-md-4 form-control','rows'=>2, 'placeholder'=>'Name')); ?>
			</div>
		</div>
		<div class="form-group">
		<div class="col-md-3">
			<?php echo Form::label('Main Menu', 'area', array('class'=>'control-label')); ?>
				</div>
				<div class="col-md-9">
				<?php $arr=array();
				try{
					foreach($mainmenu as $item)
						$arr[$item->id]=$item->name;
				echo Form::select('mainmenu', Input::post('area', isset($structure) ? $structure->area : ''),
				$arr,
				 array('class' => 'col-md-4 form-control', 'placeholder'=>'Name'));
				 }
				 catch(Exception $e)
				 {
				 	echo $mainmenu->name;
				 	echo Form::hidden('mainmenu',$mainmenu->id);
				 }
				 
				  ?>
				 </div>

		</div>
		<?php //$isenabled=false;
		 if($next==2):
		 	$arrsub=array();
		 if(isset($mainmenu->dropdowns))
		 foreach($mainmenu->dropdowns as $item){
		 	$arrsub[$item->id]=$item->name;
		 }
					
		 ?>
			<div class="form-group">
		<div class="col-md-3">
			<?php echo Form::label('Submenu', 'controllername', array('class'=>'control-label')); ?>
		</div>
		<div class="col-md-9">
				<?php echo Form::select('submenu', Input::post('name', isset($structure) ? $structure->name : ''),
				$arrsub, array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>
				</div>

		</div>
		<?php endif;?>
		<?php 
		if($next>0):?>
		<div class="form-group">
		<div class="col-md-3">
		<?php echo Form::label('Add', 'action');?>
		</div>
		<div class="col-md-1">
			<?php echo Form::checkbox('action[]', 'add',false,array('class'=>'form-control'));?>
			</div>
			</div>
			<div class="form-group">
		<div class="col-md-3">
			<?php echo Form::label('Edit', 'action');?>
			</div>
		<div class="col-md-1">
			<?php	echo Form::checkbox('action[]', 'edit',false,array('class'=>'form-control'));?>
			</div>
			</div>
			<div class="form-group">
		<div class="col-md-3">
			<?php echo Form::label('View', 'action');?>
			</div>
		<div class="col-md-1">
			<?php	echo Form::checkbox('action[]', 'view',false,array('class'=>'form-control'));?>
			</div>
			</div>
		<div class="form-group">
		<div class="col-md-3">	
			<?php	echo Form::label('Delete', 'action');?>
		</div>	
		<div class="col-md-1">
			<?php	echo Form::checkbox('action[]', 'delete',false,array('class'=>'form-control'));	?>
			</div>
		</div>
	<?php endif;?>
	
	
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo render('utilities/submitbutton',array('label'=>($next<1?' Next':' Save')));?>
			<?php //echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>