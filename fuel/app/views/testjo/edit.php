<h2>Editing Testjo</h2>
<br>

<?php echo render('testjo/_form'); ?>
<p>
	<?php echo Html::anchor('testjo/view/'.$testjo->id, 'View'); ?> |
	<?php echo Html::anchor('testjo', 'Back'); ?></p>
