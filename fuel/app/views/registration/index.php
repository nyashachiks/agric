<h2>Listing <span class='muted'>Registrations</span></h2>
<br>
<?php if ($registrations): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>User id</th>
			<th>Amount</th>
			<th>Narrative</th>
			<th>Status</th>
			<th>Browseurl</th>
			<th>Pollurl</th>
			<th>Paynowref</th>
			<th>Paymentstatus</th>
			<th>Mobile</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($registrations as $item): ?>		<tr>

			<td><?php echo $item->user_id; ?></td>
			<td><?php echo $item->amount; ?></td>
			<td><?php echo $item->narrative; ?></td>
			<td><?php echo $item->status; ?></td>
			<td><?php echo $item->browseurl; ?></td>
			<td><?php echo $item->pollurl; ?></td>
			<td><?php echo $item->paynowref; ?></td>
			<td><?php echo $item->paymentstatus; ?></td>
			<td><?php echo $item->mobile; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('registration/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('registration/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('registration/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Registrations.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('registration/create', 'Add new Registration', array('class' => 'btn btn-success')); ?>

</p>
