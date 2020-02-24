<h2>Listing <span class='muted'>Materials</span></h2>
<br>
<?php if ($materials): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Code</th>
			<th>Description</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($materials as $item): ?>		<tr>

			<td><?php echo $item->code; ?></td>
			<td><?php echo $item->description; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('material/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('material/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('material/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Materials.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('material/create', 'Add new Material', array('class' => 'btn btn-success')); ?>

</p>
