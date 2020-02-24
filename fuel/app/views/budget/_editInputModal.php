<div class="modal fade" id="editInputModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       		 <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Editing an Input</h4>
      </div>
      <div class="modal-body">
	      <div id='erroreditinput' style="display: none" class="alert alert-danger" >
	      		<strong>Error</strong>	
	      		<p id='p_edit_input'></p>	
	      	</div>
	      <?php echo render('input/edit');?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="saveEditInput()"><i class="glyphicon glyphicon-plus"></i> Save changes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-trash icon-white"></i> Close</button>
      </div>
      
    </div>
  </div>
</div>
<script>
	function cal()
	{
		var iunitprice=document.getElementById('eincostperunit').value;
		var iquantity=document.getElementById('einquantity').value;
		var tot=0;
		var unitprice=parseFloat(iunitprice).toFixed(2);
		var quantity=parseFloat(iquantity).toFixed(2);
		tot=(unitprice*quantity).toFixed(2);
		document.getElementById('eintotalcost').value=tot;
	}
	function saveEditInput()
	{
		var sactivtyid1=document.getElementById('einactivityid').value;
		var sactivtyid=parseInt(sactivtyid1);
		var sinputname=document.getElementById('einname').value;
		var sinputunitcost1=document.getElementById('eincostperunit').value;
		var sinputquantity1=document.getElementById('einquantity').value;
		var id1=document.getElementById('einid').value;
		var sinputunit=document.getElementById('einunits').value;
		var eid=parseInt(id1);
		
		if(sinputname=="")
		{
			document.getElementById('p_edit_input').innerHTML="Enter Input Name";
			document.getElementById("erroreditinput").style.display='block';
			return;
			
		}
		if(sinputunitcost1=="")
		{
			document.getElementById('p_edit_input').innerHTML="Enter Unit Cost";
			document.getElementById("erroreditinput").style.display='block';
			return;
		}
		var sinputunitcost=parseFloat(sinputunitcost1).toFixed(2);
		if(isNaN(sinputunitcost))
		{
			document.getElementById('p_edit_input').innerHTML="Unit Cost should be a number.";
			document.getElementById("erroreditinput").style.display='block';
			return;
		}
		if(sinputquantity1=="")
		{
			document.getElementById('p_edit_input').innerHTML="Enter Quatity";
			document.getElementById("erroreditinput").style.display='block';
			return;
		}
		var sinputquantity=parseFloat(sinputquantity1).toFixed(2);
		if(isNaN(sinputquantity))
		{
			document.getElementById('p_edit_input').innerHTML="Quantity should be a number.";
			document.getElementById("erroreditinput").style.display='block';
			return;
		}
		
		var sinputtotalcost1=sinputquantity*sinputunitcost;
		var sinputtotalcost=parseFloat(sinputtotalcost1).toFixed(2);
		var formData ="name="+sinputname+"&activity_id="+sactivtyid+"&cost_per_unit="+sinputunitcost+"&unit="+sinputunit
		+"&quantity="+sinputquantity+"&total_cost="+sinputtotalcost;
		
		var ul="<?php echo  Uri::create('input/edit/');?>"+eid ;
		 /*--hiding my modal--*/
		 $('#editInputModal').modal('hide');
		 /*---placing a blocker on top--*/
	     $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
	     /*--end blocker--*/
		  AjaxCallEditInput(formData,ul);
		
	}
	function AjaxCallEditInput(formData,ul)
	{   
			$.ajax({ url: ul,
            data: formData,
            type: 'post',
           success: function(data){
           	location.reload();
		            return data;
           },
		error: function() {
		        location.reload();
		      },
		    	});	
 	}; 
</script>
