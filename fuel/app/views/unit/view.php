<h2>Viewing <span class='muted'>#<?php echo $unit->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $unit->name; ?></p>

<?php echo Html::anchor('unit/edit/'.$unit->id, 'Edit'); ?> |
<?php echo Html::anchor('unit', 'Back'); ?>