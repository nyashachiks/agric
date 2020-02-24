<h2>Viewing #<?php echo $user_profile->id; ?></h2>

<p>
	<strong>User id:</strong>
	<?php echo $user_profile->user_id; ?></p>
<p>
	<strong>National id:</strong>
	<?php echo $user_profile->national_id; ?></p>
<p>
	<strong>Gender:</strong>
	<?php echo $user_profile->gender; ?></p>
<p>
	<strong>Date of birth:</strong>
	<?php echo $user_profile->date_of_birth; ?></p>

<?php echo Html::anchor('user/profile/edit/'.$user_profile->id, 'Edit'); ?> |
<?php echo Html::anchor('user/profile', 'Back'); ?>