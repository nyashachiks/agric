<h2>Listing <span class='muted'>Region_conditions</span></h2>
<br>
<?php if ($region_conditions): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Region id</th>
			<th>Condition id</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($region_conditions as $item): ?>		<tr>

			<td><?php echo $item->region_id; ?></td>
			<td><?php echo $item->condition_id; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('region/condition/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('region/condition/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('region/condition/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Region_conditions.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('region/condition/create', 'Add new Region condition', array('class' => 'btn btn-success')); ?>

</p>
