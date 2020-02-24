<h2>Editing <span class='muted'>Sm</span></h2>
<br>

<?php echo render('sms/_form'); ?>
<p>
	<?php echo Html::anchor('sms/view/'.$sm->id, 'View'); ?> |
	<?php echo Html::anchor('sms', 'Back'); ?></p>
