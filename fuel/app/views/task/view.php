<h2>Viewing <span class='muted'>#<?php echo $Task->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $Task->name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $Task->description; ?></p>

<?php echo Html::anchor('task/edit/'.$Task->id, 'Edit'); ?> |
<?php echo Html::anchor('task', 'Back'); ?>