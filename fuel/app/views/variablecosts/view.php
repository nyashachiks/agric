<h2>Viewing <span class='muted'>#<?php echo $variablecost->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $variablecost->name; ?></p>

<?php echo Html::anchor('variablecosts/edit/'.$variablecost->id, 'Edit'); ?> |
<?php echo Html::anchor('variablecosts', 'Back'); ?>