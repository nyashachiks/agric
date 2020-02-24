<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Contract applications</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		
	
<?php if ($open_contracts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Agent Name</th>
			<th>Farmer</th>
			<th>Farm Name</th>
			<th>Size</th>
			<th>Product</th>
			<th>Loan amount</th>
			<th>Status</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach (array_reverse($open_contracts) as $item): ?>		<tr>

			
			<td>
				<?php  
						$id_num=$item->contractor_id; 
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
			<td><?php echo $item->contractapplication->farm->name; ?></td>
			<td><?php echo $item->contractapplication->size.' '.$item->contractapplication->measure_unit; ?></td>
			<td><?php echo $item->contractapplication->product->name; ?></td>
			<td><?php echo '$'.$item->loan_amount; ?></td>
			<td>
				<?php if (strtolower($item->status) == 'pending'): ?>
					<span class="label label-info">Pending approval</span>
				<?php endif; ?>
				<?php if (strtolower($item->status) == 'approved'): ?>
					<span class="label label-success">Approved</span>
				<?php endif; ?>
				
				<?php if (strtolower($item->status) == 'declined'): ?>
					<span class="label label-danger">Declined</span>
				<?php endif; ?>				
			</td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('contract/admin_view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>	</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger">
	<p>There are no contract applications</p>
</div>

<?php endif; ?>
</div>

</div>
</div>

<?php //echo render('contract/_filter'); ?>