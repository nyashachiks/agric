<h2>Viewing #<?php echo $stoporder->id; ?></h2>

<p>
	<strong>Company code:</strong>
	<?php echo $stoporder->company_code; ?></p>
<p>
	<strong>Stop order number:</strong>
	<?php echo $stoporder->stop_order_number; ?></p>
<p>
	<strong>Code:</strong>
	<?php echo $stoporder->code; ?></p>
<p>
	<strong>Farmer name:</strong>
	<?php echo $stoporder->farmer_name; ?></p>
<p>
	<strong>Farmer number:</strong>
	<?php echo $stoporder->farmer_number; ?></p>
<p>
	<strong>Farmer id:</strong>
	<?php echo $stoporder->farmer_id; ?></p>
<p>
	<strong>Material number:</strong>
	<?php echo $stoporder->material_number; ?></p>
<p>
	<strong>Max amount:</strong>
	<?php echo $stoporder->max_amount; ?></p>
<p>
	<strong>Depot:</strong>
	<?php echo $stoporder->depot; ?></p>
<p>
	<strong>Effective Date:</strong>
	<?php echo $stoporder->effective_date; ?></p>
<p>
	<strong>Text:</strong>
	<?php echo $stoporder->so_text; ?></p>
	


<?php echo Html::anchor('stoporder/edit/'.$stoporder->id, 'Edit'); ?> |
<?php echo Html::anchor('stoporder', 'Back'); ?>