<h2>Viewing <span class='muted'>#<?php echo $symptom->id; ?></span></h2>

<p>
	<strong>Description:</strong>
	<?php echo $symptom->description; ?></p>

<?php echo Html::anchor('symptom/edit/'.$symptom->id, 'Edit'); ?> |
<?php echo Html::anchor('symptom', 'Back'); ?>