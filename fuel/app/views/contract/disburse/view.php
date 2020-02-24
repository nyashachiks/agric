<h2>Viewing #<?php echo $contract_disburse->id; ?></h2>

<p>
	<strong>Contractquantities id:</strong>
	<?php echo $contract_disburse->contractquantities_id; ?></p>
<p>
	<strong>Userdisbursed:</strong>
	<?php echo $contract_disburse->userdisbursed; ?></p>
<p>
	<strong>Date:</strong>
	<?php echo $contract_disburse->date; ?></p>
<p>
	<strong>Quantities:</strong>
	<?php echo $contract_disburse->quantities; ?></p>

<?php echo Html::anchor('contract/disburse/edit/'.$contract_disburse->id, 'Edit'); ?> |
<?php echo Html::anchor('contract/disburse', 'Back'); ?>