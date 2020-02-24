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
		<h1>Services and Equipment on offer, <small>we have plenty!</small></h1>
		</div>
		<div class="panel-body">
			<form role="form" class="form-horizontal" method="get">
				<div class="row">
				<div class="col-md-4">
				<div class="row">
					<div class="col-md-4">
						<a style="text-decoration: none" href="<?php 
						echo Uri::create('stakeholder/product/serviceoffer'); ?>">
							<button type="button" class="btn btn-warning btn-block">Reset</button>
						</a>
					</div>
					<div class="col-md-3">
					By name
				</div>
			    <div class="col-md-5">
			<input type="text" name="name" class="form-control" placeholder="Product name" list="products" 
			value="<?php echo isset($prod_name)?$prod_name:'';?>"/>
<datalist id="products">
<?php
$tradingNames=Model_Stakeholder_Product::find('all');
foreach($tradingNames as $item):
?>
  <option value="<?php echo $item->name;?>" />
 <?php endforeach;?>
</datalist>
			     
			    </div>
				</div>
				</div>
				
				<div class="col-md-4">
				<div class="row">
					<div class="col-md-3">
					By Trader
				</div>
			    <div class="col-md-7">
 <input name='market_id' type="search" value="<?php echo isset($market_id)?$market_id:'';?>"
list="languages" placeholder="Trading Name" class='col-md-4 form-control'>

<datalist id="languages">
<?php
list(, $userid) = Auth::get_user_id();
$tradingNames=Model_Stakeholder_Tradingdetail::find('all');
foreach($tradingNames as $item):
?>
  <option value="<?php echo $item->name;?>" />
 <?php endforeach;?>
</datalist>
			    
			     
			    </div>
				</div>
				</div>
				
				<div class="col-md-4">
					<div class="row">
								
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

<?php if(count($servicesoffered)): ?>

<?php $count = 0; ?>
<?php foreach($servicesoffered as $item): ?>
<?php //if($item->quantity_left > 0): ?>
<?php 
	//$itemfarmerid=$item->farmer_id;
//	$users=Auth\Model\Auth_User::find($item->farmer_id); //searching for user
//	list(, $userid) = Auth::get_user_id(); 
?>	

<!-- start product widget -->
<div class="col-md-3 col-xs-12">
        <div class="thumbnail">
        <h2 align="center"><?php echo $item->tradingname. ' <small>' .$item->name.'</small>'; ?></h2>
          <div class="image view view-first">
           <?php
					$file = Asset::get_file('profilepics/'.$item->pic,'img');
					if($file == false){
						$file = Uri::base(false)."/assets/img/productoffer/default.jpg";
					}
					?>
            <img style="width: 100%; display: block;" src="<?php echo $file; ?>" alt="image" />
          </div>
          <div class="caption">
            <p><?php
	            echo Str::truncate($item->description,150);
            ?></p>
          </div>
          <div class="cart-actions">
 <button id="<?php echo $item->id; ?>" class="btn btn-md btn-success btn-cart btn-round btnMore">View</button>
			<?php //endif; ?>	
          </div>
        </div>
      </div>

<!-- END product widget -->
<?php //endif; ?>
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
			window.location = baseURL + "stakeholder/product/viewserviceoffer/" + targetId;
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
