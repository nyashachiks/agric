<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Listing disease symptoms</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		
<p>
	<?php echo Html::anchor('diseasesymptom/create', 'Add new Disease-To-Symptom Relationship', array('class' => 'btn btn-success')); ?>

</p>
<?php if ($diseasesymptoms): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Disease name</th>
			<th>Symptom description</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($diseasesymptoms as $item): ?>		<tr>

			<td><?php echo $item->disease->name; ?></td>
			<td><?php echo $item->symptom->description; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
											
						<?php echo Html::anchor('diseasesymptom/edit/'.$item->id, '<i class="glyphicon glyphicon-wrench"></i> Edit', array('class' => 'btn btn-info btn-sm')); ?>						
						<?php echo Html::anchor('diseasesymptom/delete/'.$item->id, '<i class="glyphicon glyphicon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger">
	<p>There are no disease symptoms.</p>
</div>
<?php endif; ?>

		
	</div>
</div>
</div>