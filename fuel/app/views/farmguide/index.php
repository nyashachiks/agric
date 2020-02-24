<h5 style="text-decoration: underline;"><strong>Farm guides for <?php if($activity) echo $activity ?></strong></h5>

<?php if ($farmguides): ?>
<table class="table table-striped">
	<thead>
		<tr>
			
			<th>Description</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($farmguides as $item): ?>		<tr>

			
			<td style='white-space:nowrap;'><?php echo $item->description; ?></td>
			<td style="width:100%">
				<div class="btn-toolbar">
					<div class="btn-group" style='float: right'>
						<?php 
							$activityname=$item->activity->name;
							echo Form::button('edit', '<i class="glyphicon glyphicon-wrench"></i> Edit ', 
							array('class' => 'btn btn-sm btn-success', 'type'=>'button', 
							'onclick'=>"editFarmguide('$item->id','$item->description','$item->activity_id','$activityname')"));
						?>						
						<?php 
							echo Html::anchor('farmguide/delete/'.$item->id, 
							'<i class="glyphicon glyphicon-trash glyphicon glyphicon-white"></i> Delete', 
							array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); 
						?>					
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Farmguides.</p>

<?php endif; ?>
