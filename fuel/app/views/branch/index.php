<h2>Listing <span class='muted'>Branches</span></h2>
<br>
<?php if ($branches): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Branch code</th>
			<th>Bank name</th>
			<th>Bank address</th>
			<th>Bank city</th>
			<th>Branch name</th>
			<th>Swift code</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($branches as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->branch_code; ?></td>
			<td><?php echo $item->bank_name; ?></td>
			<td><?php echo $item->bank_address; ?></td>
			<td><?php echo $item->bank_city; ?></td>
			<td><?php echo $item->branch_name; ?></td>
			<td><?php echo $item->swift_code; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('branches/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('branches/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('branches/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Branches.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('branches/create', 'Add new Branch', array('class' => 'btn btn-success')); ?>

</p>
