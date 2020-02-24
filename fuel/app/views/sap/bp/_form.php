<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2><?php echo $form_label; ?></h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br/>
			<?php echo Form::open(array("class"=>"form-horizontal")); ?>		<div class="form-group">
			
			<?php echo Form::label('First Name', 'firstname', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('firstname', Input::post('firstname', isset($sap_bp) ? $sap_bp->firstname : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Firstname')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Last Name', 'lastname', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('lastname', Input::post('lastname', isset($sap_bp) ? $sap_bp->lastname : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Lastname')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Street', 'street', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('street', Input::post('street', isset($sap_bp) ? $sap_bp->street : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Street')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('House Number', 'housenumber', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('housenumber', Input::post('housenumber', isset($sap_bp) ? $sap_bp->housenumber : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Housenumber')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('City', 'city', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('city', Input::post('city', isset($sap_bp) ? $sap_bp->city : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'City')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Region', 'region', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			
			<div class="col-md-6 col-sm-6 col-xs-12">
				<?php 
						
						
						echo Form::select('region', Input::post('region', isset($sap_bp) ? $sap_bp->region : ''),
						Custom_UserUtility::regions(),			
						 array('class' => 'form-control')); 
					?>
			</div>
		</div>

<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		<button type="submit" class="btn btn-md btn-round btn-success"><?php echo $btn_text; ?></button>

		<?php echo Html::anchor('sap/bp', 'Back', array('class' => 'btn btn-md btn-round btn-warning', 'style' => 'text-decoration: none')); ?>		
	</div>
	
</div>
<?php echo Form::close(); ?>			
		</div>
	</div>
</div>






