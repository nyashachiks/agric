<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">

	<div class="x_title">
		<h4>All Farms</h4>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		
		<?php if ($farms): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Farm ID</th>
			<th>Farm name</th>
			<th>Farmer</th>
			<th>Farm size</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($farms as $item): ?>		
		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->name; ?></td>
				<td><?php echo Model_User::get_full_name($item->user_id); ?></td>
			<td><?php echo $item->size .' '. $item->units; ?></td>
			
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('farm/view/'.$item->id, '<i class="glyphicon glyphicon-wrench"></i> View', array('class' => 'btn btn-default btn-sm')); ?>	
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	
</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger">
	<p>There are no farms.</p>
</div>

<?php endif; ?>
		
	</div>
</div>
</div>
