<h2>Viewing <span class='muted'>#<?php echo $input->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $input->name; ?></p>
<p>
	<strong>Activity id:</strong>
	<?php echo $input->activity_id; ?></p>
<p>
	<strong>Cost:</strong>
	<?php echo $input->cost_per_unit.'per'.$input->unit; ?></p>
<p>
	<strong>Quantity:</strong>
	<?php echo $input->quantity; ?></p>
<p>
	<strong>Total cost:</strong>
	<?php echo $input->total_cost; ?></p>

<?php echo Html::anchor('input/edit/'.$input->id, 'Edit'); ?> |
<?php echo Html::anchor('input', 'Back'); ?>