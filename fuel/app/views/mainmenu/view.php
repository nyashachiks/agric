<h2>Viewing <span class='muted'>#<?php echo $mainmenu->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $mainmenu->name; ?></p>
<p>
	<strong>Url:</strong>
	<?php echo $mainmenu->url; ?></p>
<p>
	<strong>Position:</strong>
	<?php echo $mainmenu->position; ?></p>

<?php echo Html::anchor('mainmenu/edit/'.$mainmenu->id, 'Edit'); ?> |
<?php echo Html::anchor('mainmenu', 'Back'); ?>