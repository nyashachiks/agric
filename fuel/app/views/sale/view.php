<h2>Viewing <span class='muted'>#<?php echo $sale->id; ?></span></h2>

<p>
	<strong>Productoffer id:</strong>
	<?php echo $sale->productoffer_id; ?></p>
<p>
	<strong>Bid id:</strong>
	<?php echo $sale->bid_id; ?></p>
<p>
	<strong>Status:</strong>
	<?php echo $sale->status; ?></p>
<p>
	<strong>Amount:</strong>
	<?php echo $sale->amount; ?></p>

<?php echo Html::anchor('sale/edit/'.$sale->id, 'Edit'); ?> |
<?php echo Html::anchor('sale', 'Back'); ?>