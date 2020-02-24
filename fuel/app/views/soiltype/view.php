<h2>Viewing <span class='muted'>#<?php echo $soiltype->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $soiltype->name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $soiltype->description; ?></p>

<?php echo Html::anchor('soiltype/edit/'.$soiltype->id, 'Edit'); ?> |
<?php echo Html::anchor('soiltype', 'Back'); ?>