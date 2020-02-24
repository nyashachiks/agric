
<style>
#farmer_number_code{

	width: 40%


}
.libspicker {
	cursor: pointer;
	background: #c200ff;
    color: #fff;
    border: none;
    width: 9%;
    height: 34px; 
    float: left;
    border-radius: 25px
</style>
<script>

	
	
	function check()
	{
		var longi = document.getElementById('long').value;
		var lati = document.getElementById('lati').value;
		var longbut=false;
		var latibut = false;
		
		if(longi==0||longi==0.||lati==0 ||lati==0.)
		{
			document.getElementById('mysubmit').disabled=true;
		}
		if(longi!=0.0)
		{
			if(isNaN(longi))
			{
				var a =document.getElementById('myerror');
				a.innerHTML='Your longitude is not a number';
				a.style.display='block';
				document.getElementById('mysubmit').disabled=true;				
			}
			else
			{
				longbut= true;	
			}
		}
		
		if(lati!=0.0)
		{
			if(isNaN(lati))
			{
				var a =document.getElementById('myerror');
				a.innerHTML='Your latitude is not a number';
				a.style.display='block';
				document.getElementById('mysubmit').disabled=true;				
			}
			else
			{
				latibut= true;	
			}
		}
		if(longbut==true && latibut==true)
		{
			document.getElementById('mysubmit').disabled=false;	
			var a =document.getElementById('myerror');
				
				a.style.display='none';	
		}
	}
</script>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2><?php echo $form_label; ?></h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br/>
			
			<form class="form-horizontal" method="post">
			
			<div class="alert alert-danger col-md-10" id="myerror" style="display:none"></div>


			
			<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12">Farmer name</label>
				<?php echo Form::input('farmer_number_code', Input::post('farmer_number_code', isset($farm) ? $farm->user_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'' ,'id'=>'farmer_number_code','disabled'=>'disabled')); ?>

				<?php echo Form::input('user_id', Input::post('user_id', isset($farm) ? $farm->user_id : ''), array('id'=>'farmer_id','type'=>'hidden')); ?>

				<span class="input-group-addon libspicker" onclick="viewVendor()" 'id'="pickerNo">Pick</span>

			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Farm name</label>
				<div class="col-md-6 col-sm-9 col-xs-12">
					<?php echo Form::input('name', Input::post('name', isset($farm) ? $farm->name : ''), array('class' => 'form-control', 'placeholder'=>'')); ?>
				</div>
				
			</div> -->
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Farm size</label>
				<div class="col-md-3 col-sm-3 col-xs-4">
					<?php echo Form::input('size', Input::post('size', isset($farm) ? $farm->size : ''), array('class' => 'btn-block form-control', 'placeholder'=>'Size')); ?>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-8">
				<select class="form-control" id="units" name="units">
				<option value="<?php echo (isset($farm)?$farm->units:'-1');?>" selected>
				<?php echo (isset($farm)?$farm->units:'--Please Select--');?></option>
					<option value="Acres">Acres</option>
					<option value="Hectares">Hectares</option>
				</select>
				</div>
			</div>
			
			<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Address </label>
<div class="col-md-6 col-xs-12 col-sm-6">
<?php echo Form::textarea('address', Input::post('address', isset($farm->address) ? $farm->address->address : ''),
					 array('class' => ' form-control', 'rows' =>3, 'placeholder'=>'House Number and Street name')); ?>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Telephone </label>
<div class="col-md-6 col-xs-12 col-sm-6">
<?php echo Form::input('phone', Input::post('phone', isset($farm->address) ? $farm->address->phone : ''), array('class' =>' form-control','placeholder'=>'')); ?>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Longitude </label>
<div class="col-md-6 col-xs-12 col-sm-6">
<?php echo Form::input('longitude', Input::post('longitude', isset($farm->longitude) ? $farm->longitude : ''), array('class' =>' form-control','onkeyup'=>'check()','placeholder'=>'0.0', 'id'=>'long')); ?>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Latitude </label>
<div class="col-md-6 col-xs-12 col-sm-6">
<?php echo Form::input('latitude', Input::post('latitude', isset($farm->latitude) ? $farm->latitude : ''), array('class' =>' form-control','onkeyup'=>'check()','placeholder'=>'0.0', 'id'=>'lati')); ?>
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
<?php echo Form::select('province', Input::post('province', isset($farm->address) ? $farm->address->province : ''),
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
			<div class="col-md-9 col-md-offset-3 col-xs-12 col-sm-12">
				<button type="submit" class="btn btn-success btn-round btn-md" disabled="disabled" id="mysubmit"><?php echo $btn_label; ?></button>
				<a href="<?php echo Uri::create('farm/indexmine'); ?>" style="text-decoration: none">
					<button type="button" class="btn btn-warning btn-round btn-md">Cancel</button>
				</a>
			</div>
			
			
			</form>
		</div>
	</div>
</div>
<?php echo render('farm/_pickVendor'); ?>
<?php echo Asset::js('country.js'); ?>
<script language="javascript">
	populateCountries("country", "state","district");
populateStates("country", "state","district");

</script>
<script>
	function viewVendor()
 		{
			$('#viewVendor').modal();
		}
</script>