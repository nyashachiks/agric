<h2>Listing <span class='muted'>Region_condition_products</span></h2>
<br>
<?php if ($region_condition_products): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Region condition id</th>
			<th>Product id</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($region_condition_products as $item): ?>		<tr>

			<td><?php echo $item->region_condition_id; ?></td>
			<td><?php echo $item->product_id; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('region/condition/product/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('region/condition/product/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('region/condition/product/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Region_condition_products.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('region/condition/product/create', 'Add new Region condition product', array('class' => 'btn btn-success')); ?>

</p>
