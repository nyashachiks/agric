<h2>Viewing <span class='muted'>#<?php echo $condtion->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $condtion->name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $condtion->description; ?></p>

<?php echo Html::anchor('condtion/edit/'.$condtion->id, 'Edit'); ?> |
<?php echo Html::anchor('condtion', 'Back'); ?>