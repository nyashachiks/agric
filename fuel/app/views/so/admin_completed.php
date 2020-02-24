<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Approved stop orders</h2>
		
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
	<?php if(isset($sosa) and count($sosa)): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>SO No.</th>
			<th>Contractor Name</th> <!-- from applied_by -->
			<th>Farmer</th>
			<th>Contract #</th> <!-- eg 200, Link -->
			<th>Application date</th>
			<th>Status</th><!-- eg approved, etc -->
			
			<!-- if approved, we add these columns -->
			<th>Processed by</th>
			<th>Approval date</th>
			<th>&nbsp;</th>
			
		</tr>
	</thead>
	<tbody>
	<?php foreach(array_reverse($sosa) as $so): ?>
	<tr>
		<td><?php echo $so->id; ?></td>
		<td>
			<?php 
			
						$id_num=$so->contract->contractor_id; 
						$contractor = Auth\Model\Auth_User::find($id_num);
					  	
					  	//getting metadata
						  foreach($contractor->metadata as $meta)
						  {
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
						$farmer_id= $so->contract->contractapplication->farmer_id;
						$farmer= Auth\Model\Auth_User::find($farmer_id);
						
						$ffirstname='';
					  	$flastname='';
					  	
					  	//getting metadata
						  foreach($farmer->metadata as $meta)
						  {
						  	if($meta->key=='first_name')
						  		$ffirstname=$meta->value;
						  	
						  	if($meta->key=='last_name')
						  		$flastname=$meta->value;
						  }
						
					echo $ffirstname." ".$flastname;
				?>
		</td>
		<td><?php echo $so->contract->id; ?></td>
		<td><?php  echo $so->request_date; ?></td>
		<td>
			<?php if($so->approval_status == 0): ?>
				<span class="label label-info">
					Pending
				</span>
			<?php elseif($so->approval_status == -1): ?>
			<span class="label label-danger">
					Declined
				</span>
			<?php elseif($so->approval_status == 1): ?>
			<span class="label label-success">
					Approved
				</span>
			<?php endif; ?>
		</td>
		
		<td>
			<?php 
						$uid = $so->processed_by;
						$farmer = Auth\Model\Auth_User::find($uid);
						
						$ffirstname='';
					  	$flastname='';
					  	
					  	//getting metadata
						  foreach($farmer->metadata as $meta)
						  {
						  	if($meta->key=='first_name')
						  		$ffirstname=$meta->value;
						  	
						  	if($meta->key=='last_name')
						  		$flastname=$meta->value;
						  }
						
					echo $ffirstname." ".$flastname;
				?>
		</td>
		<td><?php echo $so->approval_date; ?></td>
		<td>
			<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('so/view/'.$so->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>	</div>
				</div>
		</td>
	</tr>	
	
	<?php endforeach; ?>
	</tbody>
</table>
<?php else: ?>

<div class="alert alert-danger">
	<p>
		There are no approved stop orders.
	</p>
</div>
<?php endif; ?>
	</div>
</div>
</div>

<!--//declined table -->
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Declined stop orders</h2>
		
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
	<?php if(isset($sosd) and count($sosd)): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>SO No.</th>
			<th>Contractor Name</th> <!-- from applied_by -->
			<th>Farmer</th>
			<th>Contract #</th> <!-- eg 200, Link -->
			<th>Application date</th>
			<th>Status</th><!-- eg approved, etc -->
			
			<!-- if approved, we add these columns -->
			<th>Processed by</th>
			<th>Approval date</th>
			<th>&nbsp;</th>
			
		</tr>
	</thead>
	<tbody>
	<?php foreach(array_reverse($sosd) as $so): ?>
	<tr>
		<td><?php echo $so->id; ?></td>
		<td>
			<?php 
			//Debug::dump($so);die;
						$id_num=$so->contract->contractor_id; 
						$contractor = Auth\Model\Auth_User::find($id_num);
					  	
					  	//getting metadata
						  foreach($contractor->metadata as $meta)
						  {
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
						$farmer_id= $so->contract->contractapplication->farmer_id;
						$farmer= Auth\Model\Auth_User::find($farmer_id);
						
						$ffirstname='';
					  	$flastname='';
					  	
					  	//getting metadata
						  foreach($farmer->metadata as $meta)
						  {
						  	if($meta->key=='first_name')
						  		$ffirstname=$meta->value;
						  	
						  	if($meta->key=='last_name')
						  		$flastname=$meta->value;
						  }
						
					echo $ffirstname." ".$flastname;
				?>
		</td>
		<td><?php echo $so->contract->id; ?></td>
		<td><?php  echo $so->request_date; ?></td>
		<td>
			<?php if($so->approval_status == 0): ?>
				<span class="label label-info">
					Pending
				</span>
			<?php elseif($so->approval_status == -1): ?>
			<span class="label label-danger">
					Declined
				</span>
			<?php elseif($so->approval_status == 1): ?>
			<span class="label label-success">
					Approved
				</span>
			<?php endif; ?>
		</td>
		
		<td>
			<?php 
						$uid = $so->processed_by;
						$farmer = Auth\Model\Auth_User::find($uid);
						
						$ffirstname='';
					  	$flastname='';
					  	
					  	//getting metadata
						  foreach($farmer->metadata as $meta)
						  {
						  	if($meta->key=='first_name')
						  		$ffirstname=$meta->value;
						  	
						  	if($meta->key=='last_name')
						  		$flastname=$meta->value;
						  }
						
					echo $ffirstname." ".$flastname;
				?>
		</td>
		<td><?php echo $so->approval_date; ?></td>
		<td>
			<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('so/view/'.$so->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>	</div>
				</div>
		</td>
	</tr>	
	
	<?php endforeach; ?>
	</tbody>
</table>
<?php else: ?>

<div class="alert alert-danger">
	<p>
		There are no declined stop orders.
	</p>
</div>
<?php endif; ?>
	</div>
</div>
</div>