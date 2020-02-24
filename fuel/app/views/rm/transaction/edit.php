<h2>Editing Rm_transaction</h2>
<br>

<?php echo render('rm/transaction/_form'); ?>
<p>
	<?php echo Html::anchor('rm/transaction/view/'.$rm_transaction->id, 'View'); ?> |
	<?php echo Html::anchor('rm/transaction', 'Back'); ?></p>
