<h2>Viewing <span class='muted'>#<?php echo $farmguide->id; ?></span></h2>

<p>
	<strong>Activity id:</strong>
	<?php echo $farmguide->activity_id; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $farmguide->description; ?></p>

<?php echo Html::anchor('farmguide/edit/'.$farmguide->id, 'Edit'); ?> |
<?php echo Html::anchor('farmguide', 'Back'); ?>