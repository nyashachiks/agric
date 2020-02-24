<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>View contract application</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<div class="row-fluid">
<div class="col-md-6">
	<div class="thumbnail">
		<img class="img-round" src="<?php echo Uri::base().'/assets/img/users/default.jpg'; ?>" width="320px" height="320px"/>
	</div>
</div>	

<?php 
			$farmer_id= $contract->contractapplication->farmer_id;
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
			  
			  //whats the contract id, by the way?
			 $contract_id =  $contract->id;
	 ?>
<?php 
			$contractor_id= $contract->contractor_id; 
			$contractor= Auth\Model\Auth_User::find($contractor_id);
						
			$cfirstname='';
			$clastname='';
					  	
			//getting metadata
			 foreach($contractor->metadata as $meta)
			  {
					//Debug::dump($meta);die;
					if($meta->key=='first_name')
						$cfirstname=$meta->value;
					if($meta->key=='last_name')
						$clastname=$meta->value;
			  }
			 //$cfirstname." ".$clastname;
			 
			 
			
	?>

<div class="col-md-6">
	<table class="table table-striped table-bordered">
		<tbody>
		<tr>
				<td><strong>Application status:</strong></td>
				<td> 
					<?php if(strtolower($contract->status) == 'declined'): ?>
					<span class="label label-danger">
						<?php echo $contract->status; ?>
					</span>
					<?php endif; ?>
					<?php if(strtolower($contract->status) == 'approved'): ?>
					<span class="label label-success">
						<?php echo $contract->status; ?>
					</span>
					<?php endif; ?>
					<?php if(strtolower($contract->status) == 'pending'): ?>
					<span class="label label-info">
						<?php echo $contract->status; ?>
					</span>
					<?php endif; ?>
				 </td>
			</tr>
			<tr>
				<td><strong>Contractor:</strong></td>
				<td>
					<?php echo $cfirstname." ".$clastname;  ?>
				</td>
			</tr>
			<tr>
				<td><strong>Loan amount:</strong></td>
				<td>
					<?php echo '$ '. number_format($contract->loan_amount,2);  ?>
				</td>
			</tr>
			<tr>
				<td><strong>Farmer name:</strong></td>
				<td>
					<?php echo $ffirstname." ".$flastname; ?>
				</td>
			</tr>
			<tr>
				<td><strong>Farm name:</strong></td>
				<td><?php echo $contract->contractapplication->farm->name; ?></td>
			</tr>
			<tr>
				<td><strong>Application date:</strong></td>
				<td><?php echo Date::forge($contract->created_at)->format("%d-%m-%Y @ %H:%M"); ?></td>
			</tr>
			<tr>
				<td><strong>Farm size:</strong></td>
				<td><?php echo $contract->contractapplication->size." ".$contract->contractapplication->measure_unit; ?></td>
			</tr>
			<tr>
				<td><strong>Product</strong></td>
				<td><?php echo $contract->contractapplication->product->name; ?></td>
			</tr>
			<?php if(strtolower($contract->status) != 'pending'): ?>	
			<tr>
				<td><strong>Comment:</strong></td>
				<td>
					<?php echo nl2br($contract->comment); ?>
				</td>
			</tr>
			<?php else: ?>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<?php endif; ?>
		</tbody>
	</table>
</div>
</div>

<div class="row-fluid">
	<table class="table table-striped table-bordered">
		<tbody>
			<tr>
				<td>
					<!-- if approved, lets have an option to create a stop order -->
				<?php if(Model_User::is_CONTRACTOR()): ?>
					<?php if(strtolower($contract->status) == 'approved'): ?>
					
					<!-- check if an So has been created already -->
					<?php if(empty($contract->so)): ?>
					
						<form id="frm_create" action="<?php echo Uri::create('so/create'); ?>" method="post">
								<input type="hidden" name="contract_id" value="<?=$contract_id?>" />
						</form>
						<button id="do_it" class="btn btn-success btn-md">Apply for Stop Order</button>
						<?php else: ?>
						<!-- view the SO linked to this -->
						<a href="<?php echo Uri::create('so/view/'.$contract->so->id); ?>" style="text-decoration: none">
							<button class="btn btn-md btn-success">
								View linked SO
							</button>
						</a>
						
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
					
					<a href="<?php echo Uri::create('contract/contractor_indexmine'); ?>" style="text-decoration: none">
							<button class="btn btn-md btn-warning">Back</button>
						</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>
		
	</div>
</div>
</div>

<?php echo Asset::js('bootbox.min.js'); ?>

<script>
	$(document).ready(function(){
		
		
		
		$("#do_it").on('click', function(){
			
			//submit form only if user is sure
			bootbox.confirm("Are you sure?", function(result) {
				if(result == true){
					$("#frm_create").submit();
				}
			});
		});
		
	});
</script>

