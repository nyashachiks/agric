<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>View Raw Material offer</h2>
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
				<?php echo $rawmaterial_offer->brand_name; ?>
			</div>
		</div>
		<div class="row row-my">
			<div class="col-md-3">
				<strong>Product Type:</strong>
			</div>
			<div class="col-md-9">
				<?php echo $rawmaterial_offer->raw_material->name; ?>
			</div>
		</div>
		<div class="row row-my">
			<div class="col-md-3">
				<strong>Seller Name:</strong>
			</div>
			<div class="col-md-9">
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
			<div class="col-md-3">
				<strong>Price:</strong>
			</div>
			<div class="col-md-9">
				$<?php echo number_format($rawmaterial_offer->price,2,'.'," "); ?> 
				<?php
					$unit = $rawmaterial_offer->raw_material->measurement->unit;
					if(strtolower(trim($unit)) != 'each') echo 'per';
				?>				
				<?php echo $rawmaterial_offer->raw_material->measurement->unit?>
			</div>
		</div>
		<div class="row row-my">
			<div class="col-md-3">
				<strong>Quantity left:</strong>
			</div>
			<div class="col-md-9">
			<?php echo $rawmaterial_offer->quantity_left; ?> 
			<?php 
					$unit = $rawmaterial_offer->raw_material->measurement->unit;
					if(strtolower(trim($unit)) != 'each') echo $unit;
				?>
			</div>
		</div>
		
		
		
		<div class="ln_solid"></div>

<div class="row row-my">
	<div class="col-md-10">
		<?php 
	list(, $userid) = Auth::get_user_id();  ?>
	
	<?php
	if(($rawmaterial_offer->seller_id)==($userid)): ?>
	<a href="<?php echo Uri::create('rawmaterial/offer/edit/'.$rawmaterial_offer->id); ?>" style="text-decoration: none">
		<button type="button" class="btn btn-primary btn-md btn-round">
			Edit
		</button>
	</a>
	
	<?php else: ?>
	<a href="<?php echo Uri::create('rm/sale/buy/'.$rawmaterial_offer->id); ?>" style="text-decoration: none">
		<button type="button" class="btn btn-primary btn-md btn-round">
			Buy Now
		</button>
	</a>
	<?php endif; ?>
	<a href="<?php echo Uri::create('rawmaterial/offer/index'); ?>" style="text-decoration: none">
		<button type="button" class="btn btn-warning btn-md btn-round">
			Back
		</button>
	</a>
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
		<img width="320px" class="thumbnail" src="<?php echo $file; ?>" />
	</div>
</div>
		
	</div>
</div>
</div>
