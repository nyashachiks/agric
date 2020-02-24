<h2>Listing Bankdetails</h2>
<br>
<?php if ($bankdetails): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Farmer id</th>
			<th>Bank name</th>
			<th>Branch name</th>
			<th>Account number</th>
			<th>Account name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($bankdetails as $bankdetail): ?>		<tr>

			<td><?php echo $bankdetail->farmer_id; ?></td>
			<td><?php echo $bankdetail->bank_name; ?></td>
			<td><?php echo $bankdetail->branch_name; ?></td>
			<td><?php echo $bankdetail->account_number; ?></td>
			<td><?php echo $bankdetail->account_name; ?></td>
			<td>
				<?php echo Html::anchor('bankdetails/view/'.$bankdetail->id, 'View'); ?> |
				<?php echo Html::anchor('bankdetails/edit/'.$bankdetail->id, 'Edit'); ?> |
				<?php echo Html::anchor('bankdetails/delete/'.$bankdetail->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Bankdetails.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('bankdetails/create', 'Add new Bankdetail', array('class' => 'btn btn-success')); ?>

</p>
