<h2>Listing Contractortrackers</h2>
<br>
<?php if ($contractortrackers): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Contracttracker id</th>
			<th>Notes</th>
			<th>Date</th>
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($contractortrackers as $contractortracker): ?>		<tr>

			<td><?php echo $contractortracker->contracttracker_id; ?></td>
			<td><?php echo $contractortracker->notes; ?></td>
			<td><?php echo $contractortracker->date; ?></td>
			<td><?php echo $contractortracker->status; ?></td>
			<td>
				<?php echo Html::anchor('contractortracker/view/'.$contractortracker->id, 'View'); ?> |
				<?php echo Html::anchor('contractortracker/edit/'.$contractortracker->id, 'Edit'); ?> |
				<?php echo Html::anchor('contractortracker/delete/'.$contractortracker->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Contractortrackers.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('contractortracker/create', 'Add new Contractortracker', array('class' => 'btn btn-success')); ?>

</p>
