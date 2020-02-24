<h2>Viewing <span class='muted'>#<?php echo $stage->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $stage->name; ?></p>

<?php echo Html::anchor('stage/edit/'.$stage->id, 'Edit'); ?> |
<?php echo Html::anchor('stage', 'Back'); ?>