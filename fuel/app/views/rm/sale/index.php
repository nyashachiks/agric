<h2>Listing Rm_sales</h2>
<br>
<?php if ($rm_sales): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Rm offer id</th>
			<th>Buyer id</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($rm_sales as $rm_sale): ?>		<tr>

			<td><?php echo $rm_sale->rm_offer_id; ?></td>
			<td><?php echo $rm_sale->buyer_id; ?></td>
			<td><?php echo $rm_sale->price; ?></td>
			<td><?php echo $rm_sale->quantity; ?></td>
			<td><?php echo $rm_sale->total; ?></td>
			<td>
				<?php echo Html::anchor('rm/sale/view/'.$rm_sale->id, 'View'); ?> |
				<?php echo Html::anchor('rm/sale/edit/'.$rm_sale->id, 'Edit'); ?> |
				<?php echo Html::anchor('rm/sale/delete/'.$rm_sale->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Rm_sales.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('rm/sale/create', 'Add new Rm sale', array('class' => 'btn btn-success')); ?>

</p>
