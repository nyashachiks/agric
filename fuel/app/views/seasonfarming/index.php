<h2>Listing <span class='muted'>Seasonfarmings</span></h2>
<br>
<?php if ($seasonfarmings): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Farm id</th>
			<th>Year</th>
			<th>Product id</th>
			<th>Season id</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($seasonfarmings as $item): ?>		<tr>

			<td><?php echo $item->farm_id; ?></td>
			<td><?php echo $item->year; ?></td>
			<td><?php echo $item->product_id; ?></td>
			<td><?php echo $item->season_id; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('seasonfarming/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('seasonfarming/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('seasonfarming/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Seasonfarmings.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('seasonfarming/create', 'Add new Seasonfarming', array('class' => 'btn btn-success')); ?>

</p>
