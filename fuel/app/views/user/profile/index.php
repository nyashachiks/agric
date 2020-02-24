<h2>Listing All Farmers</h2>
<br/>
<p>
	<?php echo Html::anchor('farmer/register', 'Register a new farmer', array('class' => 'btn btn-success')); ?>

</p>
<?php if ($user_profiles): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
				<th>National Id</th>
				<th>Gender</th>
				<th>Vendor Number</th>
				<th>Action</th>
			<th>&nbsp;</th>
			
		</tr>
	</thead>
	<tbody>
					<?php foreach ($user_profiles as $item): ?>		
						<tr>
							<td><?php echo Model_User::get_full_name($item->user_id); ?></td>
							<td><?php echo $item->national_id; ?></td>
							<td><?php echo $item->gender; ?></td>
							<td><?php echo $item->vendor_number; ?></td>
							<td>
							<div class="btn-toolbar">
								<div class="btn-group">
								<?php echo Html::anchor('user/profile/edit/'.$item->id, '<i class="glyphicon glyphicon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>
						<?php echo Html::anchor('user/profile/view/'.$item->id, '<i class="glyphicon glyphicon-wrench"></i> View', array('class' => 'btn btn-default btn-sm')); ?>
						<?php echo Html::anchor('user/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>
								</div>
								</div>

							</td>
						</tr>
				<?php endforeach; ?>	
	</tbody>

</table>

<?php else: ?>
<p>No User_profiles.</p>

<?php endif; ?>
