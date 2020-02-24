<h2>Listing <span class='muted'>Cocodes</span></h2>
<br>
<?php if ($cocodes): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Co code</th>
			<th>Co name</th>
			<th>City</th>
			<th>Currency</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($cocodes as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->co_code; ?></td>
			<td><?php echo $item->co_name; ?></td>
			<td><?php echo $item->city; ?></td>
			<td><?php echo $item->currency; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('cocode/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('cocode/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('cocode/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Cocodes.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('cocode/create', 'Add new Cocode', array('class' => 'btn btn-success')); ?>

</p>
