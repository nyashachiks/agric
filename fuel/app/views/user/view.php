
<?php $firstname='';
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
	<?php echo $user->email; ?></p>
	
	<?php $address =Model_Address::find($user->address_id);
	Debug::dump($user->address_id);
	Debug::dump($address);die;
	 ?>
		<?php  if(isset($address))
		{
			//$add=$useaddress;
			echo render('address/view',array('address'=>$address));
		}
		else
		{
			echo render('address/view');
		}
 ?>

</div>

<div class="panel-footer">
	<a href="<?php echo Uri::base();?>dashboard" class="btn btn-warning" >
    	Back
  	</a>
    	
  	<a href="<?php echo Uri::base();?>user/edit/<?php echo $user->id;?>" class="btn btn-success">
   		 Edit
  	</a>
</div>
</div>