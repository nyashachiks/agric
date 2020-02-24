<div class="row">
	<div class="col-md-6">
		<div class="row row-my">
			<hr/>
		</div>
		
		<div class="row row-my">
			<div class="col-md-5">
				<strong>Product Name:</strong>
			</div>
			<div class="col-md-7">
				<?php echo $productoffer->product->name; ?>
			</div>
		</div>
		<div class="row row-my">
			<div class="col-md-5">
				<strong>Farmer Name:</strong>
			</div>
			<div class="col-md-7">
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
			<div class="col-md-5">
				<strong>Market:</strong>
			</div>
			<div class="col-md-7">
				<?php echo $productoffer->market->name; ?>
			</div>
		</div>
		<div class="row row-my">
			<div class="col-md-5">
				<strong>Price:</strong>
			</div>
			<div class="col-md-7">
				$<?php echo number_format($productoffer->price,2,'.'," "); ?>
				<?php
					$unit = $productoffer->product->measurement->unit;
					if(strtolower(trim($unit)) != 'each') echo 'per';
				?>
				<?php echo $productoffer->product->measurement->unit?>
			</div>
		</div>
		<div class="row row-my">
			<div class="col-md-5">
				<strong>Quantity left:</strong>
			</div>
			<div class="col-md-7">
			<?php echo $productoffer->quantity_left; ?> 
			<?php 
				$unit = $productoffer->product->measurement->unit;
				if(strtolower(trim($unit)) != 'each') echo $unit;
			?>
			</div>
		</div>
		<div class="row row-my">
			<div class="col-md-5">
				<strong>Minimum Order Quantity:</strong>
			</div>
			<div class="col-md-7">
				<?php echo $productoffer->min_quantity; ?> 
				<?php 
					$unit = $productoffer->product->measurement->unit;
					if(strtolower(trim($unit)) != 'each') echo $unit;
				?>
			</div>
		</div>
		<div class="row row-my">
			<div class="col-md-5">
				<strong>Product Rating:</strong>
			</div>
			<div class="col-md-7">
				<?php echo $productoffer->product_status; ?>
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
		<img class="thumbnail" width="320px" src="<?php echo $file; ?>" />
	</div>
</div>