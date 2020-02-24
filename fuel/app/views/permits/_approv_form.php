<legend style="padding-bottom: 20px"><?php echo $form_label; ?></legend>

<form class="form-horizontal" enctype="multipart/form-data" method="post" >
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Commodity', '', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-8">
				<?php echo Form::input('commodity', Input::post('commodity', isset($permit) ? $permit->commodity : ''), 
					array('class' => 'col-md-3 form-control')); ?>
			</div>
		</div>
		
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Quantity applied', '', array('class'=>'control-label')); ?>
			</div>
				<div class="col-md-9">
				<table>
					<tbody>
						<tr>
							<td>
								
						<?php echo Form::input('qty_applied', Input::post('qty_applied', isset($permit) ? $permit->qty_applied : ''), 
					array('class' => 'form-control')); 
				?>
							</td>
							<td>
								<?php 
				$arr=array(0 => '--select unit--');
				$product = Model_Measurement::query()->order_by('unit')->get();
				foreach($product as $item)
					$arr[$item->id]=$item->unit;
				echo Form::select('measurement_id', Input::post('measurement_id', isset($permit) ? $permit->measurement_id : ''),
				$arr,			
				 array('class' => 'form-control btn-block')); 
			?>
							</td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
			
		
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Product certification required', 'product_id', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-8">
				<?php echo Form::input('certification', Input::post('certification', isset($permit) ? $permit->certification : ''), 
					array('class' => 'col-md-3 form-control')); ?>
			</div>
		</div>
		
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Attach a support letter', 'doc', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<input type="file" name="doc" />
			</div>
		</div>
		
		<div class="row-fluid">
			<div class="col-md-3">
				
			</div>
			<div class="col-md-8">
				<button class="btn btn-md btn-primary"><?php echo $btn_label; ?></button>
			</div>
		</div>
</form>