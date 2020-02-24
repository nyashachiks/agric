<h2>Viewing <span class='muted'>#<?php echo $registration->id; ?></span></h2>

<p>
	<strong>User id:</strong>
	<?php echo $registration->user_id; ?></p>
<p>
	<strong>Amount:</strong>
	<?php echo $registration->amount; ?></p>
<p>
	<strong>Narrative:</strong>
	<?php echo $registration->narrative; ?></p>
<p>
	<strong>Status:</strong>
	<?php echo $registration->status; ?></p>
<p>
	<strong>Browseurl:</strong>
	<?php echo $registration->browseurl; ?></p>
<p>
	<strong>Pollurl:</strong>
	<?php echo $registration->pollurl; ?></p>
<p>
	<strong>Paynowref:</strong>
	<?php echo $registration->paynowref; ?></p>
<p>
	<strong>Paymentstatus:</strong>
	<?php echo $registration->paymentstatus; ?></p>
<p>
	<strong>Mobile:</strong>
	<?php echo $registration->mobile; ?></p>

<?php echo Html::anchor('registration/edit/'.$registration->id, 'Edit'); ?> |
<?php echo Html::anchor('registration', 'Back'); ?>