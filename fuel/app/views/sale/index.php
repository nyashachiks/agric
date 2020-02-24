<h2>Listing <span class='muted'>Sales</span></h2>
<br>
<?php if ($sales): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Productoffer id</th>
			<th>Bid id</th>
			<th>Status</th>
			<th>Amount</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($sales as $item): ?>		<tr>

			<td><?php echo $item->productoffer_id; ?></td>
			<td><?php echo $item->bid_id; ?></td>
			<td><?php echo $item->status; ?></td>
			<td><?php echo $item->amount; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('sale/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('sale/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('sale/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Sales.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('sale/create', 'Add new Sale', array('class' => 'btn btn-success')); ?>

</p>
