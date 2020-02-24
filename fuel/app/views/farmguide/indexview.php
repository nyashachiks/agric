<h5 style="text-decoration: underline;"><strong>Farm guides for <?php if($activity) echo $activity ?></strong></h5>

<?php if ($farmguides): ?>
<table class="table table-striped">
	<thead>
		<tr>
			
			<th>Description</th>
			
		</tr>
	</thead>
	<tbody>
		<?php 
			$count=1;
			foreach ($farmguides as $item): 
		?>		
		<tr>

			
			<td style='white-space:nowrap;'>
		
			<?php echo $count.". ".$item->description; ?></td>
			
			
		</tr>
		<?php $count++; ?>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Farmguides.</p>

<?php endif; ?>
