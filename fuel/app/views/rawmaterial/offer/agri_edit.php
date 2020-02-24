<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<h2>Viewing <span class='muted'><?php echo $rawmaterial_offer->brand_name; ?> on offer</span></h2>

		<p>
			<strong>Product Name:</strong>
			<?php echo $rawmaterial_offer->raw_material->name; ?>
		</p>
		<p>
			<strong>Seller Name:</strong>
			<?php 
			$users=Auth\Model\Auth_User::find($rawmaterial_offer->seller_id); //searching for user?>	
				<?php $firstname='';
					  $lastname='';
					  $structure='';
					  
					  foreach($users->metadata as $meta) //iterating through metadata
					  {
					  	if($meta->key=='first_name')
					  		$firstname=$meta->value;
					  	if($meta->key=='last_name')
					  		$lastname=$meta->value;
					  } 
				?>
			<?php echo $firstname.' '.$lastname; ?></p>
		
			<strong>Price:</strong>
			$<?php echo $rawmaterial_offer->price; ?> per <?php echo $rawmaterial_offer->raw_material->measurement->unit?></p>
		<p>
			<strong>Quantity:</strong>
			<?php echo $rawmaterial_offer->quantity; ?> <?php echo $rawmaterial_offer->raw_material->measurement->unit?>s</p>
		
			<strong>Product Rating:</strong>
			<br/>
			<?php 
					
						echo Form::hidden('raw_material_id', Input::post('raw_material_id', $rawmaterial_offer->id));
						echo Form::hidden('seller_id', Input::post('seller_id', $rawmaterial_offer->seller_id));
						echo Form::hidden('price', Input::post('price', $rawmaterial_offer->price));
						echo Form::hidden('quantity', Input::post('quantity', $rawmaterial_offer->quantity));
						echo Form::hidden('status', Input::post('status', $rawmaterial_offer->status));
						echo Form::hidden('raw_matrial_status', Input::post('raw_matrial_status', $rawmaterial_offer->raw_matrial_status));
						echo Form::hidden('quantity_left', Input::post('quantity_left', $rawmaterial_offer->quantity_left));
						echo Form::hidden('count', Input::post('count', $rawmaterial_offer->count));
						
						if(isset($rawmaterial_offer)&&(($rawmaterial_offer->raw_matrial_status)=='Ungraded'))
							{
								
								echo Form::radio('raw_matrial_status','Passed');
								echo Form::label(' Passed', 'raw_matrial_status');
								echo "<br/>";
								echo Form::radio('raw_matrial_status','Failed');
								echo Form::label(' Failed', 'raw_matrial_status');
								
							}
						else if(isset($rawmaterial_offer)&&(($rawmaterial_offer->raw_matrial_status)=='Passed'))
							{
								
								echo Form::radio('raw_matrial_status','Passed',true);
								echo Form::label(' Passed', 'raw_matrial_status');
								echo "<br/>";
								echo Form::radio('raw_matrial_status','Failed');
								echo Form::label(' Failed', 'raw_matrial_status');
								
							}
						else
							{	
								
								echo Form::radio('raw_matrial_status','Passed');
								echo Form::label(' Passed', 'raw_matrial_status');
								echo "<br/>";
								echo Form::radio('raw_matrial_status','Failed',true);
								echo Form::label(' Failed', 'raw_matrial_status');
								
							}
								?>
		</p>

		<div class="row-fluid">
					<label class='control-label'>&nbsp;</label>
					<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary btn-lg btn-20')); ?>		
		</div>
			
		<?php 
			echo '<br/><br/>';
			echo Html::anchor('dashboard/agri', '<i class="glyphicon glyphicon-chevron-left"> Back</i>', array('class'=>'btn btn-primary btn-lg btn-20')); 
		?>
	</fieldset>
<?php echo Form::close(); ?>