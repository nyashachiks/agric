<h2>Viewing #<?php echo $bankdetail->id; ?></h2>

<p>
	<strong>Farmer id:</strong>
	<?php echo $bankdetail->farmer_id; ?></p>
<p>
	<strong>Bank name:</strong>
	<?php echo $bankdetail->bank_name; ?></p>
<p>
	<strong>Branch name:</strong>
	<?php echo $bankdetail->branch_name; ?></p>
<p>
	<strong>Account number:</strong>
	<?php echo $bankdetail->account_number; ?></p>
<p>
	<strong>Account name:</strong>
	<?php echo $bankdetail->account_name; ?></p>

<?php echo Html::anchor('bankdetails/edit/'.$bankdetail->id, 'Edit'); ?> |
<?php echo Html::anchor('bankdetails', 'Back'); ?>