<h4><strong>Listing all products on offer</strong></h4>
<div class="row">

<?php $itemfarmerid='';
$userid='';
if ($productoffers): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th class="col-md-1">Item #</th>
			<th class="col-sm-2">Product name </th>
			<th class="col-sm-3">How it looks </th>
			<th class="col-sm-2">Market</th>
			<th class="col-sm-2">Price</th>
			<th class="col-sm-2">Actions</th>
		</tr>
	</thead>
	<tbody>
<?php 

foreach ($productoffers as $item): ?>		
<?php if($item->quantity_left>0)?>
<tr>

<?php 
$itemfarmerid=$item->farmer_id;
	$users=Auth\Model\Auth_User::find($item->farmer_id); //searching for user
	list(, $userid) = Auth::get_user_id(); 
	?>	
		<!--?php $firstname='';
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
			?-->
			<td><strong><?php echo $item->product->id; ?></strong></td>
			<td><?php echo $item->product->name; ?></td>
			<td>
				<div class="thumbnail" style="width: 160px;">
					<?php
					$file = Asset::get_file('productoffer/'.$item->image_name,'img');
					if($file == false){
						$file = Uri::base()."/assets/img/productoffer/default.jpg";
					}
					?>
					
					<img width="160px" src="<?php echo $file; ?>"/>
				</div>
				
			</td>
			<td><?php echo $item->market->name ?></td>
			<td><?php echo '$'.$item->price.'/'.$item->product->measurement->unit; ?></td>
			
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('productoffer/view/'.$item->id, '<i class="glyphicon glyphicon-eye-open"></i> View', 
							array('class' => 'btn btn-success btn-sm')); ?>	
											
						<?php 
								
								if(($item->farmer_id)==($userid))
								{
									echo Html::anchor('productoffer/edit/'.$item->id, '<i class="glyphicon glyphicon-wrench"></i> Edit', 
									array('class' => 'btn btn-primary btn-sm')); 					
									echo Html::anchor('productoffer/delete/'.$item->id, '<i class="glyphicon glyphicon-trash icon-white"></i> 
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
	<p> There are no products on offer.</p>
</div>

<?php endif; ?>

</div>
