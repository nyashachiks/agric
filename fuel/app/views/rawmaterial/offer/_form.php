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
			<label class="control-label col-md-3 col-sm-3 col-xs-12">Raw Materials</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<?php 
						$arr=array(0=>'--Please Select--');
						$rm = Model_Raw_Material::find('all');
						foreach($rm as $item)
							$arr[$item->id]=$item->name;
						echo Form::select('raw_material_id', Input::post('raw_material_id', isset($rawmaterial_offer) ? $rawmaterial_offer->raw_material_id : ''),
						$arr,			
						 array('class' => 'form-control')); 
					?>
			</div>
		</div>
		
		<?php 
			list(, $userid) = Auth::get_user_id(); 
			echo Form::hidden('seller_id', Input::post('seller_id', $userid)); 
		?>
		<div class="form-group" >
			<?php echo Form::label('Brand name', 'brand_name', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('brand_name', Input::post('brand_name', isset($rawmaterial_offer) ? $rawmaterial_offer->brand_name : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Brand Name')); ?>
			</div>
		</div>
		
		
		<div class="form-group">
			
			<?php echo Form::label('Unit price', 'price', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('price', Input::post('price', isset($rawmaterial_offer) ? $rawmaterial_offer->price : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'e.g. 0.5 for 50 cents or 2.13 for $2.13')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Offer description', 'offer_dscription', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::textarea('offer_dscription', Input::post('offer_dscription', isset($rawmaterial_offer) ? $rawmaterial_offer->offer_dscription : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'rows' => 4, 'placeholder'=>'Offer description')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Quantity', 'quantity', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('quantity', Input::post('quantity', isset($rawmaterial_offer) ? $rawmaterial_offer->quantity : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Quantity')); ?>
			</div>
		</div>
		
		
		
		
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12">Select a product picture</label>
			<div class="col-md-7 col-sm-7 col-xs-12">
				<input id ="productPic" class="form-control" type="file" name="raw_pic" />
				<input  type="hidden" name="image_name" id="image_name" value=""/>
				<?php 
				if(isset($rawmaterial_offer))
				{
					echo Form::hidden('quantity_left', Input::post('quanity_left', $rawmaterial_offer->quantity_left)); 
					echo Form::hidden('status', Input::post('status', $rawmaterial_offer->status)); 
					echo Form::hidden('raw_matrial_status', Input::post('raw_matrial_status', $rawmaterial_offer->raw_matrial_status)); 
					echo Form::hidden('count', Input::post('count', $rawmaterial_offer->count)); 
				}
				else
				{
					echo Form::hidden('quantity_left', Input::post('quantity_left',0));
					echo Form::hidden('status', Input::post('status', 'open')); 
					echo Form::hidden('raw_matrial_status', Input::post('raw_matrial_status', 'Ungraded')); 
					echo Form::hidden('count', Input::post('count', 0)); 
				}
				?>
				
			</div>
		</div>

<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		<button type="submit" class="btn btn-md btn-round btn-success"><?php echo $btn_label; ?></button>

		<?php echo Html::anchor('rawmaterial/offer', 'Back', array('class' => 'btn btn-md btn-round btn-warning', 'style' => 'text-decoration: none')); ?>		
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
			$("#image_name").attr('value',200);
		});
		
	});
</script>




