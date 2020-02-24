<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Search for a Disease</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<form method="post" class="form-horizontal" action="<?php echo Uri::create('disease/searchResults'); ?>">
		
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12">Product</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<?php 
					$arr=array(0=>'--Please Select A Product--');
					$product = Model_Product::query()->order_by('name')->get();
					foreach($product as $item)
						$arr[$item->id]=$item->name;
					echo Form::select('product_id', Input::post('product_id', isset($disease) ? $disease->product_id : ''),
					$arr,			
					 array('class' => 'form-control', 'onChange'=>'getSymptoms(this.value)')); 
				?>
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12">Symptom 1</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<?php
					
						
					
						$arr=array(0=>'--Please Select A Symptom--');
						
						echo Form::select('symptom_id1', Input::post('symptom_id1', isset($symptom) ? $symptom->name: ''),
						$arr,			
						 array('id'=>'symptom1','class' => 'form-control', 'disabled'=>'disabled')); 
					
					 ?>
				
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12">Symptom 2(Optional)</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<?php
					
						
					
						$arr=array(0=>'--Please Select Another Symptom--');
						
						echo Form::select('symptom_id2', Input::post('symptom_id2', isset($symptom) ? $symptom->name: ''),
						$arr,			
						 array('id'=>'symptom2','class' => 'form-control', 'disabled'=>'disabled')); 
					
					 ?>
			</div>
		</div>
		
		<div class="ln_bold"></div>
		<div class="col-md-9 col-md-offset-3">
			<button name="search" type="submit" class="btn btn-success btn-round">Search</button>
			<a href="<?php echo Uri::create(); ?>" style="text-decoration: none">
				<button  type="button" class="btn btn-warning btn-round">Cancel</button>
			</a>
		</div>
	</form>
		
	</div>
</div>
</div>
	
<script>
  function getSymptoms(product_id)
	{
		
		var myul="symptom/byid/"+product_id;
		var formData ="product_id="+product_id;  
		var ul="<?php echo  Uri::create('"+myul+"');?>" ;
		
		
		$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
		/*--end blocker--*/
		var data= AjaxCallSymptoms(formData,ul);
		
	}
	function AjaxCallSymptoms(formData,ul)
	   {  
		  $.ajax
		  ({ 
		  		url: ul,
	            data: formData,
	            type: 'post',
	            dataType: "json",
	            success: function(data)
	            {
	            	
	            	var sub = document.getElementById('symptom1');
	            	var i;
				    for(i=sub.options.length-1;i>=0;i--)
				    {
				        sub.remove(i);
				    }
				    var opt = document.createElement('option');
		            opt.value = 0;
		            opt.innerHTML = '--Please Select A Symptom--';
		            sub.appendChild(opt);
				    
	            	$.each( data, function( key, value ) {
	            	var opt = document.createElement('option');
		            opt.value = key;
		            opt.innerHTML = value;
		            sub.appendChild(opt);
  						
					});
	            
	            	sub.disabled = false;	
	            	sub = document.getElementById('symptom2');
	            	var i;
				    for(i=sub.options.length-1;i>=0;i--)
				    {
				        sub.remove(i);
				    }
				    var opt = document.createElement('option');
		            opt.value = 0;
		            opt.innerHTML = '--Please Select  Another Symptom--';
		            sub.appendChild(opt);
				    
	            	$.each( data, function( key, value ) {
	            	var opt = document.createElement('option');
		            opt.value = key;
		            opt.innerHTML = value;
		            sub.appendChild(opt);
  						
					});
	            
	            	sub.disabled = false;   			
		             	return data;
	            },
				error: function() 
				{
			             return -1;
			    },
		  });	
	  }
	  
	  function getDisease()
		{
			var disease_id1=document.getElementById('symptom1').value;
			var disease_id2=document.getElementById('symptom2').value;
			alert(disease_id1+" "+ disease_id2);
			
			var myul="disease/searchResults";
			var formData ="disease_id1="+disease_id1+"&disease_id2="+disease_id2;  
			var ul="<?php echo  Uri::create('"+myul+"');?>" ;
			
			
			$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
			/*--end blocker--*/
			var data= AjaxCallDiseases(formData,ul);
			
		}
	function AjaxCallDiseases(formData,ul)
	   {  
		  $.ajax
		  ({ 
		  		url: ul,
	            data: formData,
	            type: 'post',
	            dataType: "json",
	            success: function(data)
	            {
	            		return data;
	            },
				error: function() 
				{
			             return -1;
			    },
		  });	
	  }


  </script>