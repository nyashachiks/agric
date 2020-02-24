<h2>Listing Contracts Trackers</h2>
<p>
	<?php echo Html::anchor('contracttracker/create/'.$project_stage_task_id, 
	'Add new Notes', array('class' => 'btn btn-success')); ?>
	
	<a href="<?php echo Uri::base().'contractstart/view/'.$contactApplicationId;?>"
	class="btn btn-warning">Back</a> 

</p>
<?php if ($contracttrackers): ?>
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
<?php foreach ($contracttrackers as $contracttracker): ?>		<tr>

			
			<td><?php echo Date::forge($contracttracker->enddate)->format("%d/%m/%Y");
 //$contracttracker->enddate; ?></td>
			<td><?php echo $contracttracker->notes; ?></td>
			<td><?php echo $contracttracker->status; ?></td>
			
			<td>
				<?php echo Html::anchor('contracttracker/view/'.$contracttracker->id, 'View'); ?> 
				<?php echo Html::anchor('contracttracker/edit/'.$contracttracker->id, 'Edit'); ?> 
				<?php echo Html::anchor('contracttracker/delete/'.$contracttracker->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Contracttrackers.</p>

<?php endif; ?>
