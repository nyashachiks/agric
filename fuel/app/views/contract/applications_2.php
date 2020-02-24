<div class="col-md-8 col-sm-8 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Contract applications</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		
	</div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Filter</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		
	</div>
</div>
</div>

<div class="row-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"></h3>
		</div>
		<div class="panel-body">
			<form role="form" class="form-horizontal" method="post">
				<div class="row">
				<div class="col-md-5">
				<div class="row">
					<div class="col-md-3">
					By status
				</div>
			    <div class="col-md-9">
			     
			     <?php 
$arr=array(
	0	=> 	'--choose--',
	'Pending' => 'Pending',
	'Approved' => 'Approved',
	'Declined' => 'Declined'
);

echo Form::select('status', Input::post('status', isset($productoffer) ? '' : ''),
$arr,			
 array('class' => 'col-md-4 form-control')); 
?>
			     
			    </div>
				</div>
				</div>
				
				<div class="col-md-5">
				<div class="row">
					<div class="col-md-3">
					By product
				</div>
			    <div class="col-md-9">
			     
			     <?php 
$arr=array(0=>'--choose--');
$market = Model_Product::query()->order_by('name','asc')->get();

foreach($market as $item)
	$arr[$item->id]=$item->name;
echo Form::select('prod', Input::post('prod', isset($productoffer) ? '' : ''),
$arr,			
 array('class' => 'col-md-4 form-control')); 
?>
			     
			    </div>
				</div>
				</div>
				
				<div class="col-md-2">
			   <p class="text-right">
			   	 <button type="submit" class="btn btn-primary ">Search</button>
			    <a href="<?php echo Uri::create('contract/applications'); ?>" style="text-decoration: none">
			    	<button type="button" class="btn btn-warning ">Show all</button>
			    </a>
			   </p>
				</div> <!-- //row -->
				</div>
			</form>
		</div>
	</div>

</div>

<div class="row-fluid">
	
<?php if ($open_contracts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Contractor Name</th>
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
<?php foreach ($open_contracts as $item): ?>		<tr>

			
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