

<legend style="padding-bottom: 20px">Import permit application approval</legend>


<form class="form-horizontal" enctype="multipart/form-data" method="post" >
	<fieldset>
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Commodity', 'product_id', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-8">
				<?php echo Form::input('price', Input::post('price', isset($productoffer) ? $productoffer->price : ''), 
					array('class' => 'col-md-3 form-control')); ?>
			</div>
		</div>
		
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Quantity applied', 'product_id', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-8">
				<?php echo Form::input('price', Input::post('price', isset($productoffer) ? $productoffer->price : ''), 
					array('class' => 'col-md-3 form-control')); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Quantity approved', 'product_id', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-8">
				<?php echo Form::input('price', Input::post('price', isset($productoffer) ? $productoffer->price : ''), 
					array('class' => 'col-md-3 form-control')); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Product certification required', 'product_id', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-8">
				<?php echo Form::input('price', Input::post('price', isset($productoffer) ? $productoffer->price : ''), 
					array('class' => 'col-md-3 form-control')); ?>
			</div>
		</div>
		
		<div class="row-fluid">
			<div class="col-md-3">
				
			</div>
			<div class="col-md-8">
				<button class="btn btn-md btn-primary">Submit </button>
			</div>
		</div>
					
	</fieldset>
</form>