<h2>Viewing <span class='muted'>#<?php echo $season->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $season->name; ?></p>

<?php echo Html::anchor('season/edit/'.$season->id, 'Edit'); ?> |
<?php echo Html::anchor('season', 'Back'); ?>