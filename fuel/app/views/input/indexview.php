<h5 style="text-decoration: underline;"><strong>Inputs for <?php if($activity) echo $activity ?></strong></h5>
<?php if ($inputs): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th style='white-space:nowrap;'>Name</th>
			<th style='white-space:nowrap;'>Cost</th>
			<th style='white-space:nowrap;'>Quantity</th>
			<th style='white-space:nowrap;'>Total cost</th>
			
		</tr>
	</thead>
	<tbody>
<?php foreach ($inputs as $item): ?>		<tr>

			<td style='white-space:nowrap;'><?php echo $item->name; ?></td>
			<td style='white-space:nowrap;'><?php echo '$'. $item->cost_per_unit.' per '.$item->unit; ?></td>
			<td style='white-space:nowrap;'><?php echo $item->quantity; ?></td>
			<td style='white-space:nowrap;'><?php echo '$'.$item->total_cost; ?></td>
			
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<h5>No Inputs.</h5>

<?php endif; ?>