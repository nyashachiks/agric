
<?php 
		if(isset($labor)):
		
			
			
				$users=Auth\Model\Auth_User::find($labor->laborer_id); //searching for user
				$firstname='';
			  	$lastname='';
			    //getting metadata
			 	
			  	foreach($users->metadata as $meta) //iterating through metadata
			  	{
				 	if($meta->key=='first_name')
				  		$firstname=$meta->value;
				  	if($meta->key=='last_name')
				  		$lastname=$meta->value;
				} 
				
	?>

<h4>Viewing labor information for <?php echo $firstname.' '.$lastname; ?></h4>

<p>
	<strong>Skill name:</strong>
	<?php echo $labor->skill_name; ?></p>
<p>
	<strong>Rate :</strong>
	<?php echo '$'.$labor->rate.' '.Custom_UserUtility::$getRatePeriods[$labor->rate_time]; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $labor->description; ?></p>
<p>
	<strong>Download CV:</strong>
		<?php echo $labor->actual_name; ?>
		<?php echo  Html::anchor('labor/download/'.$labor->id, '<i class="glyphicon glyphicon-download-alt icon-white"></i>Download', array('class'=>'btn btn-md btn-success'));?>
		
	</p>

<?php 
endif;
?>
