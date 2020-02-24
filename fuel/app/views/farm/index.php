<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">

	<div class="x_title">
		<h2>All farms</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		
<p>
	<?php echo Html::anchor('farm/create', 'Add new Farm', array('class' => 'btn btn-success')); ?>

</p>
		<?php if ($farms): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Farm name</th>
			<th>Farm size</th>
			<th>Address</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($farms as $item): ?>		
		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->size .' '. $item->units; ?></td>
			<td><?php echo nl2br($item->address->address); ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('farm/edit/'.$item->id, '<i class="glyphicon glyphicon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>
						<?php echo Html::anchor('farm/view/'.$item->id, '<i class="glyphicon glyphicon-wrench"></i> View', array('class' => 'btn btn-default btn-sm')); ?>
						<?php echo Html::anchor('farm/delete/'.$item->id, '<i class="glyphicon glyphicon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
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
