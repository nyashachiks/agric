<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Listing diseases</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<div class="row">
			<p>
	<?php echo Html::anchor('disease/create', 'Add new Disease', array('class' => 'btn btn-success')); ?>
</p>
		</div>
		<div class="row">
			<?php if ($diseases): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Affected product</th>
			<th>Disease Name</th>
			<th>Description</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($diseases as $item): ?>		
		<tr>
			<td><?php echo $item->product->name; ?></td>
			<td><?php echo $item->name; ?></td>
			<td><?php echo nl2br($item->description); ?></td>
			
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('disease/view/'.$item->id, '<i class="glyphicon glyphicon-eye-open"></i> View', array('class' => 'btn btn-success btn-sm')); ?>				
						<?php echo Html::anchor('disease/edit/'.$item->id, '<i class="glyphicon glyphicon-wrench"></i> Edit', array('class' => 'btn btn-info btn-sm')); ?>					
						<?php echo Html::anchor('disease/delete/'.$item->id, '<i class="glyphicon glyphicon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					
					</div>
				</div>

			</td>
		</tr>
	<?php endforeach; ?>	
	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger">
	<p>There are no diseases.</p>
</div>

<?php endif; ?>
		</div>
		
	</div>
</div>
</div>