<h2>Editing <span class='muted'>Grade</span></h2>
<br>

<?php echo render('grades/_form'); ?>
<p>
	<?php echo Html::anchor('grades/view/'.$grade->id, 'View'); ?> |
	<?php echo Html::anchor('grades', 'Back'); ?></p>
