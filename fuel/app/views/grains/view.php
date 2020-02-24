<h2>Viewing <span class='muted'>#<?php echo $grain->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $grain->name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $grain->description; ?></p>

<?php echo Html::anchor('grains/edit/'.$grain->id, 'Edit'); ?> |
<?php echo Html::anchor('grains', 'Back'); ?>