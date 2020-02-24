<h2>Viewing #<?php echo $stakeholder_Tradingdetail->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $stakeholder_Tradingdetail->name; ?></p>
<p>
	<strong>Additional details:</strong>
	<?php echo $stakeholder_Tradingdetail->additional_details; ?></p>

<?php echo Html::anchor('stakeholder/tradingdetails/edit/'.$stakeholder_Tradingdetail->id, 'Edit'); ?> |
<?php echo Html::anchor('stakeholder/tradingdetails', 'Back'); ?>