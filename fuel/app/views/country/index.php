<h2>Listing <span class='muted'>Countries</span></h2>
<br>
<?php if ($countries): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Country</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($countries as $item): ?>		<tr>

			<td><?php echo $item->country; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('country/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('country/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('country/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Countries.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('country/create', 'Add new Country', array('class' => 'btn btn-success')); ?>

</p>
