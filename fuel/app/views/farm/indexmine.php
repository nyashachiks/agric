<h4>My <span class='muted'>Farms</span></h4>
<br>
<?php if ($farms): ?>
<table class="table table-striped">
	<thead>
		<tr>
			
			<th>Farm Name</th>
			<th>Size</th>
			<th>Units</th>
			<th>Address</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($farms as $item): ?>		<tr>

			
			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->size; ?></td>
			<td><?php echo $item->units; ?></td>
			<td>
				<?php 
					echo $item->addresses->address;
					echo '<br/>'.$item->addresses->district;
					//echo '<br/>'.$item->addresses->country->country
			 	?>
			</td>
			
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Farms.</p>

<?php endif; ?>
<?php echo Html::anchor('dashboard', '<i class="glyphicon glyphicon-chevron-left"></i> Back', array('class' => 'btn btn-md btn-primary')); ?>