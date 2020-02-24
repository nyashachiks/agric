<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2><?php echo $form_label; ?></h2>
			<ul class="nav navbar-right panel_toolbox">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
	    </ul>
	    <div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<form class="form-horizontal" enctype="multipart/form-data" method="post" >
		<div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Commodity
            </label>
            <div class="col-md-6 col-sm-9 col-xs-12">
              <?php echo Form::input('commodity', Input::post('commodity', isset($permit) ? $permit->commodity : ''), 
					array('class' => 'form-control', 'placeholder' => '')); ?>
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity applied
            </label>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <?php echo Form::input('qty_applied', Input::post('qty_applied', isset($permit) ? $permit->qty_applied : ''), 
					array('class' => 'form-control', 'placeholder' => '')); 
				?>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-12">
            	<?php 
									$arr=array(0 => '--select unit--');
									$product = Model_Measurement::query()->order_by('unit')->get();
									foreach($product as $item)
										$arr[$item->id]=$item->unit;
									echo Form::select('measurement_id', Input::post('measurement_id', isset($permit) ? $permit->measurement_id : ''),
									$arr,			
									 array('class' => 'form-control')); 
								?>
            </div>
          </div>
          
          <div class="form-group">
          	<label class="control-label col-md-3 col-sm-3 col-xs-12">Product certification required</label>
          	<div class="col-md-6 col-sm-9 col-xs-12">
          		<?php 
									$arr=array
									(
										0 			=> '--select certification--',
										'ISO9001' 	=> 'ISO9001',
										'SAZ' 		=> 'SAZ',
									);
									
									echo Form::select('certification', Input::post('certification', isset($permit) ? $permit->certification : ''),
									$arr,			
									 array('class' => 'form-control ')); 
								?>
          	</div>
          </div>
          <div class="form-group">
          	<label class="col-md-3 col-sm-3 col-xs-12 control-label">Attach a support letter</label>
          	<div class="col-md-6 col-sm-9 col-xs-12">
          		<input class="form-control" id="upload" type="file" name="doc" />
          	</div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
          	<div class="col-md-6 col-sm-9 col-xs-12 col-md-offset-3">
              <button class="btn btn-md btn-success btn-round"><?php echo $btn_label; ?></button>
              <a href="<?php echo Uri::create('permits/my'); ?>" style="text-decoration: none">
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
		$("#upload").on("change", function(){
			
			//console.log("Support document has  been changed");
			
			$("#hid_upload_fld").val() = 200;
		});
	});
</script>