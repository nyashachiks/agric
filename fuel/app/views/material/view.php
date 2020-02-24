<h2>Viewing <span class='muted'>#<?php echo $material->id; ?></span></h2>

<p>
	<strong>Code:</strong>
	<?php echo $material->code; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $material->description; ?></p>

<?php echo Html::anchor('material/edit/'.$material->id, 'Edit'); ?> |
<?php echo Html::anchor('material', 'Back'); ?>