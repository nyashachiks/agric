<h2>Listing <span class='muted'>Stop Order Facilities</span></h2>
<br/>
<p>
	<?php echo Html::anchor('stopcode/create', 'Add new Stop Order Facility', array('class' => 'btn btn-success')); ?>

</p>
<?php if ($stopcodes): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Code</th>
			<th>Vendor</th>
			<th>Company code</th>
			<th>Vendor name</th>
			<th>Deduction rate</th>
			<th>Commission</th>
			<th>Description</th>

			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($stopcodes as $item): ?>		<tr>

			<td><?php echo $item->code; ?></td>
			<td><?php echo $item->vendor; ?></td>
			<td><?php echo $item->company_code; ?></td>
			<td><?php echo $item->vendor_name; ?></td>
			<td><?php echo $item->deduction_rate; ?></td>
			<td><?php echo $item->commission; ?></td>
			<td><?php echo $item->description; ?></td>

			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('stopcode/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-info btn-sm')); ?>						
						<?php echo Html::anchor('stopcode/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						
						<?php echo Html::anchor('stopcode/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>				</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Stop Order Facilities.</p>

<?php endif; ?>
