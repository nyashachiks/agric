<style>
table tr td:nth-child(1){
	padding: 15px 50px 15px 5px;
	font-weight: bold;
}

</style>


<h2>Farm detailed view</h2>
<legend></legend>
<div class="row">
	<div class="col-md-4">
	
	
	<div class="x_panel" style="">
  <div class="row x_title">
    <div class="col-md-6">
      <h2>Farm details</h2>
    </div>
  </div>
  <div class="x_content">
  
  <table>
  	<tbody>
  		<tr class="x">
  			<td>Farmer: </td>
  			<td><?php
					$users=Auth\Model\Auth_User::find($farm->user_id); //searching for user
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
					echo $firstname.' '.$lastname;
				 ?></td>
  		</tr>
  		<tr>
  			<td>Farm name:</td>
  			<td><?php echo $farm->name; ?></td>
  		</tr>
		

  		<tr>
  			<td>Size: </td>
  			<td><?php echo $farm->size.' '.$farm->units; ?></td>
  		</tr>
  		<tr>
  			<td>Address:</td>
  			<td><?php echo $farm->address->address; ?><br/>
				<?php echo $farm->address->district; ?><br/>
				<?php echo $farm->address->province; ?>
			</td>
  		</tr>
  	</tbody>
  </table>
  
  
  
	
<legend></legend>
<p class="text-center">
	<!--?php echo Html::anchor('farm/edit/'.$farm->id, 'Edit farm', array('class' => 'btn btn-danger btn-round')); ?-->
<?php echo Html::anchor('farm/indexview', 'Go back',array('class' => 'btn btn-primary btn-round')); ?>
</p>
   
  </div>
</div>
		
	</div>
	<div class="col-md-8">
		<?php echo render('dash/farm', array('longitude' => ''.$farm->longitude.'','latitude' => ''.$farm->latitude.'','title' => ''.$farm->name.'')); ?>
	</div>
</div>
