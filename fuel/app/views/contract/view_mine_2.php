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
	<strong>Contractor's Name: </strong>
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
<p>
	<strong>Comment:</strong>
	<?php echo $contract->comment; ?></p>
	
		
<?php echo Html::anchor('contract/contractor_indexmine', 'Back'); ?>
</fieldset>
<?php echo Form::close(); ?>