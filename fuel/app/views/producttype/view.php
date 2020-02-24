<h2>Viewing <span class='muted'>#<?php echo $producttype->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $producttype->name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $producttype->description; ?></p>

<?php echo Html::anchor('producttype/edit/'.$producttype->id, 'Edit'); ?> |
<?php echo Html::anchor('producttype', 'Back'); ?>