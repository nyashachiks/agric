<h2>Viewing #<?php echo $contractortracker->id; ?></h2>

<p>
	<strong>Contracttracker id:</strong>
	<?php echo $contractortracker->contracttracker_id; ?></p>
<p>
	<strong>Notes:</strong>
	<?php echo $contractortracker->notes; ?></p>
<p>
	<strong>Date:</strong>
	<?php echo $contractortracker->date; ?></p>
<p>
	<strong>Status:</strong>
	<?php echo $contractortracker->status; ?></p>

<?php echo Html::anchor('contractortracker/edit/'.$contractortracker->id, 'Edit'); ?> |
<?php echo Html::anchor('contractortracker', 'Back'); ?>