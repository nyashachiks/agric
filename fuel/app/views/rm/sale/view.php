<h2>Viewing #<?php echo $rm_sale->id; ?></h2>

<p>
	<strong>Rm offer id:</strong>
	<?php echo $rm_sale->rm_offer_id; ?></p>
<p>
	<strong>Buyer id:</strong>
	<?php echo $rm_sale->buyer_id; ?></p>
<p>
	<strong>Price:</strong>
	<?php echo $rm_sale->price; ?></p>
<p>
	<strong>Quantity:</strong>
	<?php echo $rm_sale->quantity; ?></p>
<p>
	<strong>Total:</strong>
	<?php echo $rm_sale->total; ?></p>

<?php echo Html::anchor('rm/sale/edit/'.$rm_sale->id, 'Edit'); ?> |
<?php echo Html::anchor('rm/sale', 'Back'); ?>