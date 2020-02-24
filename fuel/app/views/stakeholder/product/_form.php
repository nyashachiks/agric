<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2><?php echo $form_label; ?></h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br/>
			
			<?php echo Form::open(array("class"=>"form-horizontal","enctype"=> "multipart/form-data" )); ?>
			<div class="form-group">
			
			<?php echo Form::label('Trading Name', 'tradingname', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">								
<input name='tradingname' type="search" 
list="languages" placeholder="Trading Name" class='col-md-6 col-sm-6 col-xs-12 form-control'>

<datalist id="languages">
<?php
list(, $userid) = Auth::get_user_id();
$tradingNames=Model_Stakeholder_Tradingdetail::query()
->where('user_id',$userid)->get();
foreach($tradingNames as $item):
?>
  <option value="<?php echo $item->name;?>" />
 <?php endforeach;?>
</datalist>
			</div>
		</div>		
			<div class="form-group">
			
			<?php echo Form::label('Product Name', 'name', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('name', Input::post('name', isset($stakeholder_Product) ? $stakeholder_Product->name : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Name')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Description', 'description', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::textarea('description', Input::post('description', isset($stakeholder_Product) ? $stakeholder_Product->description : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'rows' => 4, 'placeholder'=>'Description')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Pic', 'pic', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
			<?php echo Form::file('file', array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Pic')); ?>
			
							
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Additional details', 'additional_details', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::textarea('additional_details', Input::post('additional_details', isset($stakeholder_Product) ? $stakeholder_Product->additional_details : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'rows' => 4, 'placeholder'=>'Additional details')); ?>
			</div>
		</div>

<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		<button type="submit" class="btn btn-md btn-round btn-success"><?php echo $btn_text; ?></button>

		<?php echo Html::anchor('stakeholder/product', 'Back', array('class' => 'btn btn-md btn-round btn-warning', 'style' => 'text-decoration: none')); ?>		
	</div>
	
</div>
<?php echo Form::close(); ?>			
		</div>
	</div>
</div>






