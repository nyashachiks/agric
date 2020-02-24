<script>

	var click_counter = 0;
	
	function quantities()
	{
		
		var units=document.getElementById('units').value;
		var maxi=document.getElementById('quant').value;
		var unit_price=document.getElementById('price').value;
		var total_amount=units*unit_price;
		
		document.getElementById('total').value=total_amount;
		var d_units=Number(units);
		var d_maxi=Number(maxi);
		
		
		if(d_units>d_maxi)
		{
			
			var a =document.getElementById('myerror');
			a.innerHTML='Your total quantity is more than the required amount';
			a.style.display='block';
			document.getElementById('mysubmit').disabled=true;
		}
		else if(isNaN(d_units))
		{
			var a =document.getElementById('myerror');
			a.innerHTML='The quantity entered is not numerical';
			a.style.display='block';
			document.getElementById('mysubmit').disabled=true;
		}
		else if(total_amount==0)
		{
			document.getElementById('mysubmit').disabled=true;
		}
		else{
			var a =document.getElementById('myerror');
			a.style.display='none';
			document.getElementById('mysubmit').disabled=false;
		}
		click_counter++;
	}
	
	


//clear form inputs whenever we change the selection
	function clearflds()
	{
		//recalculate if ! first click
		if(click_counter > 0){
			quantities(); 
		}
	}
</script>

<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Buy Raw Material</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<?php echo render('rawmaterial/offer/bidview');?>
		<?php echo Form::open(array("class"=>"form-horizontal")); ?>

		<?php $rm_offer_id =$rawmaterial_offer->id;
			echo Form::hidden('rm_offer_id', Input::post('rm_offer_id', $rm_offer_id)); 
			echo Form::hidden('quantity',$rawmaterial_offer->quantity, array('id'=>'quant'));
			echo Form::hidden('price',$rawmaterial_offer->price, array('id'=>'price'));
			echo Form::hidden('quantity_left',$rawmaterial_offer->quantity_left, array('id'=>'quantity_left'));
		?>
		
		
		<?php list(, $userid) = Auth::get_user_id(); 
			echo Form::hidden('buyer_id', Input::post('buyer_id', $userid)); 
		?>
		<div class="alert alert-danger col-md-10" id="myerror" style="display:none"></div>
	

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Number of <?php echo $rawmaterial_offer->raw_material->measurement->unit;?>s</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::input('unit_quantity', Input::post('unit_quantity', isset($rm_sale) ? $rm_sale->quantity : ''), 
						array('id'=>'units', 'class' => 'form-control', 'placeholder'=>'0', 'onkeyup'=>'quantities()')); ?>
	</div>
</div>



<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Total amount in $</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::input('total', Input::post('total', isset($rm_sale) ? $rm_sale->total : ''), 
							array('id'=>'total', 'class' => 'form-control', 'placeholder'=>'0', 'readOnly'=>'readOnly')); ?>
	</div>
</div>

			
		<?php 
			
				echo Form::hidden('price',Input::post('price', $rawmaterial_offer->price) );
				$bidbutton='Buy';
			
		?>
		
		<div class="ln_solid"></div>
		<div class="row-fluid">
			<button type="submit" id="mysubmit" class="btn btn-primary btn-md btn-round" disabled="disabled"><?=$bidbutton?></button>
			<a href="<?php echo Uri::create('rawmaterial/offer/index'); ?>" class="libs-btn-link">
				<button type="button" class="btn btn-warning btn-md btn-round">Cancel</button>
			</a>
		</div>
		
	</fieldset>
<?php echo Form::close(); ?>
		
	</div>
</div>
</div>

