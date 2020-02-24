<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Address </label>
<div class="col-md-6 col-xs-12 col-sm-6">
<?php echo Form::textarea('address', Input::post('address', isset($address) ? $address->address : ''),
					 array('class' => ' form-control', 'rows' =>3, 'placeholder'=>'House Number and Street name')); ?>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Telephone </label>
<div class="col-md-6 col-xs-12 col-sm-6">
<?php echo Form::input('phone', Input::post('phone', isset($address) ? $address->phone : ''), array('class' =>' form-control','placeholder'=>'')); ?>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Country </label>
<div class="col-md-6 col-xs-12 col-sm-6">
<?php echo Form::select('country', Input::post('country', isset($country) ? $country->country : ''), 
					array("Select Country"),array('class' => ' form-control', 'id'=>'country' ));?>
</div>
</div>


<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Province </label>
<div class="col-md-6 col-xs-12 col-sm-6">
<?php echo Form::select('province', Input::post('province', isset($province) ? $province->province : ''),
				array("Select Province"), array('class' => ' form-control', 'id'=>'state'));?>
</div>
</div>


<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">City or district </label>
<div class="col-md-6 col-xs-12 col-sm-6">
	<?php echo Form::select('district', Input::post('district', isset($address) ? $address->district : ''), array(
					"Select District"), array('class' => ' form-control', 'id'=>'district')); ?>
					
					<?php echo Form::input('district2', Input::post('district2', isset($address) ? $address->district : ''), array('class' =>
					' form-control', 'placeholder'=>'District', 'style'=>'display:none', 'id'=>'district_2')); ?>
					
</div>
</div>

<div class="ln_solid"></div>

<div class="form-group">
<div class="col-md-6 col-xs-12 col-sm-6 col-md-offset-3">
<button type="submit" class="btn btn-md btn-success btn-round">Save</button>
</div>
</div>

<?php echo Asset::js('country.js'); ?>
<script language="javascript">
	populateCountries("country", "state","district");
populateStates("country", "state","district");
</script>
