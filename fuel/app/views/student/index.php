<h2>Listing Students</h2>
<br>
<?php if ($students): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Surname</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($students as $student): ?>		<tr>

			<td><?php echo $student->name; ?></td>
			<td><?php echo $student->surname; ?></td>
			<td>
				<?php echo Html::anchor('student/view/'.$student->id, 'View'); ?> |
				<?php echo Html::anchor('student/edit/'.$student->id, 'Edit'); ?> |
				<?php echo Html::anchor('student/delete/'.$student->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Students.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('student/create', 'Add new Student', array('class' => 'btn btn-success')); ?>

</p>
