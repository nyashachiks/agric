<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2><?php echo $form_label; ?></h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<form class="form-horizontal" enctype="multipart/form-data" method="post" >
		<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Product</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php 
				$arr=array(0=>'--Please Select--');
				$product = Model_Product::find('all');
				foreach($product as $item)
					$arr[$item->id]=$item->name;
				echo Form::select('product_id', Input::post('product_id', isset($productoffer) ? $productoffer->product_id : ''),
				$arr,			
				 array('class' => 'form-control')); 
			?>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Market</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php list(, $userid) = Auth::get_user_id(); 
			echo Form::hidden('farmer_id', Input::post('farmer_id', $userid)); ?>
				<?php 
					$arr=array(0=>'--Please Select--');
					$market = Model_Market::find('all');
					foreach($market as $item)
						$arr[$item->id]=$item->name;
					echo Form::select('market_id', Input::post('market_id', isset($productoffer) ? $productoffer->market_id : ''),
					$arr,			
					 array('class' => 'form-control')); 
				?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Offer description</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::textarea('offer_description', Input::post('offer_description', isset($productoffer) ? $productoffer->offer_description : ''), 
					array('rows' => '4', 'class' => 'form-control', 'placeholder'=>'Sweet words to describe your offering.')); ?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Unit price</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::input('price', Input::post('price', isset($productoffer) ? $productoffer->price : ''), 
					array('class' => 'form-control', 'placeholder'=>'e.g. 0.5 for 50 cents or 2.13 for $2.13')); ?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Available quantity</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::input('quanity', Input::post('quanity', isset($productoffer) ? $productoffer->quanity : ''), 
					array('class' => 'form-control', 'placeholder'=>'Quantity')); ?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Minimum quantity</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::input('min_quantity', Input::post('min_quantity', isset($productoffer) ? $productoffer->min_quantity : ''), 
					array('class' => 'form-control', 'placeholder'=>'MOQ')); ?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Select a product picture</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<input id ="productPic" class="form-control" type="file" name="product_pic" />
		<input  type="hidden" name="pic_chosen" id="pic_chosen" value=""/>
		<?php 
		if(isset($productoffer))
		{
			echo Form::hidden('quantity_left', Input::post('quanity_left', $productoffer->quantity_left)); 
			echo Form::hidden('status', Input::post('status', $productoffer->status)); 
			echo Form::hidden('product_status', Input::post('product_status', $productoffer->product_status)); 
			echo Form::hidden('count', Input::post('count', $productoffer->count)); 
		}
		else
		{
			echo Form::hidden('quantity_left', Input::post('quantity_left',0));
			echo Form::hidden('status', Input::post('status', 'open')); 
			echo Form::hidden('product_status', Input::post('product_status', 'Ungraded')); 
			echo Form::hidden('count', Input::post('count', 0)); 
		}
		?>
		
	</div>
</div>
<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-3">
		<button class="btn btn-md btn-success btn-round" type="submit"><?php echo $btn_label; ?></button>
		<a href="<?php echo Uri::create('productoffer/index_mine'); ?>" style="text-decoration: none"> 
			<button class="btn btn-md btn-warning btn-round" type="button">Cancel</button>
		</a>
	</div>
</div>
		
		</form>
	</div>
</div>
</div>

<script>
	$(document).ready(function(){
		$("#productPic").on('change', function(){
			console.log("A file has been chosen");
			$("#pic_chosen").attr('value',200);
		});
		
	});
</script>