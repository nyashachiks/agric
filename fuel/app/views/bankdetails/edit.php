<h2>Editing Bankdetail</h2>
<br>

<?php echo render('bankdetails/_form'); ?>
<p>
	<?php echo Html::anchor('bankdetails/view/'.$bankdetail->id, 'View'); ?> |
	<?php echo Html::anchor('bankdetails', 'Back'); ?></p>
