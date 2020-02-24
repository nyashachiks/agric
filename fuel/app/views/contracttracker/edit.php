<h2>Editing Contracttracker</h2>
<br>

<?php echo render('contracttracker/_form'); ?>
<p>
	<?php echo Html::anchor('contracttracker/view/'.$contracttracker->id, 'View'); ?> |
	<?php echo Html::anchor('contracttracker', 'Back'); ?></p>
