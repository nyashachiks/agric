<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>View Stop Order</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<div class="row">
<div class="col-md-6">
	<div class="thumbnail">
		<img class="img-round" src="<?php echo  Model_User::get_user_profile_pic_url($so->contract->contractapplication->farmer_id); ?>" width="320px" height="320px"/>
	</div>
</div>	

<?php 
			$farmer_id= $so->contract->contractapplication->farmer_id;
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
			  
			  //whats the SO id, by the way?
			 $so_id =  $so->id;
			 
			 $is_approved = true;
			 if($so->approval_status == 0) $is_approved = false;
	 ?>
<?php 
			$soor_id= $so->contract->contractor_id; 
			$soor= Auth\Model\Auth_User::find($soor_id);
						
			$cfirstname='';
			$clastname='';
					  	
			//getting metadata
			 foreach($soor->metadata as $meta)
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
				<td><strong>SO application status:</strong></td>
				<td> 
					<?php if(strtolower($so->approval_status) == -1): ?>
					<span class="label label-danger">
						Declined
					</span>
					<?php endif; ?>
					<?php if(strtolower($so->approval_status) == 1): ?>
					<span class="label label-success">
						Accepted
					</span>
					<?php endif; ?>
					<?php if(strtolower($so->approval_status) == 0): ?>
					<span class="label label-info">
						Pending
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
					<?php echo '$ '. number_format($so->contract->loan_amount,2);  ?>
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
				<td><?php echo $so->contract->contractapplication->farm->name; ?></td>
			</tr>
			<tr>
				<td><strong>SO application date:</strong></td>
				<td><?php echo Date::forge($so->created_at)->format("%d-%m-%Y @ %H:%M"); ?></td>
			</tr>
			<tr>
				<td><strong>Farm size:</strong></td>
				<td><?php echo $so->contract->contractapplication->size." ".$so->contract->contractapplication->measure_unit; ?></td>
			</tr>
			<tr>
				<td><strong>Product</strong></td>
				<td><?php echo $so->contract->contractapplication->product->name; ?></td>
			</tr>
			<?php if(strtolower($so->approval_status) != 0): ?>	
			<tr>
				<td><strong>Comment:</strong></td>
				<td>
					<?php echo nl2br($so->comment); ?>
				</td>
			</tr>
			
			<?php if($so->approval_status == 1): ?>
			<tr>
				<td><strong>Approval letter:</strong></td>
				<td>
					<a href="<?php echo Uri::create('so/dl/'. $so->id); ?>" style="text-decoration: none">
						<button class="btn btn-md btn-success">Click to download</button>
					</a>
				</td>
			</tr>
			<?php endif; ?>
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
					<!-- lets review the SO application -->
					<?php if(!$is_approved): ?>
				<?php if(Model_User::is_AMA()): ?>
					<button data-toggle="modal" data-target="#approv_modal" class="btn btn-md btn-primary">SO approval</button>
				<?php endif; ?>
				<?php endif; ?>
					
					<a href="<?php echo Uri::create('so/completed'); ?>" style="text-decoration: none">
							<button class="btn btn-md btn-warning">Back</button>
						</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="row-fluid">

<!-- Modal -->
<form method="post" action="<?php echo Uri::create('so/approve/'. $so->id); ?>">
<div class="modal fade" id="approv_modal" tabindex="-1" role="dialog" aria-labelledby="approv_modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Approval form</h4>
      </div>
      <div class="modal-body">
       <input type="hidden" name="so_id" value="<?php echo $so->id; ?>" />
  		<div class="form-group">
    		<label for="status">Approval status</label>
    		<?php 
				$arr=array(0 => '--select status--', '-1' => 'Declined', 1 => 'Accepted');
				echo Form::select('status', Input::post('status', isset($so) ? 0 : 0),
				$arr,			
				 array('class' => 'form-control btn-block')); 
			?>
  		</div>
  		<div class="form-group">
  			<label for="status">Comment</label>
  			<?php
  				echo Form::textarea('comment', Input::post('comment', isset($so) ? $so->comment : ''),array('class' => 'btn-block form-control','rows' => '4', 'placeholder' => 'Why did you choose this decision?')); 
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
		
	</div>
</div>
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
				$("#approv_qty_fld").attr('value',0);
			}
		});
		
	});

</script>

