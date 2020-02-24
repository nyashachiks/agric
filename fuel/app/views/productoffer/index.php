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

div.page-title{
	display: none;
}

</style>

<!-- filters -->
<div class="row">
	<div class="panel panel-default">
		<div class="panel-heading" align="center">
		<h1>Products on offer, <small>we have plenty!</small></h1>
		</div>
		<div class="panel-body">
			<form role="form" class="form-horizontal" method="get">
				<div class="row">
				<div class="col-md-4">
				<div class="row">
					<div class="col-md-4">
						<a style="text-decoration: none" href="<?php echo Uri::create('productoffer/index'); ?>">
							<button type="button" class="btn btn-warning btn-block">Reset</button>
						</a>
					</div>
					<div class="col-md-3">
					By name
				</div>
			    <div class="col-md-5">
			     <input type="text" name="name" class="form-control" placeholder="Product name" />
			    </div>
				</div>
				</div>
				
				<div class="col-md-4">
				<div class="row">
					<div class="col-md-3">
					By market
				</div>
			    <div class="col-md-7">
			     
			     <?php 
$arr=array(0=>'--Choose a market --');
$market = Model_Market::find('all');
foreach($market as $item)
	$arr[$item->id]=$item->name;
echo Form::select('market_id', Input::post('market_id', isset($productoffer) ? $productoffer->market_id : ''),
$arr,			
 array('class' => 'col-md-4 form-control')); 
?>
			     
			    </div>
				</div>
				</div>
				
				<div class="col-md-4">
					<div class="row">
					
				<div class="col-md-3">
					By type
				</div>
			    <div class="col-md-5">
			    <?php 
				$arr=array(0=>'--Select--');
				$product = Model_Product::find('all');
				foreach($product as $item)
					$arr[$item->id]=$item->name;
				echo Form::select('product_id', Input::post('product_id', isset($productoffer) ? $productoffer->product_id : ''),
				$arr,			
				 array('class' => 'col-md-4 form-control')); 
			?>
				</div>
				
				<div class="col-md-4">
			    <button type="submit" class="btn btn-primary btn-block">Search</button>
				</div>
				
					</div>
				</div>
				</div> <!-- //row -->
			</form>
		</div>
	</div>
</div>

<!-- // filters -->

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

<div class="alert alert-danger">
	There are no products on offer.
</div>

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
