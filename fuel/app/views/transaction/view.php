<h2>Viewing <span class='muted'>#<?php echo $transaction->id; ?></span></h2>

<p>
	<strong>Sale id:</strong>
	<?php echo $transaction->sale_id; ?></p>
<p>
	<strong>Amount:</strong>
	<?php echo $transaction->amount; ?></p>
<p>
	<strong>Narrative:</strong>
	<?php echo $transaction->narrative; ?></p>
<p>
	<strong>Status:</strong>
	<?php echo $transaction->status; ?></p>
<p>
	<strong>Browse Url:</strong>
	<?php echo $transaction->browseurl; ?></p>
<p>
	<strong>Poll Url:</strong>
	<?php echo $transaction->pollurl; ?></p>
<p>
	<strong>Paynow Reference:</strong>
	<?php echo $transaction->paynowref; ?></p>
<p>
	<strong>Payment Status:</strong>
	<?php echo $transaction->paymentstatus; ?></p>
<p>
	<strong>Mobile:</strong>
	<?php echo $transaction->mobile; ?></p>

<?php echo Html::anchor('transaction/edit/'.$transaction->id, 'Edit'); ?> |
<?php echo Html::anchor('transaction', 'Back'); ?>