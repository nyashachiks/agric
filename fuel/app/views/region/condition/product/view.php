<h2>Viewing <span class='muted'>#<?php echo $region_condition_product->id; ?></span></h2>

<p>
	<strong>Region condition id:</strong>
	<?php echo $region_condition_product->region_condition_id; ?></p>
<p>
	<strong>Product id:</strong>
	<?php echo $region_condition_product->product_id; ?></p>

<?php echo Html::anchor('region/condition/product/edit/'.$region_condition_product->id, 'Edit'); ?> |
<?php echo Html::anchor('region/condition/product', 'Back'); ?>