<h3>Listing <span class='muted'>Contract Applications</span></h3>
<br/>
<h4>Pending</h4>
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
						<?php echo Html::anchor('contractapplication/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						
						<?php echo Html::anchor('contractapplication/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						
						<?php echo Html::anchor('contractapplication/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger col-md-6 col-lg-12 col-sm-12">
	<p>There are no pending contracts.</p>
</div>

<?php endif; ?>

<h4>History</h4>
<br/>
<?php if ($contractapplicationshistory): ?>
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
<?php foreach ($contractapplicationshistory as $item): ?>		<tr>

			
			<td><?php echo $item->farm->name; ?></td>
			<td><?php echo $item->season->name; ?></td>
			<td><?php echo $item->year; ?></td>
			<td><?php echo $item->product->name; ?></td>
			<td><?php echo $item->size .' ' .$item->measure_unit; ?></td>
			<td>
			<?php if(strtolower($item->status) == 'closed'): ?>
			<span class="label label-success">
				<?php echo $item->status; ?>
			</span>
			
			<?php else: ?>
			<span class="label label-info">
				<?php echo $item->status; ?>
			</span>
			<?php endif; ?>
			</td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('contractapplication/view_only/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>	
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger col-md-6 col-lg-12 col-sm-12">
<p>There are no closed contracts applications.</p>
</div>

<?php endif; ?>

