<h2>Viewing <span class='muted'>#<?php echo $stopcode->id; ?></span></h2>

<p>
	<strong>Code:</strong>
	<?php echo $stopcode->code; ?></p>
<p>
	<strong>Vendor:</strong>
	<?php echo $stopcode->vendor; ?></p>
<p>
	<strong>Company code:</strong>
	<?php echo $stopcode->company_code; ?></p>
<p>
	<strong>Vendor name:</strong>
	<?php echo $stopcode->vendor_name; ?></p>
<p>
	<strong>Deduction rate:</strong>
	<?php echo $stopcode->deduction_rate; ?></p>

<strong>Deduction rate:</strong>
	<?php echo $stopcode->commission; ?></p>

<?php echo Html::anchor('stopcode/edit/'.$stopcode->id, 'Edit'); ?> |
<?php echo Html::anchor('stopcode', 'Back'); ?>