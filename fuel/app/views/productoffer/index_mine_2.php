<div class="row-fluid" style="margin-bottom: 15px">
 <h4><strong>My products on offer</strong></h4>
	<?php 
	
		echo Html::anchor('productoffer/create', 'Add new Product Offer', array('class' => 'btn btn-success'));?>
</div>
<?php 
list(, $userid) = Auth::get_user_id();
$farmerid='';//private variable
if ($myproductoffers): 
?>

<table class="table table-striped">
	<thead>
		<tr>
			<th class="col-xs-2" >Product </th>
			<th class="col-xs-2">Market</th>
			<th class="col-xs-1">Price per <br/>Unit</th>
			<th class="col-xs-4">Product image</th>
			<th class="col-xs-3">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($myproductoffers as $item): ?>		
<tr>

<?php 
	$users=Auth\Model\Auth_User::find($item->farmer_id); //searching for user
	list(, $userid) = Auth::get_user_id(); ?>	
		<?php $firstname='';
			  $lastname='';
			  $structure='';
			  //getting metadata
			 // Debug::dump($users->metadata);die;
			  foreach($users->metadata as $meta) //iterating through metadata
			  {
			  	//Debug::dump($meta);die;
			  	if($meta->key=='first_name')
			  		$firstname=$meta->value;
			  	if($meta->key=='last_name')
			  		$lastname=$meta->value;
			  	//if($meta->key=='structure_id')
			  		//$structure=$meta->value;
			  	
			  } 
			?>

			<td><?php echo $item->product->name; ?></td>
			<td><?php echo $item->market->name ?></td>
			<td><?php echo '$'.$item->price.'/'.$item->product->measurement->unit; ?></td>
			<td>
				<!-- lets drop kaimage -->
				<?php
					$file = Asset::get_file('productoffer/'.$item->image_name,'img');
					if($file == false){
						$file = Uri::base()."/assets/img/productoffer/default.jpg";
					}
					?>
					
					<img width="160px" src="<?php echo $file; ?>"/>				
			</td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group" style='float: right;'>
						<?php echo Html::anchor('productoffer/view/'.$item->id, '<i class="glyphicon glyphicon-eye-open"></i> View', 
							array('class' => 'btn btn-success btn-sm'));
							
						?>	
											
						<?php 
								
								$farmerid=$item->farmer_id; 
								if($farmerid==($userid))
								{
									echo Html::anchor('productoffer/edit/'.$item->id,
									 '<i class="glyphicon glyphicon-wrench"></i> Edit', 
									array('class' => 'btn btn-primary btn-sm')); 
														
									echo Html::anchor('productoffer/delete/'.$item->id, 
									'<i class="glyphicon glyphicon-trash icon-white"></i> 
									Delete',array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); 
								}
					?>										
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger">
	<p>You are not offering any product. Consider adding some and start making sales.</p>
</div>

<?php endif; ?><p>
	

</p>
