<h2>Editing <span class='muted'>Symptom</span></h2>
<br>

<?php echo render('symptom/_form'); ?>
<p>
	<?php echo Html::anchor('symptom/view/'.$symptom->id, 'View'); ?> |
	<?php echo Html::anchor('symptom', 'Back'); ?></p>
