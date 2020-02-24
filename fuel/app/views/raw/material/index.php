<h2>Listing All Raw Materials</h2>
<br/>
<?php echo Html::anchor('raw/material/create', 'Add new Raw material', array('class' => 'btn btn-success')); ?>
<?php if ($raw_materials): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Measurement</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($raw_materials as $raw_material): ?>		<tr>

			<td><?php echo $raw_material->name; ?></td>
			<td><?php echo $raw_material->description; ?></td>
			<td><?php echo $raw_material->measurement->unit; ?></td>
			<td>
				<?php echo Html::anchor('raw/material/view/'.$raw_material->id, 'View'); ?> |
				<?php echo Html::anchor('raw/material/edit/'.$raw_material->id, 'Edit'); ?> |
				<?php echo Html::anchor('raw/material/delete/'.$raw_material->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Raw_materials.</p>

<?php endif; ?><p>
	

</p>
