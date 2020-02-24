<legend>Grain receipts</legend>
<br>
<?php if ($grainreceipts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Receipt No.</th>
			<th>Grain name</th>
			<th>Grain name</th>
			<th>Quantity</th>
			<th>Grade</th>
			<th>Value</th>
			<th>Received by</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($grainreceipts as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo Model_User::get_full_name($item->farmer_id); ?></td>
			<td><?php echo $item->grain->name; ?></td>
			<td><?php echo $item->qty; ?></td>
			<td><?php echo $item->grade->name; ?></td>
			<td><?php echo "$".number_format($item->value, 2, '.', ' '); ?></td>
			<td><?php echo Model_User::get_full_name($item->received_by); ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('grainreceipts/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>												<?php echo Html::anchor('grainreceipts/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger">There are no grain receipts </div>

<?php endif; ?><p>
	<?php echo Html::anchor('grainreceipts/create', 'Add new Grainreceipt', array('class' => 'btn btn-success')); ?>

</p>
