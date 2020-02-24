<h4><strong>Listing all rated <span class='muted'>products on offers</span></strong></h4>
<br/>
<?php 
if ($productoffers_rated): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Product </th>
			<th>Market</th>
			<th>Price</th>
			
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php 

foreach ($productoffers_rated as $item): ?>		
<?php if($item->quantity_left>0)?>
<tr>

			<td><?php echo $item->product->name; ?></td>
			<td><?php echo $item->market->name ?></td>
			<td><?php echo '$'.$item->price.'/'.$item->product->measurement->unit; ?></td>
			
			
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
					<?php echo Html::anchor('productoffer/agri_view_final/'.$item->id, '<i class="glyphicon glyphicon-eye-open"></i> View', 
							array('class' => 'btn btn-success btn-sm')); 
						  					
						  							
					?>										
					</div>
				</div>

			</td>
		</tr>

<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Product Offers.</p>


<?php endif; ?>