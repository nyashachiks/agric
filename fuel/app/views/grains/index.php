<legend>Listing grains </legend>
<br>
<?php if ($grains): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($grains as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->description; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
											<?php echo Html::anchor('grains/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('grains/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger">There are no grains</div>
<?php endif; ?><p>
	<?php echo Html::anchor('grains/create', 'Add new Grain', array('class' => 'btn btn-success')); ?>

</p>
