<div class="modal fade" id="editActivityModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       		 <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Editing an Activity</h4>
      </div>
      <div class="modal-body">
	      <div id='erroreditactivity' style="display: none" class="alert alert-danger" >
	      		<strong>Error</strong>	
	      		<p id='p_edit_activity'></p>	
	      	</div>
	      <?php echo render('activity/edit');?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="saveEditActivity()"><i class="glyphicon glyphicon-plus"></i> Save changes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-trash icon-white"></i> Close</button>
      </div>
      
    </div>
  </div>
</div>
<script>
	
	function saveEditActivity()
	{
		
		var sactivityname=document.getElementById('eactivityname').value;
		var sbudgetid=document.getElementById('ebudgetid').value;
		var s_id=document.getElementById('eactivityid').value;
			
		
		if(sactivityname=="")
		{
			document.getElementById('p_edit_activity').innerHTML="Enter Activity Name";
			document.getElementById("erroreditactivity").style.display='block';
			return;
		}
		
		var budget_id=parseInt(sbudgetid);
		var ssid=parseInt(s_id);
		var formData ="budget_id="+budget_id+"&name="+sactivityname;
		var ul="<?php echo  Uri::create('activity/edit/');?>"+ssid ;
		
			 /*--hiding my modal--*/
			 $('#editActivityModal').modal('hide');
			 /*---placing a blocker on top--*/
	    	 $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
	    	 /*--end blocker--*/
			  AjaxCallEditActivity(formData,ul);
		}
	function AjaxCallEditActivity(formData,ul)
	{   
			$.ajax({ url: ul,
            data: formData,
            type: 'post',
           success: function(data){
           	location.reload();
		            return data;
           },
		error: function() {
		         alert('error');
		      },
		    	});	
 	}; 
		
	
</script>
