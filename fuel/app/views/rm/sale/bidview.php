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
				<?php echo $rawmaterial_offer->brand_name; ?>
			</div>
		</div>
		<div class="row row-my">
			<div class="col-md-5">
				<strong>Seller Name:</strong>
			</div>
			<div class="col-md-7">
				<?php 
	$users=Auth\Model\Auth_User::find($rawmaterial_offer->seller_id); //searching for user?>	
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
				<strong>Product Type:</strong>
			</div>
			<div class="col-md-7">
				<?php echo $rawmaterial_offer->raw_material->name; ?>
			</div>
		</div>
		<div class="row row-my">
			<div class="col-md-5">
				<strong>Price:</strong>
			</div>
			<div class="col-md-7">
				$<?php echo number_format($rawmaterial_offer->price,2,'.'," "); ?>
				<?php
					$unit = $rawmaterial_offer->raw_material->measurement->unit;
					if(strtolower(trim($unit)) != 'each') echo 'per';
				?>
				<?php echo $rawmaterial_offer->raw_material->measurement->unit?>
			</div>
		</div>
		<div class="row row-my">
			<div class="col-md-5">
				<strong>Quantity left:</strong>
			</div>
			<div class="col-md-7">
			<?php echo $rawmaterial_offer->quantity_left; ?> 
			<?php 
				$unit = $rawmaterial_offer->product->measurement->unit;
				if(strtolower(trim($unit)) != 'each') echo $unit;
			?>
			</div>
		</div>
		
		

</div>
<div class="col-md-5">
<?php
					$file = Asset::get_file('rawmaterial/'.$rawmaterial_offer->image_name,'img');
					if($file == false){
						$file = Uri::base(false)."/assets/img/rawmaterial/default.jpg";
					}
					?>
		<img class="thumbnail" width="320px" src="<?php echo $file; ?>" />
	</div>
</div>