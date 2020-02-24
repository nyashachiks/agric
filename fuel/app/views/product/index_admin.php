<h2>Listing <span class='muted'>Products</span></h2>
<br>
<?php if ($products): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Measurement unit</th>
			<th>Product Type</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	
<?php foreach ($products as $item): ?>		<tr>
	
			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->measurement->unit; ?></td>
			<td><?php echo $item->producttype->name; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('product/view/'.$item->id, '<i class="glyphicon glyphicon-eye-open"></i> View', 
							array('class' => 'btn btn-success btn-sm')); ?>						
						<?php echo Html::anchor('product/edit/'.$item->id, '<i class="glyphicon glyphicon-wrench"></i> Edit', 
							array('class' => 'btn btn-info btn-sm')); ?>						
						<?php echo Html::anchor('product/delete/'.$item->id, '<i class="glyphicon glyphicon-trash icon-white"></i> Delete', 
							array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Products.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('product/create', 'Add new Product', array('class' => 'btn btn-success')); ?>

</p>
