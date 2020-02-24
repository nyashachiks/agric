<?php if ($budgets): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($budgets as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('budget/view/'.$item->id, '<i class="glyphicon glyphicon-eye-open"></i> View', 
								array('class' => 'btn btn-success btn-sm')); ?>						
						<?php echo Html::anchor('budget/edit/'.$item->id, '<i class="glyphicon glyphicon-wrench"></i> Edit', 
								array('class' => 'btn btn-info btn-sm')); ?>						
						<?php echo Html::anchor('budget/delete/'.$item->id, '<i class="glyphicon glyphicon-trash icon-white"></i> Delete', 
						array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Budgets.</p>

<?php endif; ?>
