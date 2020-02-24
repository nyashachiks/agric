<h2>Listing <span class='muted'>Conversions</span></h2>
<br>
<?php if ($conversions): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Quantity</th>
			<th>Measurement unit</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($conversions as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->quantity; ?></td>
			<td><?php echo $item->measurement->unit; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('conversion/view/'.$item->id, '<i class="glyphicon glyphicon-eye-open"></i> View', 
							array('class' => 'btn btn-success btn-sm')); ?>						
						<?php echo Html::anchor('conversion/edit/'.$item->id, '<i class="glyphicon glyphicon-wrench"></i> Edit', 
							array('class' => 'btn btn-info btn-sm')); ?>						
						<?php echo Html::anchor('conversion/delete/'.$item->id, '<i class="glyphicon glyphicon-trash icon-white"></i> Delete', 
							array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Conversions.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('conversion/create', 'Add new Conversion', array('class' => 'btn btn-success')); ?>

</p>
