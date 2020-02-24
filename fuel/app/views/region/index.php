<h2>Listing <span class='muted'>Regions</span></h2>
<br>
<?php if ($regions): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($regions as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->description; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('region/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('region/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('region/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Regions.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('region/create', 'Add new Region', array('class' => 'btn btn-success')); ?>

</p>
