<h2>Viewing <span class='muted'>#<?php echo $bid->id; ?></span></h2>

<p>
	<strong>Productoffer id:</strong>
	<?php echo $bid->productoffer_id; ?></p>
<p>
	<strong>Buyer id:</strong>
	<?php echo $bid->buyer_id; ?></p>
<p>
	<strong>Price:</strong>
	<?php echo $bid->price; ?></p>
<p>
	<strong>Quantity:</strong>
	<?php echo $bid->quantity; ?></p>
<p>
	<strong>Type:</strong>
	<?php echo $bid->type; ?></p>

<?php echo Html::anchor('bid/edit/'.$bid->id, 'Edit'); ?> |
<?php echo Html::anchor('bid', 'Back'); ?>