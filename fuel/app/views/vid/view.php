<h2>Viewing #<?php echo $vid->id; ?></h2>

<p>
	<strong>National id:</strong>
	<?php echo $vid->national_id; ?></p>
<p>
	<strong>Details:</strong>
	<?php echo $vid->details; ?></p>
<p>
	<strong>License type:</strong>
	<?php echo $vid->license_type; ?></p>
<p>
	<strong>Amount:</strong>
	<?php echo $vid->amount; ?></p>

<?php echo Html::anchor('vid/edit/'.$vid->id, 'Edit'); ?> |
<?php echo Html::anchor('vid', 'Back'); ?>