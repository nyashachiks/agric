<h2>Viewing <span class='muted'>#<?php echo $region->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $region->name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $region->description; ?></p>

<?php echo Html::anchor('region/edit/'.$region->id, 'Edit'); ?> |
<?php echo Html::anchor('region', 'Back'); ?>