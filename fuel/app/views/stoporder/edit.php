<h2>Editing Stoporder</h2>
<br/>

<style>
 #pickerCo ,#farmer_number_code , #material,#inputplant {
	
	width: 83%;
    float: left;
}
</style>

<script>
	$(function(){
		$(".datepicker").datepicker(
		{ 
			format: 'dd-mm-yyyy',
			autoclose: true,
			selectMonths: true, // Creates a dropdown to control month
    		selectYears: 15, // Creates a dropdown of 15 years to control year
		
		}
		
		);
		
	});
</script>

<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<?php echo Form::label('Company code', 'company_code', array('class'=>'control-label')); ?>
		<div class="form-group">
			

				<?php echo Form::input('company_code_i', Input::post('company_code_i', isset($stoporder) ? $stoporder->company_code : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Company code' , 'id'=>'company_code_i' , 'disabled'=>'disabled')); ?>

				<?php echo Form::input('company_code', Input::post('company_code', isset($stoporder) ? $stoporder->company_code : ''), array('id'=>'cocode' , 'type'=>'hidden')); ?>
				<!--<span class="input-group-addon libspicker" onclick="viewCompany()" 'id'="pickerCo">Pick Company</span>-->

		</div>
		<div class="form-group">
			<?php echo Form::label('Stop order number', 'stop_order_number', array('class'=>'control-label')); ?>

				<?php echo Form::input('stop_order_number_i', Input::post('stop_order_number_i', isset($stoporder) ? $stoporder->stop_order_number : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Stop order number','disabled'=>'disabled')); ?>

				<?php echo Form::input('stop_order_number', Input::post('stop_order_number', isset($stoporder) ? $stoporder->stop_order_number : ''), array('type'=>'hidden')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Code', 'code', array('class'=>'control-label')); ?>

				<?php echo Form::input('code', Input::post('code', isset($stoporder) ? $stoporder->code : ''), array('class' => 'col-md-4 form-control', 'id'=>'code', 'type'=>'hidden')); ?>
				<?php echo Form::input('code_i', Input::post('code_i', isset($stoporder) ? $stoporder->code : ''), array('class' => 'col-md-4 form-control', 'id'=>'code_i', 'disabled'=>'disabled')); ?>
				

		</div>

		<?php echo Form::label('Farmer number', 'farmer_number', array('class'=>'control-label')); ?>

		<div class="form-group">
			

				<?php echo Form::input('farmer_number_code', Input::post('farmer_number_code', isset($stoporder) ? $stoporder->farmer_number : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Farmer number' ,'id'=>'farmer_number_code','disabled'=>'disabled')); ?>

				<?php echo Form::input('farmer_number', Input::post('farmer_number', isset($stoporder) ? $stoporder->farmer_number : ''), array('id'=>'farmer_number','type'=>'hidden')); ?>

				<span class="input-group-addon libspicker" onclick="viewVendor()" 'id'="pickerNo">Pick Number</span>

		</div>


		<div class="form-group">
			<?php echo Form::label('Farmer name', 'farmer_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('farmer_name_code', Input::post('farmer_name_code', isset($stoporder) ? $stoporder->farmer_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Farmer name','id'=>'farmer_name_code', 'disabled'=>'disabled')); ?>

				<?php echo Form::input('farmer_name', Input::post('farmer_name', isset($stoporder) ? $stoporder->farmer_name : ''), array('class' => 'col-md-4 form-control', 'type'=>'hidden','id'=>'farmer_name')); ?>

		</div>
		
		<div class="form-group">
			<?php echo Form::label('Farmer id', 'farmer_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('farmer_id_code', Input::post('farmer_id_code', isset($stoporder) ? $stoporder->farmer_id : ''), array('class' => 'col-md-4 form-control','id'=>'farmer_id_code','disabled'=>'disabled')); ?>

				<?php echo Form::input('farmer_id', Input::post('farmer_id', isset($stoporder) ? $stoporder->farmer_id : ''), array('class' => 'col-md-4 form-control','id'=>'farmer_id','type'=>'hidden')); ?>

		</div>
		<?php echo Form::label('Material number', 'material_number', array('class'=>'control-label')); ?>

		<div class="form-group">
			
				<?php echo Form::input('material', Input::post('material', isset($stoporder) ? $stoporder->material_number : ''), array('class' => 'col-md-4 form-control','id'=>'material','disabled'=>'disabled' )); ?>
				<?php echo Form::input('material_number', Input::post('material_number', isset($stoporder) ? $stoporder->material_number : ''), array('id'=>'material_number','type'=>'hidden')); ?>
			<span class="input-group-addon libspicker" onclick="viewMaterial()" 'id'="pickerMaterial">Pick Material</span>
		</div>
		
		<div class="form-group">
			<?php echo Form::label('Max amount', 'max_amount', array('class'=>'control-label')); ?>

				<?php echo Form::input('max_amount', Input::post('max_amount', isset($stoporder) ? $stoporder->max_amount : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Max amount')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Effective Date', 'effective_date', array('class'=>'control-label')); ?>

				<?php echo Form::input('effective_date', Input::post('effective_date', isset($stoporder) ? $stoporder->effective_date : ''), array('class' => 'col-md-4 form-control datepicker')); ?>

		</div>
		<?php echo Form::label('Depot', 'depot', array('class'=>'control-label')); ?>
		<div class="form-group">
			

				<?php echo Form::input('inputplant', Input::post('inputplant', isset($stoporder) ? $stoporder->depot : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Depot' ,'id'=>'inputplant','disabled'=>'disabled')); ?>

				<?php echo Form::input('depot', Input::post('depot', isset($stoporder) ? $stoporder->depot : ''), array('id'=>'depot' , 'type'=> 'hidden')); ?>
				<span class="input-group-addon libspicker" onclick="PickPlant()" 'id'="pickerCo">Pick Depot</span>

		</div>
		<div class="form-group">
			<?php echo Form::label('Text', 'so_text', array('class'=>'control-label')); ?>

				<?php echo Form::input('so_text', Input::post('so_text', isset($stoporder) ? $stoporder->so_text : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>


	<?php echo render('stoporder/_pickVendor'); ?>
	<?php echo render('stoporder/_pickCompany'); ?>
	<?php echo render('stoporder/_pickMaterial'); ?>
	<?php echo render('stoporder/_pickPlant'); ?>
	<?php echo Asset::js('country.js'); ?>
	<script>
	populateCountries("country", "state","district");
	populateStates("country", "state","district");

	

</script>
	<script >
		function viewVendor()
 		{
			$('#viewVendor').modal();
		}

		function viewCompany()
 		{
			$('#viewCompany').modal();
		}

		function viewMaterial()

 		{
			$('#viewMaterial').modal();
		}
		function PickPlant()
	 		{
				$('#viewPlant').modal();
			}
		
	</script>
<?php echo Form::close(); ?>

<?php //echo render('stoporder/_form'); ?>
<p>
	<?php echo Html::anchor('stoporder/view/'.$stoporder->id, 'View'); ?> |
	<?php echo Html::anchor('stoporder', 'Back'); ?></p>