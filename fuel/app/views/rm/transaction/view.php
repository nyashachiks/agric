<h2>Viewing #<?php echo $rm_transaction->id; ?></h2>

<p>
	<strong>Rm sale id:</strong>
	<?php echo $rm_transaction->rm_sale_id; ?></p>
<p>
	<strong>Amount:</strong>
	<?php echo $rm_transaction->amount; ?></p>
<p>
	<strong>Narrative:</strong>
	<?php echo $rm_transaction->narrative; ?></p>
<p>
	<strong>Status:</strong>
	<?php echo $rm_transaction->status; ?></p>
<p>
	<strong>Browse url:</strong>
	<?php echo $rm_transaction->browse_url; ?></p>
<p>
	<strong>Poll url:</strong>
	<?php echo $rm_transaction->poll_url; ?></p>
<p>
	<strong>Paynow ref:</strong>
	<?php echo $rm_transaction->paynow_ref; ?></p>
<p>
	<strong>Payment status:</strong>
	<?php echo $rm_transaction->payment_status; ?></p>
<p>
	<strong>Mobile:</strong>
	<?php echo $rm_transaction->mobile; ?></p>

<?php echo Html::anchor('rm/transaction/edit/'.$rm_transaction->id, 'Edit'); ?> |
<?php echo Html::anchor('rm/transaction', 'Back'); ?>