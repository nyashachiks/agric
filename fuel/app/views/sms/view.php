<h2>Viewing <span class='muted'>#<?php echo $sm->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $sm->id; ?></p>
<p>
	<strong>Username:</strong>
	<?php echo $sm->username; ?></p>
<p>
	<strong>Sender id:</strong>
	<?php echo $sm->sender_id; ?></p>
<p>
	<strong>Recipients:</strong>
	<?php echo $sm->recipients; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $sm->body; ?></p>
<p>
	<strong>Sending number:</strong>
	<?php echo $sm->sending_number; ?></p>
<p>
	<strong>Message id:</strong>
	<?php echo $sm->message_id; ?></p>

<?php echo Html::anchor('sms/edit/'.$sm->id, 'Edit'); ?> |
<?php echo Html::anchor('sms', 'Back'); ?>