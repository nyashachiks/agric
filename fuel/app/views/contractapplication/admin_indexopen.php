<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Open contract applications</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		
<?php if ($open_contractapplications): ?>
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
<?php foreach ($open_contractapplications as $item): ?>		<tr>

			<td><?php echo $item->farm->name; ?></td>
			<td><?php echo $item->season->name; ?></td>
			<td><?php echo $item->year; ?></td>
			<td><?php echo $item->product->name; ?></td>
			<td><?php echo $item->size .' ' .$item->measure_unit; ?></td>
			<td><?php echo $item->status; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('contractapplication/admin_view_only/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger">
	<p>There are no open contract applications.</p>
</div>

<?php endif; ?>
		
	</div>
</div>
</div>