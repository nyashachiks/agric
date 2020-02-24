<h2>Listing Stakeholder_Tradingdetails</h2>
<br>
<?php if ($stakeholder_Tradingdetails): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Additional details</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($stakeholder_Tradingdetails as $stakeholder_Tradingdetail): ?>		<tr>

			<td><?php echo $stakeholder_Tradingdetail->name; ?></td>
			<td><?php echo $stakeholder_Tradingdetail->additional_details; ?></td>
			<td>
				<?php echo Html::anchor('stakeholder/tradingdetails/view/'.$stakeholder_Tradingdetail->id, 'View'); ?> |
				<?php echo Html::anchor('stakeholder/tradingdetails/edit/'.$stakeholder_Tradingdetail->id, 'Edit'); ?> |
				<?php echo Html::anchor('stakeholder/tradingdetails/delete/'.$stakeholder_Tradingdetail->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Stakeholder_Tradingdetails.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('stakeholder/tradingdetails/create', 'Add New Trading Details', array('class' => 'btn btn-success')); ?>

</p>
