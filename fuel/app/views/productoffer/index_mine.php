<style>

/* styling for the product widget */
div.thumbnail {
	height: 300px;
}
div.caption {
	margin-bottom: 10px;
	height: 80px;
}
div.cart-actions {
	text-align: center;
}
.btn-cart{
	min-width: 80px;
}

/* lets hide the title bar */
.page-title {
	display: none;
}

</style>

<!-- filters -->
<div class="row">
	
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading" align="center">
				<h1>Your products on offer</h1>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" method="get">
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-md-4 col-xs-12">
							
							<a href="<?php echo Uri::create('productoffer/create'); ?>" style="text-decoration: none">
								<button class="btn btn-primary btn-round btn-block" type="button">Add new</button>
							</a>	
							</div>
							<div class="col-md-8 col-xs-12">
								<div class="form-group">
						
								 <input type="text" name="name" class="form-control" placeholder="Filter by product" />
						</div>
							</div>
						</div>
						
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="form-group">
							
								 <?php 
$arr=array(0=>'- Filter by market -');
$market = Model_Market::find('all');
foreach($market as $item)
	$arr[$item->id]=$item->name;
echo Form::select('market_id', Input::post('market_id', isset($productoffer) ? $productoffer->market_id : ''),
$arr,			
 array('class' => 'form-control')); 
?>
							
						</div>
						
						
						
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="form-group">
								 <?php 
				$arr=array(0=>'-Filter by product type-');
				$product = Model_Product::find('all');
				foreach($product as $item)
					$arr[$item->id]=$item->name;
				echo Form::select('product_id', Input::post('product_id', isset($productoffer) ? $productoffer->product_id : ''),
				$arr,			
				 array('class' => 'form-control')); 
			?>
							
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12 text-right">
						
							<div class="col-md-9 col-xs-12">
								 <button class="btn btn-round btn-primary" type="submit">Search</button>
								 <a href="<?php echo Uri::create(); ?>" style="text-decoration: none" class="btn btn-round btn-warning">List all</a>
							</div>
						
					</div>
					
				</form>
			</div>
		</div>
	</div>

</div>

<!-- // filters -->

<div class="row">
	<?php if(count($productoffers)): ?>

<?php $count = 0; ?>
<?php foreach($productoffers as $item): ?>
<?php if($item->quantity_left > 0): ?>
<?php 
	$itemfarmerid=$item->farmer_id;
	$users=Auth\Model\Auth_User::find($item->farmer_id); //searching for user
	list(, $userid) = Auth::get_user_id(); 
?>	

<!-- start product widget -->
<div class="col-md-3 col-xs-12">
        <div class="thumbnail">
        <h2 align="center"><?php echo $item->product->name; ?></h2>
          <div class="image view view-first">
           <?php
					$file = Asset::get_file('productoffer/'.$item->image_name,'img');
					if($file == false){
						$file = Uri::base(false)."/assets/img/productoffer/default.jpg";
					}
					?>
            <img style="width: 100%; display: block;" src="<?php echo $file; ?>" alt="image" />
          </div>
          <div class="caption">
            <p><?php
	            echo Str::truncate($item->offer_description,150);
            ?></p>
          </div>
          <div class="cart-actions">
          
          <?php if(($item->farmer_id) == ($userid)): ?>
			<button id="<?php echo $item->id; ?>" class="btn btn-md btn-round btn-cart btn-primary btnEdit">Edit</button>
			<button id="<?php echo $item->id; ?>" class="btnDel btn btn-md btn-round btn-cart btn-danger">Delete</button>
			<?php else: ?>
					 <button id="<?php echo $item->id; ?>" class="btn btn-md btn-success btn-cart btn-round btnMore">View</button>
			<?php endif; ?>	
          </div>
        </div>
      </div>

<!-- END product widget -->
<?php endif; ?>
<?php endforeach; ?>

<?php else: ?>

<?php endif; ?>

<?php $base = Uri::base(); ?>

<script>
	$(document).ready(function(){
	
	var baseURL =  "<?=$base?>";
	var targetId = '';
	
		//view more info about product
		$(".btnMore").on('click', function(){
			targetId =  $(this).attr('id');
			window.location = baseURL + "productoffer/view/" + targetId;
		});
		
		//edit product
		$(".btnEdit").on('click', function(){
			targetId =  $(this).attr('id');
			window.location = baseURL + "productoffer/edit/" + targetId;
		});
		
		//delete a product
		$(".btnDel").on('click', function(){
			targetId =  $(this).attr('id');
			var reply = confirm("Are you sure?");
			if(reply == true){
				window.location = baseURL + "productoffer/delete/" + targetId;
				console.log("Product deleted!")
			}
			else{
				console.log("Deletion aborted!");
			}
		});
		
	});
</script>

</div>
