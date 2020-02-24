<h2>Listing <span class='muted'>Documents</span></h2>
<br>
<?php if ($documents): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>User id</th>
			<th>Description</th>
			<th>Saved as</th>
			<th>Actual name</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($documents as $item): ?>		<tr>

			<td><?php echo $item->user_id; ?></td>
			<td><?php echo $item->description; ?></td>
			<td><?php echo $item->saved_as; ?></td>
			<td><?php echo $item->actual_name; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('document/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('document/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('document/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Documents.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('document/create', 'Add new Document', array('class' => 'btn btn-success')); ?>

</p>
