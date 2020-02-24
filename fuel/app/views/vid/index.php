<h2>Listing Vids</h2>
<br>
<?php if ($vids): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>National id</th>
			<th>Details</th>
			<th>License type</th>
			<th>Amount</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($vids as $vid): ?>		<tr>

			<td><?php echo $vid->national_id; ?></td>
			<td><?php echo $vid->details; ?></td>
			<td><?php echo $vid->license_type; ?></td>
			<td><?php echo $vid->amount; ?></td>
			<td>
				<?php echo Html::anchor('vid/view/'.$vid->id, 'View'); ?> |
				<?php echo Html::anchor('vid/edit/'.$vid->id, 'Edit'); ?> |
				<?php echo Html::anchor('vid/delete/'.$vid->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Vids.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('vid/create', 'Add new Vid', array('class' => 'btn btn-success')); ?>

</p>
