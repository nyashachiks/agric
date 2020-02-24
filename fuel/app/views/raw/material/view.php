<h2>Viewing #<?php echo $raw_material->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $raw_material->name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $raw_material->description; ?></p>
<p>
	<strong>Measurement id:</strong>
	<?php echo $raw_material->measurement_id; ?></p>

<?php echo Html::anchor('raw/material/edit/'.$raw_material->id, 'Edit'); ?> |
<?php echo Html::anchor('raw/material', 'Back'); ?>