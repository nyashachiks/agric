<h2>Viewing <span class='muted'>#<?php echo $seasonfarming->id; ?></span></h2>

<p>
	<strong>Farm id:</strong>
	<?php echo $seasonfarming->farm_id; ?></p>
<p>
	<strong>Year:</strong>
	<?php echo $seasonfarming->year; ?></p>
<p>
	<strong>Product id:</strong>
	<?php echo $seasonfarming->product_id; ?></p>
<p>
	<strong>Season id:</strong>
	<?php echo $seasonfarming->season_id; ?></p>

<?php echo Html::anchor('seasonfarming/edit/'.$seasonfarming->id, 'Edit'); ?> |
<?php echo Html::anchor('seasonfarming', 'Back'); ?>