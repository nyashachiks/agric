<h2>Listing Contract_disburses</h2>
<br>
<?php if ($contract_disburses): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Contractquantities id</th>
			<th>Userdisbursed</th>
			<th>Date</th>
			<th>Quantities</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($contract_disburses as $contract_disburse): ?>		<tr>

			<td><?php echo $contract_disburse->contractquantities_id; ?></td>
			<td><?php echo $contract_disburse->userdisbursed; ?></td>
			<td><?php echo $contract_disburse->date; ?></td>
			<td><?php echo $contract_disburse->quantities; ?></td>
			<td>
				<?php echo Html::anchor('contract/disburse/view/'.$contract_disburse->id, 'View'); ?> |
				<?php echo Html::anchor('contract/disburse/edit/'.$contract_disburse->id, 'Edit'); ?> |
				<?php echo Html::anchor('contract/disburse/delete/'.$contract_disburse->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Contract_disburses.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('contract/disburse/create', 'Add new Contract disburse', array('class' => 'btn btn-success')); ?>

</p>
