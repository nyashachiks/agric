<script>

	var click_counter = 0;
	
	function quantities()
	{
		var measure =document.getElementById('measure').value;
		var units=document.getElementById('units').value;
		var total_units=measure*units;
		var mini=document.getElementById('min_quant').value;
		var maxi=document.getElementById('max_quant').value;
		var unit_price=document.getElementById('unitprice').value;
		var total_amount=total_units*unit_price;
		document.getElementById('totalquantity').value=total_units;
		document.getElementById('totalamount').value=total_amount;
		
		// && available qty > moq: else we just allow the qty to be bought
		var avail_qty =  maxi;
		var moq =  mini;
		
		if((total_units < mini) && (avail_qty > moq))
		{
			var a =document.getElementById('myerror');
			a.innerHTML='Your total quantity is less than the required amount';
			a.style.display='block';
			document.getElementById('mysubmit').disabled=true;
		}
		else if(total_units>maxi)
		{
			var a =document.getElementById('myerror');
			a.innerHTML='Your total quantity is more than the required amount';
			a.style.display='block';
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
		<h2>Buy product</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<?php echo render('productoffer/bidview');?>
		<?php echo Form::open(array("class"=>"form-horizontal")); ?>

<?php $productoffer_id =$productoffer->id;
			echo Form::hidden('productoffer_id', Input::post('productoffer_id', $productoffer_id)); 
			echo Form::hidden('min_quantity',$productoffer->min_quantity, array('id'=>'min_quant'));
			echo Form::hidden('max_quantity',$productoffer->quantity_left, array('id'=>'max_quant'));
			echo Form::hidden('unitprice',$productoffer->price, array('id'=>'unitprice'));
		?>
		
		
		<?php list(, $userid) = Auth::get_user_id(); 
			echo Form::hidden('buyer_id', Input::post('buyer_id', $userid)); 
		?>
		<div class="alert alert-danger col-md-10" id="myerror" style="display:none"></div>
	
		
		<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Unit of measurement</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php 
						$product_id = $productoffer->product->id; 
						
						/*
						$conversions = array(0=>'--Please Select--');
						$conv = Model_Conversion::find('all');
						foreach($conv as $item)
						{
							$conversions[$item->quantity]=$item->name;
							//$arr2[]=$item->quantity;
						}	
						*/
						
						
						$conversions = Model_Conversion::get_select_options($product_id,'-- Please select --');
						
						echo Form::select('market_id', Input::post('market_id', isset($productoffer) ? $productoffer->market_id : ''),$conversions, array('class' => 'form-control', 'id'=>'measure','onchange' => 'clearflds()'));
							 
					?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Number of units</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::input('unit_quantity', Input::post('unit_quantity', isset($bid) ? $bid->quantity : ''), 
						array('id'=>'units', 'class' => 'form-control', 'placeholder'=>'0', 'onkeyup'=>'quantities()')); ?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Total units</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::input('quantity', Input::post('quantity', isset($bid) ? $bid->quantity : ''), 
							array('id'=>'totalquantity', 'class' => 'form-control', 'placeholder'=>'0', 'readOnly'=>'readOnly')); ?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Total amount in $</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::input('total', Input::post('total', isset($bid) ? $bid->total : ''), 
							array('id'=>'totalamount', 'class' => 'form-control', 'placeholder'=>'0', 'readOnly'=>'readOnly')); ?>
	</div>
</div>




		
	
	
	
		
		
		
		
		<?php 
		if(isset($bid))
		{
			echo Form::hidden('type', Input::post('type', $bid->type)); 
			
		}
		else
		{
			echo Form::hidden('type', Input::post('type', Session::get('type'))); 
			
		}
		?>
		
		<?php 
			if(Session::get('type')=='bid')
			{
				
			echo '<div class="row-fluid">';
			echo '<div class="col-md-2">';
			echo Form::label('Price', 'price', array('class'=>'control-label')); 
			echo '</div>';
			echo '<div class="col-md-10">';
			echo Form::input('price', Input::post('price', isset($bid) ? $bid->price : ''), 
					array('class' => 'col-md-4 form-control', 'placeholder'=>'Price')); 
			echo '</div>';
			echo '</div>';
			$bidbutton='Bid';
			}
			else
			{
				echo Form::hidden('price',Input::post('price', $productoffer->price) );
				$bidbutton='Buy';
			}
		?>
		
		<div class="ln_solid"></div>
		<div class="row-fluid">
			<button type="submit" id="mysubmit" class="btn btn-primary btn-md btn-round" disabled="disabled"><?=$bidbutton?></button>
			<a href="<?php echo Uri::create('productoffer/index'); ?>" class="libs-btn-link">
				<button type="button" class="btn btn-warning btn-md btn-round">Cancel</button>
			</a>
		</div>
		
	</fieldset>
<?php echo Form::close(); ?>
		
	</div>
</div>
</div>

