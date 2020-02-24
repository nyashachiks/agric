<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<h2>Viewing <span class='muted'><?php echo $productoffer->product->name; ?> on offer</span></h2>

		<p>
			<strong>Product Name:</strong>
			<?php echo $productoffer->product->name; ?>
		</p>
		<p>
			<strong>Farmer Name:</strong>
			<?php 
			$users=Auth\Model\Auth_User::find($productoffer->farmer_id); //searching for user?>	
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
		<p>
			<strong>Market:</strong>
			<?php echo $productoffer->market->name; ?></p>
		<p>
			<strong>Price:</strong>
			$<?php echo $productoffer->price; ?> per <?php echo $productoffer->product->measurement->unit?></p>
		<p>
			<strong>Quanity:</strong>
			<?php echo $productoffer->quanity; ?> <?php echo $productoffer->product->measurement->unit?>s</p>
		<p>
			<strong>Minimum Order Quantity:</strong>
			<?php echo $productoffer->min_quantity; ?> <?php echo $productoffer->product->measurement->unit?>s</p>
		<p>
			<strong>Product Rating:</strong>
			<br/>
			<?php 
					
						echo Form::hidden('product_id', Input::post('product_id', $productoffer->id));
						echo Form::hidden('farmer_id', Input::post('farmer_id', $productoffer->farmer_id));
						echo Form::hidden('market_id', Input::post('market_id', $productoffer->market_id));
						echo Form::hidden('price', Input::post('price', $productoffer->price));
						echo Form::hidden('quanity', Input::post('quanity', $productoffer->quanity));
						echo Form::hidden('min_quantity', Input::post('min_quantity', $productoffer->min_quantity));
						echo Form::hidden('status', Input::post('status', $productoffer->status));
						echo Form::hidden('product_status', Input::post('product_status', $productoffer->product_status));
						echo Form::hidden('quantity_left', Input::post('quantity_left', $productoffer->quantity_left));
						echo Form::hidden('count', Input::post('count', $productoffer->count));
						
						if(isset($productoffer)&&(($productoffer->product_status)=='Ungraded'))
							{
								
								echo Form::radio('product_status','Passed');
								echo Form::label(' Passed', 'product_status');
								echo "<br/>";
								echo Form::radio('product_status','Failed');
								echo Form::label(' Failed', 'product_status');
								
							}
						else if(isset($productoffer)&&(($productoffer->product_status)=='Passed'))
							{
								
								echo Form::radio('product_status','Passed',true);
								echo Form::label(' Passed', 'product_status');
								echo "<br/>";
								echo Form::radio('product_status','Failed');
								echo Form::label(' Failed', 'product_status');
								
							}
						else
							{	
								
								echo Form::radio('product_status','Passed');
								echo Form::label(' Passed', 'product_status');
								echo "<br/>";
								echo Form::radio('product_status','Failed',true);
								echo Form::label(' Failed', 'product_status');
								
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