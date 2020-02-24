<div class="modal fade" id="viewLogisticModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       		 <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Logistics</h4>
      </div>
      <div class="modal-body" style="text-align: left;">
	      
	       <?php echo render('logistic/view');?>
      </div>
      <div class="modal-footer">
     
       <!--button type="button" class="btn btn-primary" onclick="openEditLogisticModal(document.getElementById('view_edit_id').value, 
        	document.getElementById('view_edit_equip_name').value, document.getElementById('view_edit_equip_capacity').value, 
        	document.getElementById('view_edit_equip_rate').value, document.getElementById('view_edit_equip_supplier_id').value,
        	document.getElementById('view_edit_equip_description').value)">
        	<i class="glyphicon glyphicon-wrench icon-white"></i> 
        			Edit
       </button-->
       <button type="button" class="btn btn-danger" data-dismiss="modal">
        		<i class="glyphicon glyphicon-trash icon-white"></i>
        		 Close
        </button>
       </div>
      
    </div>
  </div>
</div>
<script>
	function openEditLogisticModal(id,equipmentname,capacity,rateperhour,supplierid,description)
{	
	document.getElementById('edit_equip_name').value=equipmentname;
	document.getElementById('edit_equip_capacity').value=capacity;
	document.getElementById('edit_equip_rate').value=rateperhour;
	document.getElementById('edit_equip_description').value=description;
	document.getElementById('equip_supplier_id').value=supplierid;
	document.getElementById('edit_equip_id').value=id;
	
	$('#viewLogisticModal').modal('hide');
	$('#editLogisticModal').modal();
}
</script>