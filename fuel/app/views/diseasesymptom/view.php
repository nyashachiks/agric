<h2>Viewing <span class='muted'>#<?php echo $diseasesymptom->id; ?></span></h2>

<p>
	<strong>Disease id:</strong>
	<?php echo $diseasesymptom->disease_id; ?></p>
<p>
	<strong>Symptom id:</strong>
	<?php echo $diseasesymptom->symptom_id; ?></p>

<?php echo Html::anchor('diseasesymptom/edit/'.$diseasesymptom->id, 'Edit'); ?> |
<?php echo Html::anchor('diseasesymptom', 'Back'); ?>