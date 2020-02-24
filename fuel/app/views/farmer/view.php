
<?php 
	$firstname = Model_User::get_first_name($user->id);
	$lastname = Model_User::get_last_name($user->id);
	$address=Model_User::get_address($user->id);
	$country_name = Model_Address::get_country($address->country_id);
	$bank_details = Model_Bankdetail::get_bankdetails($bank->id);



?>
			<div class="panel panel-default">
			<div class="panel-heading">
			Profile for <span class='muted'>#<?php echo $firstname; ?></span>	
			</div>
<div class="panel-body">

<p>
	<strong>First name:</strong>
	<?php echo $firstname; ?></p>
<p>
	<strong>Last name:</strong>
	<?php echo $lastname; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $user->email; ?>
</p>
<p>
	<strong>Address:</strong><br/>
	<?php  echo $address->address;?><br/>
	<?php  echo $address->province;?><br/>
	<?php 
		if ($address->district == 0 || $address->district == "") 
		{
			# code...
		}
		else
		{
			 echo $address->district.'<br/>';
		}
	?>
	
	<?php  echo $country_name;?><br/>
</p>
<strong>Bank Details:</strong><br/>
<?php 


try
	 {
		echo '<strong>Bank Name: </strong>' .$bank->bank_name.'<br/>';
		echo '<strong>Branch Name: </strong>' .$bank->branch_name.'<br/>';
		echo '<strong>Account Name: </strong>' .$bank->account_name.'<br/>';
		echo '<strong>Account Number: </strong>' .$bank->account_number.'<br/>';
	 } 
catch (Exception $e) 
	{

		Debug::dump($e)
	}

?>





	

</div>

<div class="panel-footer">
	<a href="<?php echo Uri::base();?>dashboard" class="btn btn-warning" >
    	Back
  	</a>
    	
  	<a href="<?php echo Uri::base();?>user/profile/edit/<?php echo $user_profile->id;?>" class="btn btn-success">
   		 Edit
  	</a>
</div>
</div>