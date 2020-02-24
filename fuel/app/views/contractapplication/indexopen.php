<h3>Open contract applications</h3>
<br>
<?php if ($contractapplications): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Farm Name</th>
			<th>Season </th>
			<th>Year</th>
			<th>Product </th>
			<th>Size</th>
			<th>Status</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($contractapplications as $item): ?>		<tr>

			<td><?php echo $item->farm->name; ?></td>
			<td><?php echo $item->season->name; ?></td>
			<td><?php echo $item->year; ?></td>
			<td><?php echo $item->product->name; ?></td>
			<td><?php echo $item->size .' ' .$item->measure_unit; ?></td>
			<td>
				<?php if(strtolower($item->status) == 'closed'): ?>
				<span class="label label-success">
					<?php echo $item->status; ?>
				</span>
				
				<?php else: ?>
				<span class="label label-info">
					<?php echo $item->status; ?>
				</span>
				<?php endif; ?>
			</td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('contractapplication/viewcontract/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger col-md-8 col-sm-12 col-lg-8">
	<p>There are no contract applications.</p>
</div>

<?php endif; ?><p>
	

</p>
