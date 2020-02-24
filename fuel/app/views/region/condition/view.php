<h2>Viewing <span class='muted'>#<?php echo $region_condition->id; ?></span></h2>

<p>
	<strong>Region id:</strong>
	<?php echo $region_condition->region_id; ?></p>
<p>
	<strong>Condition id:</strong>
	<?php echo $region_condition->condition_id; ?></p>

<?php echo Html::anchor('region/condition/edit/'.$region_condition->id, 'Edit'); ?> |
<?php echo Html::anchor('region/condition', 'Back'); ?>