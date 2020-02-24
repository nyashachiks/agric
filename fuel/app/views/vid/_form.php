<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2><?php echo $form_label; ?></h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br/>
			<?php echo Form::open(array("class"=>"form-horizontal")); ?>		<div class="form-group">
			
			<?php echo Form::label('National id', 'national_id', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">								
<input name='national_id' type="search" list="languages" placeholder="National ID" class='col-md-6 col-sm-6 col-xs-12 form-control'>

<datalist id="languages">
  <option value="66-071210C23" />
  <option value="66-056780C09" />
  <option value="62-088680C76" />
  <option value="16-046450C77" />
  <option value="66-026700C77" />
</datalist>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Details', 'details', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('details', Input::post('details', isset($vid) ? $vid->details : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Details')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('License type', 'license_type', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
				
		<input name='license_type' type="search" list="languages2" placeholder="Licence Type" class='col-md-6 col-sm-6 col-xs-12 form-control'>

<datalist id="languages2">
  <option value="Home Radio" />
  <option value="Home TV" />
  <option value="Car Radio" />
  <option value="Car TV" />

</datalist>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Amount', 'amount', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('amount', Input::post('amount', isset($vid) ? $vid->amount : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Amount')); ?>
			</div>
		</div>

<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		<button type="submit" class="btn btn-md btn-round btn-success"><?php echo $btn_text; ?></button>

		<?php echo Html::anchor('vid', 'Back', array('class' => 'btn btn-md btn-round btn-warning', 'style' => 'text-decoration: none')); ?>		
	</div>
	
</div>
<?php echo Form::close(); ?>			
		</div>
	</div>
</div>






