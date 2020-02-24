<div class="modal fade" id="editLogisticModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       		 <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Editing Logistic</h4>
      </div>
      <div class="modal-body">
	      <div id='erroredit' style="display: none" class="alert alert-danger" >
	      		<strong>Error</strong>	
	      	</div>
	      <?php echo render('logistic/edit');?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="saveEditLogistic()"><i class="glyphicon glyphicon-plus"></i> Save changes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-trash icon-white"></i> Close</button>
      </div>
      
    </div>
  </div>
</div>
<script>
	
	function saveEditLogistic()
	{
		
		var ed_id=$('#edit_equip_id').val();
		var equip_name=$('#edit_equip_name').val();
		var equip_capacity=$('#edit_equip_capacity').val();
		var equip_rate=$('#edit_equip_rate').val();
		var equip_description=$('#edit_equip_description').val();
		var supplier_id=$('#equip_supplier_id').val();
		if(equip_name=="")
		{
			document.getElementById('p2').innerHTML="Enter the equipment name";
			document.getElementById("empty").style.display='block';
			return;
		}
		if(equip_capacity=='')
		{
			document.getElementById('p2').innerHTML="Enter the capacity of the equipment";
			document.getElementById("empty").style.display='block';
			return;
		}
		var capacity=parseFloat(equip_capacity);
		if(isNaN(capacity))
		{
			document.getElementById('p2').innerHTML="Capacity should be a number.";
			document.getElementById("empty").style.display='block';
			return;
		}
		if(equip_rate=='')
		{
			document.getElementById('p2').innerHTML="Enter the rate.";
			document.getElementById("empty").style.display='block';
			return;
		}
		var rate=parseFloat(equip_rate);
		if(isNaN(rate))
		{
			document.getElementById('p2').innerHTML="Rate should be a number.";
			document.getElementById("empty").style.display='block';
			return;
		}
		if(equip_description=='')
		{
			document.getElementById('p2').innerHTML="Enter the description.";
			document.getElementById("empty").style.display='block';
			return;
		}
		var id=parseInt(ed_id);
		var supplier=parseInt(supplier_id);
		
		var formData ="id"+id+"&equipmentname="+equip_name+"&capacity="+equip_capacity+"&rateperhour="
		+rate+"&description="+equip_description+"&supplier_id="+supplier;  
		var ul="<?php echo  Uri::create('logistic/edit/');?>"+id ;
		 /*---placing a blocker on top--*/
	    $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
	   	/*--end blocker--*/
		var data= EditLogisticCall(formData,ul);
		$('#editLogisticModal').modal('hide');
		document.getElementById('empty').style.display='none';
	}
	function EditLogisticCall(formData,ul)
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