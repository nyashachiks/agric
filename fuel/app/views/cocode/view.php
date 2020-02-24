<h2>Viewing <span class='muted'>#<?php echo $cocode->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $cocode->id; ?></p>
<p>
	<strong>Co code:</strong>
	<?php echo $cocode->co_code; ?></p>
<p>
	<strong>Co name:</strong>
	<?php echo $cocode->co_name; ?></p>
<p>
	<strong>City:</strong>
	<?php echo $cocode->city; ?></p>
<p>
	<strong>Currency:</strong>
	<?php echo $cocode->currency; ?></p>

<?php echo Html::anchor('cocode/edit/'.$cocode->id, 'Edit'); ?> |
<?php echo Html::anchor('cocode', 'Back'); ?>