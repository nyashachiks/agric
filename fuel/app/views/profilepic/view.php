<h2>Viewing <span class='muted'>#<?php echo $profilepic->id; ?></span></h2>

<p>
	<strong>User id:</strong>
	<?php echo $profilepic->user_id; ?></p>
<p>
	<strong>Saved as:</strong>
	<?php echo $profilepic->saved_as; ?></p>
<p>
	<strong>Actual name:</strong>
	<?php echo $profilepic->actual_name; ?></p>

<?php echo Html::anchor('profilepic/edit/'.$profilepic->id, 'Edit'); ?> |
<?php echo Html::anchor('profilepic', 'Back'); ?>