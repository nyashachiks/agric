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
     <!-- form -->
     <?php echo Form::open(array("class"=>"form-horizontal form-label-left input_mask")); ?>

		<div class="form-group">
			<?php echo Form::label('Farm ', 'farm_id', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-7 col-sm-7 col-xs-12">
				<?php 
					list(, $userid) = Auth::get_user_id(); 
					$arr=array(0=>'--Please Select--');
					$farms= Model_Farm::find_by('user_id', $userid);
					foreach($farms as $item)
							$arr[$item->id]=$item->name;
					echo Form::select('farm_id', Input::post('farm_id', isset($contractapplication) ? $contractapplication->farm_id : ''),
							$arr,			
							 array('class' => 'form-control')); 
				?>
				
			</div>
		</div>
		
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
					 array('class' => 'form-control','id'=>'projectID')); 
				?>
			</div>	
		</div>
<div class="form-group">
				<?php echo Form::label('Project Template', 'project_id', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-7 col-sm-7 col-xs-12">
				<?php 
					$arr=array(0=>'--Please Select--');
					echo Form::select('project_id', Input::post('product_id', 
					isset($contractapplication) ? $contractapplication->product_id : ''),
					$arr,			
					 array('class' => 'form-control','disabled',
					 'id'=>'projectname')); 
				?>
			</div>	
<!--div class="col-md-1 col-sm-1 col-xs-12">
				<a id="reportview"
				 href="#" type="button" disabled class="btn btn-info">
				 <i class="glyphicon glyphicon-eye-open"></i></a>
			</div-->
		</div>
		<div class="form-group">
				<?php echo Form::label('Farm Allocation', 'size', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-5 col-sm-7 col-xs-12">
				<?php echo Form::input('size', Input::post('size', isset($contractapplication) ? $contractapplication->size : ''), array('class' => 'form-control', 'placeholder'=>'Size')); ?>
				
			</div>
			<div class="col-md-2 col-sm-2 col-xs-12">
				<?php 
			echo Form::select('measure_unit', Input::post('measure_unit', isset($contractapplication) ? $contractapplication->measure_unit : ''), 
					Custom_UserUtility::units(),	array('class' => 'form-control')); 
				?>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12">
				<?php echo Form::hidden('status', Input::post('status', isset($contractapplication) ? $contractapplication->status : 
			'Open')); ?>
			<?php echo Form::hidden('farmer_id', Input::post('farmer_id', isset($contractapplication) ? $contractapplication->farmer_id : 
			$userid)); ?>
			</div>
			
		</div>
		
		  <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-3">
              <button type="submit" class="btn btn-success btn-round"><?php echo $btn_label; ?></button>
              <a href="<?php echo Uri::create('contractapplication'); ?>"	 style="text-decoration: none">
              	<button type="button" class="btn btn-warning btn-round">Cancel</button>
				</a>
            </div>
          </div>
		
<?php echo Form::close(); ?>
     
     <!-- /form -->
  </div>
</div>
</div>
