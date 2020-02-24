<h2>Listing Rawmaterial_offers</h2>
<br>
<?php if ($rawmaterial_offers): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Raw material id</th>
			<th>Seller id</th>
			<th>Price</th>
			<th>Offer dscription</th>
			<th>Quantity</th>
			<th>Quantity left</th>
			<th>Status</th>
			<th>Raw matrial status</th>
			<th>Count</th>
			<th>Image name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($rawmaterial_offers as $rawmaterial_offer): ?>		<tr>

			<td><?php echo $rawmaterial_offer->raw_material_id; ?></td>
			<td><?php echo $rawmaterial_offer->seller_id; ?></td>
			<td><?php echo $rawmaterial_offer->price; ?></td>
			<td><?php echo $rawmaterial_offer->offer_dscription; ?></td>
			<td><?php echo $rawmaterial_offer->quantity; ?></td>
			<td><?php echo $rawmaterial_offer->quantity_left; ?></td>
			<td><?php echo $rawmaterial_offer->status; ?></td>
			<td><?php echo $rawmaterial_offer->raw_matrial_status; ?></td>
			<td><?php echo $rawmaterial_offer->count; ?></td>
			<td><?php echo $rawmaterial_offer->image_name; ?></td>
			<td>
				<?php echo Html::anchor('rawmaterial/offer/view/'.$rawmaterial_offer->id, 'View'); ?> |
				<?php echo Html::anchor('rawmaterial/offer/edit/'.$rawmaterial_offer->id, 'Edit'); ?> |
				<?php echo Html::anchor('rawmaterial/offer/delete/'.$rawmaterial_offer->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Rawmaterial_offers.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('rawmaterial/offer/create', 'Add new Rawmaterial offer', array('class' => 'btn btn-success')); ?>

</p>
