<h2>Listing Contractstarts</h2>
<br>
<?php if ($contractstarts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Contract id</th>
			<th>Startdate</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($contractstarts as $contractstart): ?>		<tr>

			<td><?php echo $contractstart->contract_id; ?></td>
			<td><?php echo $contractstart->startdate; ?></td>
			<td>
				<?php echo Html::anchor('contractstart/view/'.$contractstart->id, 'View'); ?> |
				<?php echo Html::anchor('contractstart/edit/'.$contractstart->id, 'Edit'); ?> |
				<?php echo Html::anchor('contractstart/delete/'.$contractstart->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Contractstarts.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('contractstart/create', 'Add new Contractstart', array('class' => 'btn btn-success')); ?>

</p>
