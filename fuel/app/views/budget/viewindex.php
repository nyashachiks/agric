<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>List of budgets</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<?php if ($budgets): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Budget Name</th>
			
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($budgets as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('budget/viewprint/'.$item->id, 
							'<i class="glyphicon glyphicon-eye-open"></i> View', 
							array('class' => 'btn btn-success btn-sm')); ?>						
						
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger">
	<p>There are no budgets.</p>
</div>

<?php endif; ?>
		
	</div>
</div>
</div>