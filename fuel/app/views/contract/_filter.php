<div class="col-md-3 col-sm-3 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Filter records</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		
			<form role="form" class="form-vertical" method="post">
				
				<div class="form-group">
					<label class="control-label col-md-12">By status</label>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<?php 
$arr=array(
	0	=> 	'--choose--',
	'Pending' => 'Pending',
	'Approved' => 'Approved',
	'Declined' => 'Declined'
);

echo Form::select('status', Input::post('status', isset($productoffer) ? '' : ''),
$arr,			
 array('class' => 'form-control')); 
?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-md-12 col-sm-12 col-xs-12">By product</label>
					<div class="col-md-12 col-sm-12 col-xs-12">
						 <?php 
$arr=array(0=>'--choose--');
$market = Model_Product::query()->order_by('name','asc')->get();

foreach($market as $item)
	$arr[$item->id]=$item->name;
echo Form::select('prod', Input::post('prod', isset($productoffer) ? '' : ''),
$arr,			
 array('class' => 'form-control')); 
?>
					</div>
				</div>
				
				<div class="form-group">
					 <button type="submit" class="btn btn-primary ">Search</button>
			    <a href="<?php echo Uri::create('contract/applications'); ?>" style="text-decoration: none">
			    	<button type="button" class="btn btn-warning ">Show all</button>
			    </a>
				</div>
				
			</form>
		
		
	</div>
</div>
</div>