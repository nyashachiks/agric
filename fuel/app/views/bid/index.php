<h2>Listing <span class='muted'>Bids</span></h2>
<br>
<?php if ($bids): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Productoffer id</th>
			<th>Buyer id</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Type</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($bids as $item): ?>		<tr>

			<td><?php echo $item->productoffer_id; ?></td>
			<td><?php echo $item->buyer_id; ?></td>
			<td><?php echo $item->price; ?></td>
			<td><?php echo $item->quantity; ?></td>
			<td><?php echo $item->type; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('bid/view/'.$item->id, '<i class="glyphicon glyphicon-eye-open"></i> View', 
							array('class' => 'btn btn-success btn-sm')); ?>						
						<?php echo Html::anchor('bid/edit/'.$item->id, '<i class="glyphicon glyphicon-wrench"></i> Edit', 
							array('class' => 'btn btn-primary btn-sm')); ?>						
						<?php echo Html::anchor('bid/delete/'.$item->id, '<i class="glyphicon glyphicon-trash icon-white"></i> Delete', 
							array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Bids.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('bid/create', 'Add new Bid', array('class' => 'btn btn-success')); ?>

</p>
