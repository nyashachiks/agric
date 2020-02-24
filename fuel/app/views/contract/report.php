<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Listing contract history</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		
<?php 
 if ($contracts):
	$total_yield=0;
	$total_amount=0;

 ?>
<table class="table table-striped">
	<thead>
		<tr>
			
			
			<th>Farmer Name</th>
			<th>Farm Name</th>
			<th>Size</th>
			<th>Product</th>
			<th>Season </th>
			<th>Year </th>
			<th>Loan amount</th>
			<th>Expected Yield</th>
			
		</tr>
	</thead>
	<tbody>
<?php foreach ($contracts as $item): ?>		<tr>

			
				
			<td>
				<?php 
						$farmer_id= $item->contractapplication->farmer_id;
						$farmer= Auth\Model\Auth_User::find($farmer_id);
						
						$ffirstname='';
					  	$flastname='';
					  	
					  	//getting metadata
						  foreach($farmer->metadata as $meta)
						  {
						  	//Debug::dump($meta);die;
						  	if($meta->key=='first_name')
						  		$ffirstname=$meta->value;
						  	
						  	if($meta->key=='last_name')
						  		$flastname=$meta->value;
						  }
						
					echo $ffirstname." ".$flastname;
				?>
			</td>
			
			<td>
				<?php 
					echo $item->contractapplication->farm->name; 
				?>
			</td>
			<td>
				<?php echo $item->contractapplication->farm->size.' '.$item->contractapplication->farm->units; ?>
			</td>
			<td>
				<?php 
					echo $item->contractapplication->product->name;
				?>
			</td>
			<td>
				<?php 
					echo $item->contractapplication->season->name;
				?>
			</td>
			<td>
				<?php 
					echo $item->contractapplication->year;
				?>
			</td>

			
			<td>
				<?php 
					echo '$'.$item->loan_amount; 
					
					$total_amount=$total_amount+$item->loan_amount;

				?>
			</td>
			
			<td>
				<?php 
					echo $item->contractapplication->project->expected_yield.' Tonnes'; 
					$total_yield=$total_yield+$item->contractapplication->project->expected_yield;				
				?>
				
			</td>
			
		</tr>
<?php endforeach; ?>
		<tr>
			<td><strong>Total</strong></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><strong><?php echo '$'.$total_amount; ?><strong></td>
			<td><strong><?php echo $total_yield .' Tonnes'; ?></strong></td>

		</tr>	
		</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger">
	<p>There are no pending contracts.</p>
</div>

<?php endif; ?>
		
	</div>
</div>
</div>