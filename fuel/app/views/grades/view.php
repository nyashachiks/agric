<h2>Viewing <span class='muted'>#<?php echo $grade->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $grade->name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $grade->description; ?></p>

<?php echo Html::anchor('grades/edit/'.$grade->id, 'Edit'); ?> |
<?php echo Html::anchor('grades', 'Back'); ?>