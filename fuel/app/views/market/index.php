<h4><strong>Listing All <span class='muted'>Markets</span></strong></h4>
<br/>
<?php if ($markets): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Location</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($markets as $item): ?>		
			<tr>

				<td><?php echo $item->name; ?></td>
				<td><?php echo $item->location; ?></td>
				<td><?php 
						echo $item->address->address;
						echo '<br/>'.$item->address->district;
					?>
				</td>
				
				
			</tr>
		<?php endforeach; ?>	
	</tbody>
</table>

<?php else: ?>
<p>No Markets.</p>

<?php endif; ?>
