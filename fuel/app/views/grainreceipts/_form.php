<?php echo Form::open(array("class"=>"form-horizontal", 'id' => 'cool-form')); ?>
		
		<div class="form-group">
			<?php echo Form::label('Farmer name', 'farmer_id', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<?php $farmers = Model_User::get_farmers_list();
						?>
				<?php echo Form::select('farmer_id', Input::post('farmer_id', isset($grainreceipt) ? $grainreceipt->farmer_id : ''),
				$farmers, array('class' => ' form-control', 'id'=>'state'));?>
			</div>
		</div>
		<div class="form-group">
			<?php echo Form::label('Grain', 'grain_id', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<?php $grains = Model_Grain::get_select_options('Select a grain');
						?>
				<?php echo Form::select('grain_id', Input::post('grain_id', isset($grainreceipt) ? $grainreceipt->grain_id : 0),
				$grains, array('class' => 'form-control'));?>
			</div>
		</div>
		<div class="form-group">
			<?php echo Form::label('Quantity', 'qty', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<?php echo Form::input('qty', Input::post('qty', isset($grainreceipt) ? $grainreceipt->qty : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'')); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo Form::label('Grade', 'grade_id', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<?php $grades = Model_Grade::get_select_options('Select a grade');
						?>
				<?php echo Form::select('grade_id', Input::post('grade_id', isset($grainreceipt) ? $grainreceipt->grade_id : 0),
				$grades, array('class' => 'form-control'));?>
			</div>
		</div>
		<div class="form-group">
			<?php echo Form::label('Value', 'value', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<?php echo Form::input('value', Input::post('value', isset($grainreceipt) ? $grainreceipt->value : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'')); ?>
			</div>
		</div>
		
		<div class="form-group">
			<h4>Grading sheet</h4>
		</div>
		
		<div class="form-group">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 ">

			<?php if(!empty($criteria)): ?>
			<table width="100%" class="table">
				<tbody>
				<?php foreach($criteria as $crit): ?>
				<tr>
					<td>
					<?php  echo Form::checkbox('criteria[]', $crit->short_name, false); ?>
					</td>
					<td><?php echo $crit->crit_name; ?></td>
					<td><input name='comm[]' type="text" class="form-control"/></td>
				</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
			
			<?php else: ?>
				<div class="alert alert-danger">
					There are no grading criteria defined in the system. Tell your system admin.
				</div>
			<?php endif; ?>
			
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-md-offset-3 col-md-4">
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
				<?php echo Html::anchor('grains', 'Back', array('class' => 'btn btn-warning')); ?>	
			</div>
		</div>
<?php echo Form::close(); ?>


<script>
	$(function(){
		
	$("#cool-form").submit(function () {

    var this_master = $(this);

    this_master.find('input[type="checkbox"]').each( function () {
        var checkbox_this = $(this);


        if( checkbox_this.is(":checked") == true ) {
            //checkbox_this.attr('value','1');
        } else {
            checkbox_this.prop('checked',true);
            checkbox_this.attr('value','0');
        }
    })
})
		
		
	});
</script>