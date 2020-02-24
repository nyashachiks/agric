
<?php if ($task->contracttracker): ?>
<table class="table table-striped">
	<thead>
		<tr>
			
			<th>Date</th>
			<th>Notes</th>
			<th>Status</th>
			
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($task->contracttracker as $contracttracker): ?>		<tr>

			
			<td><?php echo Date::forge($contracttracker->enddate)->format("%d/%m/%Y");
 //$contracttracker->enddate; ?></td>
			<td><?php echo $contracttracker->notes; ?></td>
			<td><?php echo $contracttracker->status; ?></td>
			
			<td>
				<?php echo Html::anchor('contracttracker/view/'.$contracttracker->id, 'View'); ?> 
				<!--?php echo Html::anchor('contracttracker/edit/'.$contracttracker->id, 'Edit'); ?--> 
				<!--?php echo Html::anchor('contracttracker/delete/'.$contracttracker->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?-->

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Contracttrackers.</p>

<?php endif; ?>