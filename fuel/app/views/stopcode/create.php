<h2>New <span class='muted'>Stopcode</span></h2>
<br>

<style>
#company_code_i , #vendor_i{
	
	width: 85%;
    float: left;
}
</style>
<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Code', 'code', array('class'=>'control-label')); ?>

				<?php echo Form::input('code', Input::post('code', isset($stopcode) ? $stopcode->code : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Code')); ?>

		</div>
				<?php echo Form::label('Company code', 'company_code', array('class'=>'control-label')); ?>
		<div class="form-group">
			

				<?php echo Form::input('company_code_i', Input::post('company_code_i', isset($stopcode) ? $stopcode->company_code : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Company code','id'=>'company_code_i','disabled'=>'disabled')); ?>

				<?php echo Form::input('company_code', Input::post('company_code', isset($stopcode) ? $stopcode->company_code : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Company code','id'=>'company_code','type'=>'hidden')); ?>

				<span class="input-group-addon libspicker" onclick="viewCompany()" 'id'="pickerCo">Pick Company</span>

		</div>
		<?php echo Form::label('Vendor', 'vendor', array('class'=>'control-label')); ?>
		<div class="form-group">
			

				<?php echo Form::input('vendor_i', Input::post('vendor_i', isset($stopcode) ? $stopcode->vendor : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Vendor' ,'id'=>'vendor_i', 'disabled'=>'disabled')); ?>

				<?php echo Form::input('vendor', Input::post('vendor', isset($stopcode) ? $stopcode->vendor : ''), array('id'=>'vendor','type'=>'hidden')); ?>

				<span class="input-group-addon libspicker" onclick="viewVendor()" 'id'="pickerNo">Pick Vendor</span>

		</div>


		<div class="form-group">
			<?php echo Form::label('Vendor name', 'vendor_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('vendor_name_i', Input::post('vendor_name_i', isset($stopcode) ? $stopcode->vendor_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Vendor name','id'=>'vendor_name_i', 'disabled'=>'disabled')); ?>

				<?php echo Form::input('vendor_name', Input::post('vendor_name', isset($stopcode) ? $stopcode->vendor_name : ''), array('id'=>'vendor_name', 'type'=>'hidden')); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>

				<?php echo Form::input('description', Input::post('description', isset($stopcode) ? $stopcode->description : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Description','id'=>'description')); ?>

				
		</div>

		<div class="form-group">
			<?php echo Form::label('Deduction rate', 'deduction_rate', array('class'=>'control-label')); ?>

				<?php echo Form::input('deduction_rate', Input::post('deduction_rate', isset($stopcode) ? $stopcode->deduction_rate : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Deduction rate')); ?>

		</div>
		
		
		<div class="form-group">
			<?php echo Form::label('Commission', 'commission', array('class'=>'control-label')); ?>

				<?php echo Form::input('commission', Input::post('commission', isset($stopcode) ? $stopcode->commission : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Commission')); ?>

		</div>

		
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>
<?php echo render('stopcode/_pickCompany'); ?>
<?php echo render('stopcode/_pickVendor'); ?>
<script >
		function viewVendor()
 		{
			$('#viewVendor').modal();
		}
		function viewCompany()
 		{
			$('#viewCompany').modal();
		}
</script>
<?php echo Form::close(); ?>


<p><?php echo Html::anchor('stopcode', 'Back'); ?></p>
