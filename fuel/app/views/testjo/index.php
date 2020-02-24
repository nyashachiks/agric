<h2>Listing Testjos</h2>
<br>
<?php if ($testjos): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Id</th>
			<th>Address</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($testjos as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->address; ?></td>
			<td>
				<?php echo Html::anchor('testjo/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('testjo/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('testjo/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Testjos.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('testjo/create', 'Add new Testjo', array('class' => 'btn btn-success')); ?>

</p>
