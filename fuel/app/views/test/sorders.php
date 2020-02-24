<?php echo Form::open(array("class"=>"form-horizontal")); ?>
	<h3>Stop order alert</h3>
	<fieldset>
		<?php 
				$sale = Session::get('sale');
				list(, $userid) = Auth::get_user_id(); 
				$user=Auth\Model\Auth_User::find($userid);
				$firstname='';
			  	$lastname='';
			  	$structure='';
			  	$enabled=0;
			  	//getting metadata
				  foreach($user->metadata as $meta)
				  {
				  	//Debug::dump($meta);die;
				  	if($meta->key=='first_name')
				  		$firstname=$meta->value;
				  	if($meta->key=='last_name')
				  		$lastname=$meta->value;
				  	if($meta->key=='structure_id')
				  		$structure=$meta->value;
				  	if($meta->key=='enabled')
				  		$enabled=$meta->value;
				  } 
				 $narrative="";
					
					
				$narrative2= "
				Creditor Classic Leaf Tobacco has requested a stop order for farmer Tom Johnson  for a deduction of USD250.00 per month for the next 6 months.
				
				";
					
					echo Form::hidden('sale_id', Input::post('sale_id', $sale->id)); 
					echo Form::hidden('amount', Input::post('amount', $sale->amount)); 
					echo Form::hidden('narrative', Input::post('narrative', $narrative)); 
					echo Form::hidden('status', Input::post('status', 'pending')); 
					echo Form::hidden('browseurl', Input::post('browseurl', 'browsurl')); 
					echo Form::hidden('pollurl', Input::post('pollurl', 'pollurl')); 
					echo Form::hidden('paynowref', Input::post('paynowref', '000000')); 
					echo Form::hidden('paymentstatus', Input::post('paymentstatus', 'status')); 
					echo Form::hidden('mobile', Input::post('mobile', $user->username)); 
		?>
		
		
		
		
		
		
		
		<div class="row-fluid">
			<?php 	echo $narrative2;	?>
		</div>
		<br/><br/>
		<div class="row-fluid">
			<div class="col-md-5">
				<?php echo Form::submit('submit', 'Approve', array('class' => 'btn btn-primary')); ?>	
					<a href="<?php echo Uri::create('productoffer/index'); ?>" style="text-decoration: none" >
						<button type="button" class="btn btn-md btn-warning">Decline</button>
					</a>
			</div>
			
		</div>
	</fieldset>
<?php echo Form::close(); ?>