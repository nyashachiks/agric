<h2>Viewing <span class='muted'><?php echo $rawmaterial_offer->brand_name; ?> on offer</span></h2>

<p>
	<strong>Product Name:</strong>
	<?php echo $rawmaterial_offer->raw_material->name; ?>
</p>
<p>
	<strong>Seller Name:</strong>
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
	<?php echo $firstname.' '.$lastname; ?></p>

	<strong>Price:</strong>
	$<?php echo $rawmaterial_offer->price; ?> per <?php echo $rawmaterial_offer->raw_material->measurement->unit?></p>
<p>
	<strong>Quanity:</strong>
	<?php echo $rawmaterial_offer->quantity; ?> <?php echo $rawmaterial_offer->raw_material->measurement->unit?>s</p>

	<strong>Product Rating:</strong>
	<?php echo $rawmaterial_offer->raw_matrial_status; ?> </p>
<p>

	<?php 	echo Html::anchor('productoffer/agri_edit/'.$rawmaterial_offer->id, '<i class="glyphicon glyphicon-ok-sign"> Grade Product</i>',
	 array('class'=>'btn btn-primary btn-lg btn-20')); ?>
	
</p>	
<?php 
	echo '<br/><br/>';
	echo Html::anchor('dashboard', '<i class="glyphicon glyphicon-chevron-left"> Back</i>', array('class'=>'btn btn-primary btn-lg btn-20')); 
?>