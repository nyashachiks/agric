<!-- filters -->
<div class="row">
	<div class="panel panel-default">
		<div class="panel-heading" align="center">
		<h1>Raw materials on offer</small></h1>
		</div>
		<div class="panel-body">
			<form role="form" class="form-horizontal" method="get">
				<div class="row">
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-4">
							<a style="text-decoration: none" href="<?php echo Uri::create('raw/materials/index'); ?>">
								<button type="button" class="btn btn-warning btn-block">Reset</button>
							</a>
						</div>
						<div class="col-md-3">
							By name
						</div>
					    <div class="col-md-5">
					     	<input type="text" name="name" class="form-control" placeholder="Brand name" />
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
								$product = Model_Raw_Material::find('all');
								foreach($product as $item)
									$arr[$item->id]=$item->name;
								echo Form::select('raw_material_id', Input::post('raw_material_id', isset($rawmaterial_offer) ? $rawmaterial_offer->raw_material_id : ''),
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

<?php if(count($rawmaterial_offers)): ?>

<?php $count = 0; ?>
<?php foreach($rawmaterial_offers as $item): ?>
<?php if($item->quantity_left > 0): ?>
<?php 
	$itemsellerid=$item->seller_id;
	$users=Auth\Model\Auth_User::find($item->seller_id); //searching for user
	list(, $userid) = Auth::get_user_id(); 
?>	

<!-- start product widget -->
<div class="col-md-3 col-xs-12">
        <div class="thumbnail">
        <h2 align="center"><?php echo $item->brand_name; ?></h2>
        <h2 align="center"><?php echo $item->raw_material->name; ?></h2>
          <div class="image view view-first">
           <?php
					$file = Asset::get_file('rawmaterial/'.$item->image_name,'img');
					if($file == false){
						$file = Uri::base(false)."/assets/img/rawmaterial/default.jpg";
					}
					?>
            <img style="width: 100%; display: block;" src="<?php echo $file; ?>" alt="image" />
          </div>
          <div class="caption">
            <p><?php
	            echo Str::truncate($item->offer_dscription,150);
            ?></p>
          </div>
          <div class="cart-actions">
          
          <?php if(($item->seller_id) == ($userid)): ?>
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
	There are no raw materials on offer.
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
			window.location = baseURL + "rawmaterial/offer/view/" + targetId;
		});
		
		//edit product
		$(".btnEdit").on('click', function(){
			targetId =  $(this).attr('id');
			window.location = baseURL + "rawmaterial/offer/edit/" + targetId;
		});
		
		//delete a product
		$(".btnDel").on('click', function(){
			targetId =  $(this).attr('id');
			var reply = confirm("Are you sure?");
			if(reply == true){
				window.location = baseURL + "rawmaterial/offer/delete/" + targetId;
				console.log("Product deleted!")
			}
			else{
				console.log("Deletion aborted!");
			}
		});
		
	});
</script>
