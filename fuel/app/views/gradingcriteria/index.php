<h2>Listing <span class='muted'>Gradingcriteria</span></h2>
<br>
<?php if ($gradingcriteria): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Crit name</th>
			<th>Short name</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($gradingcriteria as $item): ?>		<tr>

			<td><?php echo $item->crit_name; ?></td>
			<td><?php echo $item->short_name; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('gradingcriteria/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('gradingcriteria/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('gradingcriteria/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Gradingcriteria.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('gradingcriteria/create', 'Add new Gradingcriterium', array('class' => 'btn btn-success')); ?>

</p>
