<div class="row row-fluid">
	<div class="col-md-12">
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Contract</h3>
		</div>
		<div class="panel-body">
			<?php echo Form::open(array("class"=>"form-horizontal", 'id' => 'approval_form')); ?>

	<fieldset>
	<?php 
			list(, $userid) = Auth::get_user_id(); 
			$user=Auth\Model\Auth_User::find($userid);
			$contractapplication = Session::get('contractapplication');
			echo Form::hidden('contractapplication_id', Input::post('contractapplication_id', $contractapplication->id)); 
			echo Form::hidden('contractor_id', Input::post('contractor_id', $userid)); 
			echo Form::hidden('status',Input::post('status', 'Pending'));
			echo Form::hidden('balance_brought_forward', Input::post('balance_brought_forward', '0')); 
			echo Form::hidden('amount_paid', Input::post('amount_paid', '0.0'));
			echo Form::hidden('balance_carried_forward', Input::post('balance_carried_forward', '0'));
			echo Form::hidden('date_paid', Input::post('date_paid',  date('Y/m/d')));
			echo Form::hidden('comment', Input::post('comment',  'Pending'));
			echo Form::hidden('actualyield', Input::post('actualyield',  '0.0'));


	
		
		//$loan_amount=$total;
			list(, $userid) = Auth::get_user_id(); 
			
				$ufirstname='';
			  	$ulastname='';
			  
			  	
				  foreach($user->metadata as $meta)
				  {
				  	
				  	if($meta->key=='first_name')
				  		$ufirstname=$meta->value;
				  	if($meta->key=='last_name')
				  		$ulastname=$meta->value;
				  	
				  } 
				$farmer=Auth\Model\Auth_User::find($contractapplication->farmer_id);
				
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
			
			
			$narrative='This is a contract between Agent '.$ufirstname.' '.$ulastname.' and Farmer :'.$ffirstname.' '.$flastname.' for  using ' 
			.$contractapplication->size.' '.$contractapplication->measure_unit.' of Farm : '.$contractapplication->farm->name.' to grow '
			.$contractapplication->product->name.'';
			//.'<br/>Expected yield is '.$expectedyield.' Kgs'
		//	.'<br/>Total Loan amount is $'.$loan_amount;
	?>
		<div class="clearfix"></div>
	
		
		<div class="row">
				<div class="col-md-10">
					<div class="alert alert-success">
					<?php 	echo $narrative;	?>
				</div>
				</div>
				<div class="col-md-2" style="margin-left: -10px;">
					<button id="btn_submit" class="btn btn-lg btn-primary">Send for approval</button>
				</div>
		</div>
		
		<div class="row">
					<?php
if(isset($contractapplication->project)){
	 echo render('contract/_projectsubreport.php',
	 ['project'=>$contractapplication->project,'contactApplicationId'=>$contractapplication->id]);
	 }
	 else
	 {
	 	echo "No project template was used!";
	 }
	 ?>
		</div>
		
	</fieldset>
<?php
$total=Session::get_flash('cumulativeTotal');
		$expectedyield=0;//$expectedyield=$seedbags*$size*10;
		echo Form::hidden('loan_amount', Input::post('loan_amount', $total));
		echo Form::hidden('expectedyield', Input::post('expectedyield',  $expectedyield));
		
 echo Form::close(); ?>
		</div>
		<div class="panel-footer">
			<a href="<?php echo Uri::create('contractapplication/viewcontract/'.
			$contractapplication->id); ?>" style="text-decoration: none">
			<button class="btn btn-md btn-warning" type="button">Cancel</button>
		</a>
		</div>
	</div>

	</div>
</div>

<script>
	$(document).ready(function(){
		$("#btn_submit").on('click',function(){
			$("#approval_form").submit();
			console.log("Ouch!, you clicked me");
		});
	});
</script>
