<h2>Listing <span class='muted'>Symptoms</span></h2>
<br/>
<p>
	<?php echo Html::anchor('symptom/create', 'Add new Symptom', array('class' => 'btn btn-success')); ?>

</p>
<?php if ($symptoms): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Description</th>
			
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($symptoms as $item): ?>		<tr>

			<td><?php echo $item->description; ?></td>
			
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('symptom/view/'.$item->id, '<i class="glyphicon glyphicon-eye-open"></i> View', array('class' => 'btn btn-success btn-sm')); ?>						
						<?php echo Html::anchor('symptom/edit/'.$item->id, '<i class="glyphicon glyphicon-wrench"></i> Edit', array('class' => 'btn btn-info btn-sm')); ?>						
						<?php echo Html::anchor('symptom/delete/'.$item->id, '<i class="glyphicon glyphicon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Symptoms.</p>

<?php endif; ?>
