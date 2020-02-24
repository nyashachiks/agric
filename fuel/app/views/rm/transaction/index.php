<h2>Listing Rm_transactions</h2>
<br>
<?php if ($rm_transactions): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Rm sale id</th>
			<th>Amount</th>
			<th>Narrative</th>
			<th>Status</th>
			<th>Browse url</th>
			<th>Poll url</th>
			<th>Paynow ref</th>
			<th>Payment status</th>
			<th>Mobile</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($rm_transactions as $rm_transaction): ?>		<tr>

			<td><?php echo $rm_transaction->rm_sale_id; ?></td>
			<td><?php echo $rm_transaction->amount; ?></td>
			<td><?php echo $rm_transaction->narrative; ?></td>
			<td><?php echo $rm_transaction->status; ?></td>
			<td><?php echo $rm_transaction->browse_url; ?></td>
			<td><?php echo $rm_transaction->poll_url; ?></td>
			<td><?php echo $rm_transaction->paynow_ref; ?></td>
			<td><?php echo $rm_transaction->payment_status; ?></td>
			<td><?php echo $rm_transaction->mobile; ?></td>
			<td>
				<?php echo Html::anchor('rm/transaction/view/'.$rm_transaction->id, 'View'); ?> |
				<?php echo Html::anchor('rm/transaction/edit/'.$rm_transaction->id, 'Edit'); ?> |
				<?php echo Html::anchor('rm/transaction/delete/'.$rm_transaction->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Rm_transactions.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('rm/transaction/create', 'Add new Rm transaction', array('class' => 'btn btn-success')); ?>

</p>
