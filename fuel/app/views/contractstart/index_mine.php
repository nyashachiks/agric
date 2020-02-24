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
 ?>
<table class="table table-striped">
	<thead>
		<tr>
			
			
			<th>Farmer Name</th>
			<th>Contractor Name</th>
			<th>Farm Name</th>
			<th>Size</th>
			<th>Product</th>
			
			<th>Status</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($contracts as $item): ?>		<tr>

			
				
			<td>
				<?php 
						$farmer_id= $item['farmer_id'];
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
						$id_num=$item['contractor_id']; 
						$contractor= Auth\Model\Auth_User::find($id_num);
					  	
					  	//getting metadata
						  foreach($contractor->metadata as $meta)
						  {
						  	//Debug::dump($meta);die;
						  	if($meta->key=='first_name')
						  		$cfirstname=$meta->value;
						  	
						  	if($meta->key=='last_name')
						  		$clastname=$meta->value;
						  }
								echo $cfirstname." ".$clastname;
				?>
			</td>
			<td>
				<?php 
					$farm_id=$item['farm_id'];
					$aFarm = Model_Farm::find($farm_id);
					echo $aFarm->name; 
				?>
			</td>
			<td>
				<?php echo $item['size'].' '.$item['measure_unit']; ?>
			</td>
			<td>
				<?php 
					$product_id=$item['product_id'];
					$aProduct = Model_Product::find($product_id);
					
					echo $aProduct->name; 				
				?>
			</td>
			
			
			<td>
				<?php if(strtolower($item['contract_status']) == 'declined'): ?>
				<span class="label label-danger">
					<?php echo $item['contract_status']; ?>
				</span>
				<?php endif; ?>
				<?php if(strtolower($item['contract_status']) == 'approved'): ?>
				<span class="label label-success">
					<?php echo $item['contract_status']; ?>
				</span>
				<?php endif; ?>
				<?php if(strtolower($item['contract_status']) == 'pending'): ?>
				<span class="label label-info">
					<?php echo $item['contract_status']; ?>
				</span>
				<?php endif; ?>
			
			</td>
			<td>
				<div class="btn-toolbar">
						<?php if(strtolower($item['contract_status']) == 'approved'): ?>
					<div class="btn-group">
					<?php //$contractApplication=Model_Contractstart::query()->where(,$item['contractapplications_id']);?>
					
						<?php echo Html::anchor('contractstart/create/'.$item['contractapplications_id'],
						 '<i class="icon-eye-open"></i> Schedule Start Date', 
						 array('class' => 'btn btn-default btn-sm')); ?>	
						 
						 </div>
						 <?php endif;?>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger">
	<p>There are no pending contracts.</p>
</div>

<?php endif; ?>
		
	</div>
</div>
</div>