<h2>Viewing <span class='muted'>#<?php echo $structure->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $structure->name; ?></p>
<p>
	<strong>Type:</strong>
	<?php echo $structure->type; ?></p>

<?php echo Html::anchor('structure/edit/'.$structure->id, 'Edit'); ?> |
<?php echo Html::anchor('structure', 'Back'); ?>