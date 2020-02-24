<h2>Editing <span class='muted'>Registration</span></h2>
<br>

<?php echo render('registration/_form'); ?>
<p>
	<?php echo Html::anchor('registration/view/'.$registration->id, 'View'); ?> |
	<?php echo Html::anchor('registration', 'Back'); ?></p>
