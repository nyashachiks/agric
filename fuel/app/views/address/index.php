<h2>Listing <span class='muted'>Addresses</span></h2>
<br>
<?php if ($addresses): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Address</th>
			<th>Address2</th>
			<th>District</th>
			<th>Postal code</th>
			<th>Phone</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($addresses as $item): ?>		<tr>

			<td><?php echo $item->address; ?></td>
			<td><?php //echo $item->address2; ?></td>
			<td><?php echo $item->district; ?></td>
			<td><?php //echo $item->postal_code; ?></td>
			<td><?php echo $item->phone; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('address/view/'.$item->id, '<i class="glyphicon glyphicon-eye-open"></i> View', 
							array('class' => 'btn btn-info btn-sm')); ?>						
						<?php echo Html::anchor('address/edit/'.$item->id, '<i class="glyphicon glyphicon-wrench"></i> Edit', 
							array('class' => 'btn btn-primary btn-sm')); ?>						
						<?php echo Html::anchor('address/delete/'.$item->id, '<i class="glyphicon glyphicon-trash icon-white"></i> Delete', 
							array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Addresses.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('address/create', 'Add new Address', array('class' => 'btn btn-primary')); ?>

</p>
