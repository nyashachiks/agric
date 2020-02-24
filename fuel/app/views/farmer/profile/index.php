<h2>Listing User_profiles</h2>
<br>
<?php if ($user_profiles): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>User id</th>
			<th>National id</th>
			<th>Gender</th>
			<th>Date of birth</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($user_profiles as $user_profile): ?>		<tr>

			<td><?php echo $user_profile->user_id; ?></td>
			<td><?php echo $user_profile->national_id; ?></td>
			<td><?php echo $user_profile->gender; ?></td>
			<td><?php echo $user_profile->date_of_birth; ?></td>
			<td>
				<?php echo Html::anchor('user/profile/view/'.$user_profile->id, 'View'); ?> |
				<?php echo Html::anchor('user/profile/edit/'.$user_profile->id, 'Edit'); ?> |
				<?php echo Html::anchor('user/profile/delete/'.$user_profile->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No User_profiles.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('user/profile/create', 'Add new User profile', array('class' => 'btn btn-success')); ?>

</p>
