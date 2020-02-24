<h2>Viewing <span class='muted'>#<?php echo $activity->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $activity->name; ?></p>
<p>
	<strong>Budget id:</strong>
	<?php echo $activity->budget_id; ?></p>

<?php echo Html::anchor('activity/edit/'.$activity->id, 'Edit'); ?> |
<?php echo Html::anchor('activity', 'Back'); ?>