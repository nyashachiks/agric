<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2><?php echo $form_label; ?></h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<form class="form-horizontal" enctype="multipart/form-data" method="post">
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Affected product</label>
				<div class="col-md-7 col-sm-7 col-xs-12">
					<?php 
				$arr=array(0=>'--Please Select--');
				$product = Model_Product::find('all');
				foreach($product as $item)
					$arr[$item->id]=$item->name;
				echo Form::select('product_id', Input::post('product_id', isset($disease) ? $disease->product_id : ''),
				$arr,			
				 array('class' => 'form-control')); 
			?>
				</div>
			</div>
			
			<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Disease name</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::input('name', Input::post('name', isset($disease) ? $disease->name : ''), array('class' => 'form-control', 'placeholder'=>'')); ?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::textarea('description', Input::post('description', isset($disease) ? $disease->description : ''), array('rows' => '4', 'class' => 'form-control', 'placeholder'=>'Describe what this disease is all about.')); ?>
			</div>
	</div>
	
	<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12">Select a product picture</label>
			<div class="col-md-7 col-sm-7 col-xs-12">
				<input id ="diseasePic" class="form-control" type="file" name="dis_pic" />
				<input  type="hidden" name="image_name" id="image_name" value=""/>
								
			</div>
		</div>

	<div class="ln_solid"></div>
	
	<div class="form-group">
		<div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-3">
			<button class="btn btn-md btn-success btn-round" type="submit"><?php echo $btn_label; ?></button>
		<a href="<?php echo Uri::create('disease'); ?>" style="text-decoration: none" >
			<button type="button" class="btn btn-md btn-warning btn-round">Cancel</button>
		</a>
		</div>
	</div>
				
		</form>
	</div>
</div>
</div>
<script>
	$(document).ready(function(){
		$("#diseasePic").on('change', function(){
			console.log("A file has been chosen");
			$("#image_name").attr('value',200);
		});
		
	});
</script>

