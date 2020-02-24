<h2>Viewing <span class='muted'><?php echo $productoffer->product->name; ?> on offer</span></h2>

<p>
	<strong>Product Name:</strong>
	<?php echo $productoffer->product->name; ?>
</p>
<p>
	<strong>Farmer Name:</strong>
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
	<?php echo $firstname.' '.$lastname; ?></p>
<p>
	<strong>Market:</strong>
	<?php echo $productoffer->market->name; ?></p>
<p>
	<strong>Price:</strong>
	$<?php echo $productoffer->price; ?> per <?php echo $productoffer->product->measurement->unit?></p>
<p>
	<strong>Quanity:</strong>
	<?php echo $productoffer->quanity; ?> <?php echo $productoffer->product->measurement->unit?>s</p>
<p>
	<strong>Minimum Order Quantity:</strong>
	<?php echo $productoffer->min_quantity; ?> <?php echo $productoffer->product->measurement->unit?>s</p>
<p>
	<strong>Product Rating:</strong>
	<?php echo $productoffer->product_status; ?> </p>
<p>

	<?php 	echo Html::anchor('productoffer/agri_edit/'.$productoffer->id, '<i class="glyphicon glyphicon-ok-sign"> Grade Product</i>',
	 array('class'=>'btn btn-primary btn-lg btn-20')); ?>
	
</p>	
<?php 
	echo '<br/><br/>';
	echo Html::anchor('dashboard', '<i class="glyphicon glyphicon-chevron-left"> Back</i>', array('class'=>'btn btn-primary btn-lg btn-20')); 
?>