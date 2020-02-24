<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2> Search for contract reports</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
     <br/>
     <!-- form -->
     <?php echo Form::open(array("class"=>"form-horizontal form-label-left input_mask")); ?>

		
		
		<div class="form-group">
				<?php echo Form::label('Season', 'season_id', array('class'=>'control-label col-md-3 col-m-3 col-xs-12')); ?>
			<div class="col-md-7 col-sm-7 col-xs-12">
			<?php 
				$arr=array(0=>'--Please Select--');
				$season = Model_Season::find('all');
				foreach($season as $item)
					$arr[$item->id]=$item->name;
				echo Form::select('season_id', Input::post('season_id', isset($contractapplication) ? $contractapplication->season_id : ''),
					$arr,			
					 array('class' => 'form-control')); 
			?>
				
			</div>
		</div>
		<div class="form-group">
				<?php echo Form::label('Year', 'year', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-7 col-sm-7 col-xs-12">
				<?php 
					echo Form::select('year', Input::post('year', isset($contractapplication) ? $contractapplication->year : ''), 
					Custom_UserUtility::future_years(),	array('class' => 'form-control', 'placeholder'=>'Year')); 
				?>
			</div>
		</div>
		<div class="form-group">
				<?php echo Form::label('Product', 'product_id', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-7 col-sm-7 col-xs-12">
				<?php 
					$arr=array(0=>'--Please Select--');
					$product = Model_Product::query()->order_by('name','asc')->get();
					foreach($product as $item)
						$arr[$item->id]=$item->name;
					echo Form::select('product_id', Input::post('product_id',
					 isset($contractapplication) ?
					  $contractapplication->product_id : ''),
					$arr,			
					 array('class' => 'form-control','id'=>'productID')); 
				?>
			</div>	
		</div>

		
		
		  <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-3">
              <button type="submit" class="btn btn-success btn-round">Find</button>
              <a href="<?php echo Uri::create('contract/reports_dash'); ?>"	 style="text-decoration: none">
              	<button type="button" class="btn btn-warning btn-round">Cancel</button>
				</a>
            </div>
          </div>
		
<?php echo Form::close(); ?>
     
     <!-- /form -->
  </div>
</div>
</div>
