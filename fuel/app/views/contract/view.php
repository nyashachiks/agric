<h4>Viewing Contract<span class='muted'> #<?php echo $contract->id; ?></span></h4>

<p>
	<strong>Contract Application id:</strong>
	<?php echo $contract->contractapplication_id; ?></p>
<p>
	<strong>Agent:</strong>
	<?php 
		$id_num=$contract->contractor_id; 
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

<p>
<p>
	<strong>Farmer:</strong>

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
						
		echo $ffirstname." ".$flastname;
	?>

<p>

	<strong>Loan amount:</strong> $
	<?php echo $contract->loan_amount; ?></p>
<p>
	<strong>Balance brought forward:</strong> $
	<?php echo $contract->balance_brought_forward; ?></p>
<p>
	<strong>Amount paid:</strong> $
	<?php echo $contract->amount_paid; ?></p>
<p>
	<strong>Balance carried forward:</strong> $
	<?php echo $contract->balance_carried_forward; ?></p>
<p>
	<strong>Date paid:</strong>
	<?php echo $contract->date_paid; ?></p>
<p>
	<strong>Status:</strong>
	<?php echo $contract->status; ?></p>
<p>
	<strong>Comment:</strong>
	<?php echo $contract->comment; ?></p>


<!--?php echo Html::anchor('contract/edit/'.$contract->id, 'Edit'); ?--> 
<?php echo Html::anchor('contract/index_mine', 'Back'); ?>