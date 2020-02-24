<h2>Viewing <span class='muted'>#<?php echo $depot->id; ?></span></h2>

<p>
	<strong>Plant:</strong>
	<?php echo $depot->plant; ?></p>
<p>
	<strong>Short name:</strong>
	<?php echo $depot->short_name; ?></p>
<p>
	<strong>Name:</strong>
	<?php echo $depot->name; ?></p>
<p>
	<strong>City:</strong>
	<?php echo $depot->city; ?></p>

<?php echo Html::anchor('depot/edit/'.$depot->id, 'Edit'); ?> |
<?php echo Html::anchor('depot', 'Back'); ?>