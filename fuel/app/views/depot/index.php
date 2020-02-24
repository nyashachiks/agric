<h2>Listing <span class='muted'>Depots</span></h2>
<br>
<?php if ($depots): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Plant</th>
			<th>Short name</th>
			<th>Name</th>
			<th>City</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($depots as $item): ?>		<tr>

			<td><?php echo $item->plant; ?></td>
			<td><?php echo $item->short_name; ?></td>
			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->city; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('depot/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('depot/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('depot/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Depots.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('depot/create', 'Add new Depot', array('class' => 'btn btn-success')); ?>

</p>
