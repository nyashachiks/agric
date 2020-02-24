<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
	<?php 
				
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
		<h2>Viewing labor information for <?php echo $firstname.' '.$lastname; ?></h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<div class="row">
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
		<strong>Contact details:</strong>
		<?php echo nl2br(Model_User::get_contact_details($labor->laborer_id)); ?>
	</p>
<p>
	<strong>Download CV:</strong>
		<?php echo $labor->actual_name; ?>
		<?php echo  Html::anchor('labor/download/'.$labor->id, '<i class="glyphicon glyphicon-download-alt icon-white"></i> Download', array('class'=>'btn btn-md btn-success'));?>
		
	</p>
	<a href="<?php echo Uri::create('labor/indexview'); ?>" style="text-decoration: none">
		<button type="button" class="btn btn-md btn-warning">
		Back
	</button>
	</a>
		</div>
	</div>
</div>
</div>