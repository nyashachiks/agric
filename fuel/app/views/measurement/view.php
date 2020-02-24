<h2>Viewing <span class='muted'>#<?php echo $measurement->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $measurement->name; ?></p>
<p>
	<strong>Unit:</strong>
	<?php echo $measurement->unit; ?></p>

<?php echo Html::anchor('measurement/edit/'.$measurement->id, 'Edit'); ?> |
<?php echo Html::anchor('measurement', 'Back'); ?>