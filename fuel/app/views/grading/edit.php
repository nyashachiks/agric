<h2>Editing <span class='muted'>Grading</span></h2>
<br>

<?php echo render('grading/_form'); ?>
<p>
	<?php echo Html::anchor('grading/view/'.$grading->id, 'View'); ?> |
	<?php echo Html::anchor('grading', 'Back'); ?></p>
