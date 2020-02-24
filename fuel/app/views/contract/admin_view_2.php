<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<h3>Viewing Contract Application <span class='muted'>#<?php echo $contract->id; ?></span></h3>

<p>
	<strong>Contract Application Details:</strong>
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
						
			
			echo "<br/>Farmer's Name : ".$ffirstname." ".$flastname;
			echo "<br/>Farm Name     : ".$contract->contractapplication->farm->name;
			echo "<br/>Farm Size     : ".$contract->contractapplication->size." ".$contract->contractapplication->measure_unit;
			echo "<br/>Product       : ".$contract->contractapplication->product->name;
	 ?>
</p>
<p>
	<strong>Agent's Name: </strong>
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
</p>
<p>
	<strong>Loan amount: </strong>$
	<?php echo $contract->loan_amount; ?></p>

	<strong>Date Applied:</strong>
	<?php echo $contract->date_paid; ?></p>
<p>
	<strong>Status:</strong>
	<?php echo $contract->status; ?></p>
	
<?php 

		
		if(isset($contract)&&(($contract->status)=='Pending'))
							{
								
								echo Form::radio('status','Approved');
								echo Form::label(' Approved', 'status');
								echo "<br/>";
								echo Form::radio('status','Declined');
								echo Form::label(' Declined', 'status');
								
							}
		else if(isset($contract)&&(($contract->status)=='Approved'))
							{
								
								echo Form::radio('status','Approved',true);
								echo Form::label(' Approved', 'status');
								echo "<br/>";
								echo Form::radio('status','Declined');
								echo Form::label(' Declined', 'status');
								
							}
						else
							{	
								
								echo Form::radio('status','Approved');
								echo Form::label(' Approved', 'status');
								echo "<br/>";
								echo Form::radio('status','Declined', true);
								echo Form::label(' Declined', 'status');
								
							}
							
							echo "<br/>";
		?>
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Comment', 'comment', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-7">
				<?php echo Form::textarea('comment', Input::post('comment', isset($contract) ? $contract->comment: ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Comment')); ?>
		</div>


		<div class="row-fluid">
					<label class='control-label'>&nbsp;</label>
					<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary btn-lg btn-20')); ?>		
		</div>

<?php echo Html::anchor('contract/index_admin', 'Back'); ?>
</fieldset>
<?php echo Form::close(); ?>