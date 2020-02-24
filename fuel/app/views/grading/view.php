<h2>Viewing <span class='muted'>#<?php echo $grading->id; ?></span></h2>

<p>
	<strong>Inspection lot:</strong>
	<?php echo $grading->inspection_lot; ?></p>
<p>
	<strong>Material id:</strong>
	<?php echo $grading->material_id; ?></p>
<p>
	<strong>Quality score:</strong>
	<?php echo $grading->quality_score; ?></p>
<p>
	<strong>Valuation code:</strong>
	<?php echo $grading->valuation_code; ?></p>
<p>
	<strong>Date:</strong>
	<?php echo $grading->date; ?></p>
<p>
	<strong>Plant:</strong>
	<?php echo $grading->plant; ?></p>
<p>
	<strong>Quantity:</strong>
	<?php echo $grading->quantity; ?></p>
<p>
	<strong>Vendor number:</strong>
	<?php echo $grading->vendor_number; ?></p>

<?php echo Html::anchor('grading/edit/'.$grading->id, 'Edit'); ?> |
<?php echo Html::anchor('grading', 'Back'); ?>