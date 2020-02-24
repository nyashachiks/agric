<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Search results</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		
<?php

 if (isset($diseases) && count($diseases)): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Disease Name</th>
			<th>Description</th>
			<th>&nbsp;</th>

		
		</tr>
	</thead>
	<tbody>
<?php foreach ($diseases as $item): ?>		
		<tr>
			
			<td>
				<?php echo $item->name; ?>			
			</td>
			<td><?php echo $item->description; ?></td>
			<td>
				<?php echo Html::anchor('disease/view/'.$item->id, '<i class="glyphicon glyphicon-eye-open"></i> View', array('class' => 'btn btn-success btn-sm')); ?>		
			</td>

		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger">
	<p>No Results for this search.</p>
</div>


<?php endif; ?>

<p>
	<a href="<?php echo Uri::create('disease/search'); ?>" style="text-decoration: none">
		<button class="btn btn-warning btn-md btn-round" style="min-width: 60px">Back</button>
	</a>
</p>
		
	</div>
</div>
</div>