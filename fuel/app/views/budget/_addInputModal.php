<div class="modal fade" id="addInputModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       		 <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Add an Input</h4>
      </div>
      <div class="modal-body">
	      	<div id='erroraddinput' style="display: none" class="alert alert-danger" >
	      		<strong>Error</strong>	
	      		<p id='p_add_input'></p>	
	      	</div>
	       <?php echo render('input/_form');?>
      </div>
      <div class="modal-footer">
        	<button type="button" class="btn btn-primary" onclick="saveInput()">
        		<i class="glyphicon glyphicon-plus"></i> Save changes
        	</button>
        	<button type="button" class="btn btn-danger" data-dismiss="modal">
        		<i class="glyphicon glyphicon-trash icon-white"></i> Close
        	</button>
       </div>
      
    </div>
  </div>
</div>
<script>
	function saveInput()
	{
		var sactivtyid1=document.getElementById('inactivityid').value;
		var sactivtyid=parseInt(sactivtyid1);
		var sinputname=document.getElementById('inname').value;
		var sinputunitcost1=document.getElementById('incostperunit').value;
		var sinputquantity1=document.getElementById('inquantity').value;
		
		
		if(sinputname=="")
		{
			document.getElementById('p_add_input').innerHTML="Enter Input Name";
			document.getElementById("erroraddinput").style.display='block';
			return;
			
		}
		if(sinputunitcost1=="")
		{
			document.getElementById('p_add_input').innerHTML="Enter Unit Cost";
			document.getElementById("erroraddinput").style.display='block';
			return;
		}
		var sinputunitcost=parseFloat(sinputunitcost1).toFixed(2);
		if(isNaN(sinputunitcost))
		{
			document.getElementById('p_add_input').innerHTML="Unit Cost should be a number.";
			document.getElementById("erroraddinput").style.display='block';
			return;
		}
		if(sinputquantity1=="")
		{
			document.getElementById('p_add_input').innerHTML="Enter Quatity";
			document.getElementById("erroraddinput").style.display='block';
			return;
		}
		var sinputquantity=parseFloat(sinputquantity1).toFixed(2);
		if(isNaN(sinputquantity))
		{
			document.getElementById('p_add_input').innerHTML="Quantity should be a number.";
			document.getElementById("erroraddinput").style.display='block';
			return;
		}
		var sinputtotalcost1=sinputquantity*sinputunitcost;
		var sunits= $( "#inunits option:selected" ).text();
		var sinputtotalcost=parseFloat(sinputtotalcost1).toFixed(2);
		var formData ="name="+sinputname+"&activity_id="+sactivtyid+"&cost_per_unit="+sinputunitcost+"&unit="+sunits
		+"&quantity="+sinputquantity+"&total_cost="+sinputtotalcost;
		var ul="<?php echo  Uri::create('input/create');?>" ;
		 /*--hiding my modal--*/
		 $('#addInputModal').modal('hide');
		 /*---placing a blocker on top--*/
	     $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
	     /*--end blocker--*/
		  AjaxCallSaveInput(formData,ul);
		
		
	}
	
	function AjaxCallSaveInput(formData,ul)
	{   
    	$.ajax({ 
	    		url: ul,
	            data: formData,
	            type: 'post',
	            success: function(data)
	           	{
           			location.reload();
		            return data;
           		},
				error: function() 
				{
		         	location.reload();
		      	},
		    });	
 	}; 
	
</script>