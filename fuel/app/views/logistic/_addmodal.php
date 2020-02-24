<div class="modal fade" id="addLogisticModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       		 <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Add Logistic</h4>
      </div>
      <div class="modal-body">
	      	<div id='errorlogistic' style="display: none" class="alert alert-danger" >
	      		<strong>Error</strong>	
	      		<p id='p1'></p>
	      	</div>
	       <?php echo render('logistic/_form');?>
      </div>
      <div class="modal-footer">
        	<button type="button" class="btn btn-primary" onclick="saveLogistic()"><i class="glyphicon glyphicon-plus"></i> Save </button>
        	<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-trash icon-white"></i> Close</button>
       </div>
      
    </div>
  </div>
</div>
<script>
var formData='';
	function saveLogistic()
	{
		
		var equiname=document.getElementById('equip_name').value;
		var equipcapacity=document.getElementById('equip_capacity').value;
		var equiprate=document.getElementById('equip_rate').value;
		var equipdescription=document.getElementById('equip_description').value;
		var equip_supplier_id=document.getElementById('equip_supplier_id').value;
		
		
		if(equiname=="")
		{
			document.getElementById('p1').innerHTML="Enter the equipment name";
			document.getElementById("errorlogistic").style.display='block';
			return;
		}
		if(equipcapacity=='')
		{
			document.getElementById('p1').innerHTML="Enter the capacity of the equipment";
			document.getElementById("errorlogistic").style.display='block';
			return;
		}
		var capacity=parseFloat(equipcapacity);
		if(isNaN(capacity))
		{
			document.getElementById('p1').innerHTML="Capacity should be a number.";
			document.getElementById("errorlogistic").style.display='block';
			return;
		}
		if(equiprate=='')
		{
			document.getElementById('p1').innerHTML="Enter the rate.";
			document.getElementById("errorlogistic").style.display='block';
			return;
		}
		var rate=parseFloat(equiprate);
		if(isNaN(rate))
		{
			document.getElementById('p1').innerHTML="Rate should be a number.";
			document.getElementById("errorlogistic").style.display='block';
			return;
		}
		if(equipdescription=='')
		{
			document.getElementById('p1').innerHTML="Enter the description.";
			document.getElementById("errorlogistic").style.display='block';
			return;
		}
		var id=parseInt(equip_supplier_id);
		
		
		formData ="equipmentname="+equiname+"&capacity="+capacity+"&rateperhour="+rate+"&description="+equipdescription
					+"&supplier_id="+id;  
		var ul="<?php echo  Uri::create('logistic/create');?>" ;
		 /*---placing a blocker on top--*/
	    $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
	   	/*--end blocker--*/
		var data= SaveCall(formData,ul);
		$('#addLogisticModal').modal('hide');
		document.getElementById("errorlogistic").style.display='none';
		
		
	}
	
	function SaveCall(formData,ul)
	   {  
		  $.ajax
		  ({ 
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
			         return -1;
			    },
		  });	
	  }

</script>
