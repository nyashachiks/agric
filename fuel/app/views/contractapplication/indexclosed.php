<h3>Viewing a listing <span class='muted'>of all Closed Contract Applications</span></h3>
<br>
<?php if ($contractapplications): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Farm Name</th>
			<th>Season </th>
			<th>Year</th>
			<th>Product </th>
			<th>Size</th>
			<th>Status</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($contractapplications as $item): ?>		<tr>

			<td><?php echo $item->farm->name; ?></td>
			<td><?php echo $item->season->name; ?></td>
			<td><?php echo $item->year; ?></td>
			<td><?php echo $item->product->name; ?></td>
			<td><?php echo $item->size .' ' .$item->measure_unit; ?></td>
			<td><?php echo $item->status; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('contractapplication/viewcontract/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Contract Applications.</p>

<?php endif; ?><p>
	

</p>
