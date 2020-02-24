

<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Review permit application</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<div class="row">
			
<div class="col-md-6">
	<div class="thumbnail">
	<img class="img-round"  src="<?php echo Model_User::get_user_profile_pic_url($permit->applicant_id); ?>"  width="320px" height="320px"/>
	</div>
	
</div>	
<div class="col-md-6">
	<table class="table table-striped table-bordered">
		<tbody>
		<tr>
				<td><strong>Application status:</strong></td>
				<td> 
				<?php if ($permit->status == 0): ?>
					<span class="label label-info">Pending approval</span>
				<?php endif; ?>
				
				<?php if ($permit->status == 1): ?>
					<span class="label label-success">Reviewed, accepted</span>
				<?php endif; ?>
				
				<?php if ($permit->status == -1): ?>
					<span class="label label-danger">Reviewed, declined</span>
				<?php endif; ?>
					
				 </td>
			</tr>
			<tr>
				<td><strong>Applicant name:</strong></td>
				<td>
					<?php echo $permit->user->get_full_name($permit->applicant_id); ?>
				</td>
			</tr>
			<tr>
				<td><strong>Application No.:</strong></td>
				<td><?php echo $permit->id; ?></td>
			</tr>
			<tr>
				<td><strong>Application date:</strong></td>
				<td><?php echo Date::forge($permit->created_at)->format("%d-%m-%Y @ %H:%M"); ?></td>
			</tr>
			<tr>
				<td><strong>Commodity:</strong></td>
				<td><?php echo $permit->commodity; ?></td>
			</tr>
			<tr>
				<td><strong>Quantity applied for:</strong></td>
				<td><?php echo $permit->qty_applied.' '. $permit->measurement->unit; ?></td>
			</tr>
			<?php if ($permit->status == 1): ?>
			<tr>
				<td><strong>Quantity approved:</strong></td>
				<td><?php echo $permit->qty_approved.' '. $permit->measurement->unit; ?></td>
			</tr>
			<?php endif; ?>
			
			<tr>
				<td><strong>Certification required:</strong></td>
				<td><?php echo $permit->certification; ?></td>
			</tr>
			<tr>
				<td><strong>Supporting document:</strong></td>
				<td>
				<a href="<?php echo Uri::create('permits/download/'.$permit->id); ?>" style="text-decoration: none">
					<button class="btn btn-sm btn-success">Download to view</button>
				</a>
				</td>
			</tr>
			
			<?php if($permit->status != 0): ?>	
			<tr>
				<td><strong>Comment by AMA:</strong></td>
				<td>
					<?php echo nl2br($permit->comment); ?>
				</td>
			</tr>
			<?php endif; ?>
			
		</tbody>
	</table>
</div>

		</div>
		
	</div>
</div>
</div>


<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_content">
			<br/>
			<div class="row">
	<table class="table table-striped table-bordered">
		<tbody>
			<tr>
				<td>
				<!-- back btn goes to 2 locations depending on user type -->
					<?php if(!Model_User::is_AMA()): ?>
						<a href="<?php echo Uri::create('permits/my'); ?>" style="text-decoration: none">
							<button class="btn btn-md btn-warning">Back</button>
						</a>
					<?php else: ?>
						<a href="<?php echo Uri::create('permits'); ?>" style="text-decoration: none">
							<button class="btn btn-md btn-warning">Back</button>
						</a>
					<?php endif; ?>
				
				<?php if(Model_User::is_AMA() and $permit->status == 0): ?>	
					<button data-toggle="modal" data-target="#approv_modal" class="btn btn-md btn-primary">Review application</button>
				<?php endif; ?>
				
				</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="row">
<!-- Modal -->
<form method="post" action="<?php echo Uri::create('permits/approve/'. $permit->id); ?>">
<div class="modal fade" id="approv_modal" tabindex="-1" role="dialog" aria-labelledby="approv_modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Approval form</h4>
      </div>
      <div class="modal-body">
       <input type="hidden" name="permit_id" value="<?php echo $permit->id; ?>" />
  		<div class="form-group">
    		<label for="status">Approval status</label>
    		<?php 
				$arr=array(0 => '--select status--', '-1' => 'Declined', 1 => 'Accepted');
				echo Form::select('status', Input::post('status', isset($permit) ? $permit->status : ''),
				$arr,			
				 array('class' => 'form-control btn-block')); 
			?>
  		</div>
  		<div class="form-group" id="opt_fld" style="display: none;">
    		<label for="qty_approved">Approved quantity</label>
    		<?php echo Form::input('qty_approved', Input::post('qty_approved', isset($permit) ? '' : ''), 
					array('class' => 'btn-block form-control', 'id' => 'approv_qty_fld')); ?>
  		</div>
  		<div class="form-group">
  			<label for="status">Comment</label>
  			<?php
  				echo Form::textarea('comment', Input::post('comment', isset($permit) ? $permit->comment : ''),array('class' => 'btn-block form-control','rows' => '4', 'placeholder' => 'Why did you choose this decision?')); 
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
