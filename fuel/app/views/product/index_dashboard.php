<?php if ($products): ?>
<table class="table table-striped">
	
	<tbody>
	
<?php foreach ($products as $item): ?>		<tr>
	
			<td><?php echo $item->name; ?></td>
			
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php 
							$name=$item->name;
							$unit=$item->measurement->unit;
							$type=$item->producttype->name;
							echo Form::button('View', '<i class="glyphicon glyphicon-eye-open"></i> View', 
								array('class' => 'btn btn-success btn-sm', 'type'=>'button', 
								'onclick'=>"viewProduct('$name',' $unit',' $type')")); ?>	
											
									
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger">
	<p>There are no products.</p>
</div>

<?php endif; ?>


