<h2>Viewing <span class='muted'>#<?php echo $correctivemeasure->id; ?></span></h2>

<p>
	<strong>Description:</strong>
	<?php echo $correctivemeasure->description; ?></p>
<p>
	<strong>Disease id:</strong>
	<?php echo $correctivemeasure->disease_id; ?></p>

<?php echo Html::anchor('correctivemeasure/edit/'.$correctivemeasure->id, 'Edit'); ?> |
<?php echo Html::anchor('correctivemeasure', 'Back'); ?>