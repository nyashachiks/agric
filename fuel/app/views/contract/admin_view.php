<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Review contract application</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		
<div class="col-md-6">
	<div class="thumbnail">
	<?php  echo Asset::img('users/default.jpg',['class'=>'img-round']);?>
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
			
			$farmer = $ffirstname." ".$flastname;
			$farm_name = $contract->contractapplication->farm->name;
			$farm_size = $contract->contractapplication->size." ".$contract->contractapplication->measure_unit;
			$product = $contract->contractapplication->product->name;
	 ?>

<div class="col-md-6">
	<table class="table table-striped table-bordered">
		<tbody>
		<tr>
				<td><strong>Application status:</strong></td>
				<td> 
				<?php if (strtolower($contract->status) == 'pending'): ?>
					<span class="label label-info">Pending approval</span>
				<?php endif; ?>
				<?php if (strtolower($contract->status) == 'approved'): ?>
					<span class="label label-success">Approved</span>
				<?php endif; ?>
				
				<?php if (strtolower($contract->status) == 'declined'): ?>
					<span class="label label-success">Declined</span>
				<?php endif; ?>
				 </td>
			</tr>
			<tr>
				<td><strong>Application No.:</strong></td>
				<td><?php echo $contract->id; ?></td>
			</tr>
			<tr>
				<td><strong>Application date:</strong></td>
				<td>
					<?php echo $contract->date_paid;  ?>
				</td>
			</tr>
			<tr>
				<td><strong>Agent's name:</strong></td>
				<td>
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
						 echo " ".$cfirstname." ".$clastname;
				?>
				</td>
			</tr>
			<tr>
				<td><strong>Loan amount:</strong></td>
				<td>
					<?php echo '$'. number_format($contract->loan_amount,2);  ?>
				</td>
			</tr>
			<tr>
				<td><strong>Farmer's name:</strong></td>
				<td>
					<?php echo $farmer;  ?>
				</td>
			</tr>
			<tr>
				<td><strong>Farm name:</strong></td>
				<td><?php echo $farm_name; ?></td>
			</tr>
			<tr>
				<td><strong>Farm size:</strong></td>
				<td><?php echo $farm_size; ?></td>
			</tr>
			<tr>
				<td><strong>Product:</strong></td>
				<td><?php echo $product; ?> </td>
			</tr>
		</tbody>
	</table>
</div>


	<table class="table table-striped table-bordered">
		<tbody>
			<tr>
				<td>
				<!-- back btn goes to 2 locations depending on user type -->
					<?php if(!Model_User::is_AMA()): ?>
						<a href="<?php echo Uri::create('contract/applications'); ?>" style="text-decoration: none">
							<button class="btn btn-md btn-warning">Back</button>
						</a>
					<?php else: ?>
						<a href="<?php echo Uri::create('contract/applications'); ?>" style="text-decoration: none">
							<button class="btn btn-md btn-warning">Back</button>
						</a>
					<?php endif; ?>
				
				<?php if(Model_User::is_AMA() and strtolower($contract->status) == 'pending'): ?>	
					<button data-toggle="modal" data-target="#approv_modal" class="btn btn-md btn-primary">Review application</button>
				<?php endif; ?>
				
				</td>
			</tr>
		</tbody>
	</table>


		
	</div>
</div>
</div>



<div class="row-fluid" style="margin-bottom: 200px"></div>

<div class="row-fluid"></div>

<div class="row-fluid">
<!-- Modal -->
<form method="post" action="<?php echo Uri::create('contract/admin_view/'.$contract->id); ?>">
<div class="modal fade" id="approv_modal" tabindex="-1" role="dialog" aria-labelledby="approv_modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Approval form</h4>
      </div>
      <div class="modal-body">
       <input type="hidden" name="permit_id" value="<?php echo $contract->id; ?>" />
  		<div class="form-group">
    		<label for="status">Approval status</label>
    		<?php 
				$arr=array(0 => '--select status--', 'Declined' => 'Declined', 'Approved' => 'Approved');
				echo Form::select('status', Input::post('status', isset($contract) ? $contract->status : ''),
				$arr,			
				 array('class' => 'form-control btn-block')); 
			?>
  		</div>
  		<div class="form-group">
  			<label for="status">Comment</label>
  			<?php
  				echo Form::textarea('comment', Input::post('comment', isset($contract) ? '' : ''),array('class' => 'btn-block form-control','rows' => '4', 'placeholder' => 'Why did you choose this decision?')); 
  			?>
  		</div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
</form>

</div>

<script>
	$(document).ready(function(){
		
		
		$("#form_status").on('change', function(){
			var sel_option =  $(this).val();
			console.log("selected val = " + sel_option);
			
			if(sel_option == 1){
				$("#opt_fld").css('display','block');
			}
			else{
				$("#opt_fld").css('display',"none");
			}
		});
	});
</script>
