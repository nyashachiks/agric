<h2>Editing Student</h2>
<br>

<?php echo render('student/_form'); ?>
<p>
	<?php echo Html::anchor('student/view/'.$student->id, 'View'); ?> |
	<?php echo Html::anchor('student', 'Back'); ?></p>
