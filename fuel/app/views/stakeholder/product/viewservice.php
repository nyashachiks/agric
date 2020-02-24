<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>View Service offer</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<div class="row row-my">
	<div class="col-md-6">
		<div class="row row-my">
			<hr/>
		</div>
		
		<div class="row row-my">
			<div class="col-md-3">
				<strong>Trading Name:</strong>
			</div>
			<div class="col-md-9">
				<?php echo $productoffer->tradingname; ?>
			</div>
		</div>
		<div class="row row-my">
			<div class="col-md-3">
				<strong>Product Name:</strong>
			</div>
			<div class="col-md-9">
				<?php  echo $productoffer->name; ?>
			</div>
		</div>
		<div class="row row-my">
			<div class="col-md-3">
				<strong>Description</strong>
			</div>
			<div class="col-md-9">
				<?php echo $productoffer->description; ?>
			</div>
		</div>
		<div class="row row-my">
			<div class="col-md-3">
				<strong>Additional Details</strong>
			</div>
			<div class="col-md-9">
							
				<?php echo $productoffer->additional_details?>
			</div>
		</div>
		
		
		<div class="ln_solid"></div>

<div class="row row-my">
	<div class="col-md-10">
		<?php 
	list(, $userid) = Auth::get_user_id();  ?>
	
	<?php
	if(false): ?>
	<a href="<?php echo Uri::create('productoffer/edit/'.$productoffer->id); ?>" style="text-decoration: none">
		<button type="button" class="btn btn-primary btn-md btn-round">
			Edit
		</button>
	</a>
	
	<?php else: ?>
	<a href="#" style="text-decoration: none">
		<button type="button" class="btn btn-primary btn-md btn-round">
			Get Qoutation
		</button>
	</a>
	<?php endif; ?>
	<a href="<?php echo Uri::create('stakeholder/product/serviceoffer'); ?>" style="text-decoration: none">
		<button type="button" class="btn btn-warning btn-md btn-round">
			Back
		</button>
	</a>
	</div>
</div>		
	</div>
	<div class="col-md-5">
	<?php
	$file = Asset::get_file('profilepics/'.$productoffer->pic,'img');
	if($file == false){
		$file = Uri::base()."/assets/img/productoffer/default.jpg";
	}
	?>
		<img width="320px" class="thumbnail" src="<?php echo $file; ?>" />
	</div>
</div>
		
	</div>
</div>
</div>
