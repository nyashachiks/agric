
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Listing documents</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		
<p>
	<?php echo Html::anchor('document/create', 'Add new Document', array('class' => 'btn btn-success')); ?>

</p>
<?php if ($documents): ?>
<table class="table table-striped">
	<thead>
		<tr>
			
			<th>Description</th>
			<th>Document name</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($documents as $item): ?>		<tr>

			
			<td><?php echo $item->description; ?></td>
			<td><?php echo $item->actual_name; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo  Html::anchor('document/download/'.$item->id, '<i class="glyphicon glyphicon-download-alt icon-white"></i>Download', array('class'=>'btn btn-md btn-success'));?>				
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger">
	<p>There are no documents.</p>
</div>

<?php endif; ?>

		
	</div>
</div>
</div>