<h2>Listing <span class='muted'>Measurements</span></h2>
<br>
<?php if ($measurements): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Unit</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($measurements as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->unit; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('measurement/view/'.$item->id, '<i class="glyphicon glyphicon-eye-open"></i> View', 
							array('class' => 'btn btn-success btn-sm')); ?>						
						<?php echo Html::anchor('measurement/edit/'.$item->id, '<i class="glyphicon glyphicon-wrench"></i> Edit', 
							array('class' => 'btn btn-primary btn-sm')); ?>						
						<?php echo Html::anchor('measurement/delete/'.$item->id, '<i class="glyphicon glyphicon-trash icon-white"></i> Delete', 
							array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Measurements.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('measurement/create', 'Add new Measurement', array('class' => 'btn btn-success')); ?>

</p>
