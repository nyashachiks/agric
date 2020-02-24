<h2>Listing <span class='muted'>Gradings</span></h2>
<br>
<?php if ($gradings): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Inspection lot</th>
			<th>Material id</th>
			<th>Quality score</th>
			<th>Valuation code</th>
			<th>Date</th>
			<th>Plant</th>
			<th>Quantity</th>
			<th>Vendor number</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($gradings as $item): ?>		<tr>

			<td><?php echo $item->inspection_lot; ?></td>
			<td><?php echo $item->material_id; ?></td>
			<td><?php echo $item->quality_score; ?></td>
			<td><?php echo $item->valuation_code; ?></td>
			<td><?php echo $item->date; ?></td>
			<td><?php echo $item->plant; ?></td>
			<td><?php echo $item->quantity; ?></td>
			<td><?php echo $item->vendor_number; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('grading/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('grading/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('grading/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Gradings.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('grading/create', 'Add new Grading', array('class' => 'btn btn-success')); ?>

</p>
