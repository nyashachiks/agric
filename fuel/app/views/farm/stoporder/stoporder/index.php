<h2>Listing Stoporders</h2>
<br/>
<p>
	<?php echo Html::anchor('stoporder/create', 'Add new Stoporder', array('class' => 'btn btn-success')); ?>

</p>

<?php if ($stoporders): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Company code</th>
			<th>Stop order number</th>
			<th>Code</th>
			<th>Farmer name</th>
			<th>Farmer number</th>
			<th>Farmer id</th>
			<th>Material number</th>
			<th>Max amount</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($stoporders as $item): ?>		<tr>

			<td><?php echo $item->company_code; ?></td>
			<td><?php echo $item->stop_order_number; ?></td>
			<td><?php echo $item->code; ?></td>
			<td><?php echo $item->farmer_name; ?></td>
			<td><?php echo $item->farmer_number; ?></td>
			<td><?php echo $item->farmer_id; ?></td>
			<td><?php echo $item->material_number; ?></td>
			<td><?php echo $item->max_amount; ?></td>
			<td>
			
				<?php echo Html::anchor('stoporder/view/'.$item->id, ' View', array('class' => 'btn btn-info btn-sm')); ?>
				<?php echo Html::anchor('stoporder/edit/'.$item->id, 'Edit' , array('class' => 'btn btn-default btn-sm')); ?> 
				<?php echo Html::anchor('stoporder/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>	
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Stoporders.</p>

<?php endif; ?>