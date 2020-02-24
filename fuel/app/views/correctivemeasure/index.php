<h4>Listing <span class='muted'>Corrective Measures</span></h4>
<br/>
<p>
	<?php echo Html::anchor('correctivemeasure/create', 'Add new Corrective Measure', array('class' => 'btn btn-success')); ?>

</p>
<?php if ($correctivemeasures): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Disease Name</th>
			<th>Description</th>
			
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($correctivemeasures as $item): ?>
		<tr>
			<td><?php echo $item->disease->name; ?></td>
			<td><?php echo $item->description; ?></td>
			
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('correctivemeasure/view/'.$item->id, '<i class="glyphicon glyphicon-eye-open"></i> View', array('class' => 'btn btn-success btn-sm')); ?>						
						<?php echo Html::anchor('correctivemeasure/edit/'.$item->id, '<i class="glyphicon glyphicon-wrench"></i> Edit', array('class' => 'btn btn-info btn-sm')); ?>						
						<?php echo Html::anchor('correctivemeasure/delete/'.$item->id, '<i class="glyphicon glyphicon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Correctivemeasures.</p>

<?php endif; ?>
