<h5 style="text-decoration: underline;"><strong>Inputs for <?php if($activity) echo $activity ?></strong></h5>
<?php if ($inputs): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th style='white-space:nowrap;'>Name</th>
			<th style='white-space:nowrap;'>Cost</th>
			<th style='white-space:nowrap;'>Quantity</th>
			<th style='white-space:nowrap;'>Total cost</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($inputs as $item): ?>		<tr>

			<td style='white-space:nowrap;'><?php echo $item->name; ?></td>
			<td style='white-space:nowrap;'><?php echo '$'. $item->cost_per_unit.' per '.$item->unit; ?></td>
			<td style='white-space:nowrap;'><?php echo $item->quantity; ?></td>
			<td style='white-space:nowrap;'><?php echo '$'.$item->total_cost; ?></td>
			<td style="width:100%;">
				<div class="btn-toolbar"  >
					<div class="btn-group" style='float: right;'>
												
					<?php 
						echo Form::button('edit', '<i class="glyphicon glyphicon-wrench"></i> Edit ', 
									array('class' => 'btn btn-sm btn-success', 'type'=>'button', 
								'onclick'=>"editInput('$item->id','$item->name','$item->cost_per_unit','$item->quantity','$item->total_cost','$item->activity_id','$item->unit')"));
										
						 echo Html::anchor('input/delete/'.$item->id, '<i class="glyphicon glyphicon-trash glyphicon glyphicon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<h5>No Inputs.</h5>

<?php endif; ?>