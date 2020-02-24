<h4><strong>Listing <span class='muted'>products up for review</span></strong></h4>
<br/>
<?php $itemfarmerid='';
$userid='';
if ($productoffers): ?>
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

foreach ($productoffers as $item): ?>		
<?php if($item->quantity_left>0)?>
<tr>

			<td><?php echo $item->product->name; ?></td>
			<td><?php echo $item->market->name ?></td>
			<td><?php echo '$'.$item->price.'/'.$item->product->measurement->unit; ?></td>
			
			
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
					<?php echo Html::anchor('productoffer/agri_view/'.$item->id, '<i class="glyphicon glyphicon-eye-open"></i> View', 
							array('class' => 'btn btn-success btn-sm')); 
						 				
						  							
					?>										
					</div>
				</div>

			</td>
		</tr>

<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Unrated Product Offers.</p>

<?php endif; ?>