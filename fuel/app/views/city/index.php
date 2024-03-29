<h2>Listing <span class='muted'>Cities</span></h2>
<br>
<?php if ($cities): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>City</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($cities as $item): ?>		<tr>

			<td><?php echo $item->city; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('city/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('city/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('city/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Cities.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('city/create', 'Add new City', array('class' => 'btn btn-success')); ?>

</p>
