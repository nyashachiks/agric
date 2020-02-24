<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>View product offer</h2>
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
				<strong>Product Name:</strong>
			</div>
			<div class="col-md-9">
				<?php echo $productoffer->product->name; ?>
			</div>
		</div>
		<div class="row row-my">
			<div class="col-md-3">
				<strong>Farmer Name:</strong>
			</div>
			<div class="col-md-9">
				<?php 
	$users=Auth\Model\Auth_User::find($productoffer->farmer_id); //searching for user?>	
		<?php $firstname='';
			  $lastname='';
			  $structure='';
			  
			  foreach($users->metadata as $meta) //iterating through metadata
			  {
			  	if($meta->key=='first_name')
			  		$firstname=$meta->value;
			  	if($meta->key=='last_name')
			  		$lastname=$meta->value;
			  } 
		?>
	<?php echo $firstname.' '.$lastname; ?>
			</div>
		</div>
		<div class="row row-my">
			<div class="col-md-3">
				<strong>Market:</strong>
			</div>
			<div class="col-md-9">
				<?php echo $productoffer->market->name; ?>
			</div>
		</div>
		<div class="row row-my">
			<div class="col-md-3">
				<strong>Price:</strong>
			</div>
			<div class="col-md-9">
				$<?php echo number_format($productoffer->price,2,'.'," "); ?> 
				<?php
					$unit = $productoffer->product->measurement->unit;
					if(strtolower(trim($unit)) != 'each') echo 'per';
				?>				
				<?php echo $productoffer->product->measurement->unit?>
			</div>
		</div>
		<div class="row row-my">
			<div class="col-md-3">
				<strong>Quantity left:</strong>
			</div>
			<div class="col-md-9">
			<?php echo $productoffer->quantity_left; ?> 
			<?php 
					$unit = $productoffer->product->measurement->unit;
					if(strtolower(trim($unit)) != 'each') echo $unit;
				?>
			</div>
		</div>
		<div class="row row-my">
			<div class="col-md-3">
				<strong>Minimum Order Quantity:</strong>
			</div>
			<div class="col-md-9">
				<?php echo $productoffer->min_quantity; ?> 
				<?php 
					$unit = $productoffer->product->measurement->unit;
					if(strtolower(trim($unit)) != 'each') echo $unit;
				?>
			</div>
		</div>
		<div class="row row-my">
			<div class="col-md-3">
				<strong>Product Rating:</strong>
			</div>
			<div class="col-md-9">
				<?php echo $productoffer->product_status; ?>
			</div>
		</div>
		
		<div class="ln_solid"></div>

<div class="row row-my">
	<div class="col-md-10">
		<?php 
	list(, $userid) = Auth::get_user_id();  ?>
	
	<?php
	if(($productoffer->farmer_id)==($userid)): ?>
	<a href="<?php echo Uri::create('productoffer/edit/'.$productoffer->id); ?>" style="text-decoration: none">
		<button type="button" class="btn btn-primary btn-md btn-round">
			Edit
		</button>
	</a>
	
	<?php else: ?>
	<a href="<?php echo Uri::create('bid/buy/'.$productoffer->id); ?>" style="text-decoration: none">
		<button type="button" class="btn btn-primary btn-md btn-round">
			Buy Now
		</button>
	</a>
	<?php endif; ?>
	<a href="<?php echo Uri::create('productoffer/index'); ?>" style="text-decoration: none">
		<button type="button" class="btn btn-warning btn-md btn-round">
			Back
		</button>
	</a>
	</div>
</div>		
	</div>
	<div class="col-md-5">
	<?php
	$file = Asset::get_file('productoffer/'.$productoffer->image_name,'img');
	if($file == false){
		$file = Uri::base(false)."/assets/img/productoffer/default.jpg";
	}
	?>
		<img width="320px" class="thumbnail" src="<?php echo $file; ?>" />
	</div>
</div>
		
	</div>
</div>
</div>
