<div class="modal fade" id="addActivityModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       		 <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Add an Activity</h4>
      </div>
      <div class="modal-body">
	      	<div id='erroractivity' style="display: none" class="alert alert-danger" >
	      		<strong>Error</strong>
	      		<p id='p_add_activity'></p>	
	      	</div>
	      	
	       <?php echo render('activity/_form');?>
      </div>
      <div class="modal-footer">
        	<button type="button" class="btn btn-primary" onclick="saveActivity()"><i class="glyphicon glyphicon-plus"></i> Save changes</button>
        	<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-trash icon-white"></i> Close</button>
       </div>
      
    </div>
  </div>
</div>
<script>
	function saveActivity()
	{
		var sactivityname=document.getElementById('activityname').value;
		var sbudgetid=document.getElementById('budgetid').value
		if(sactivityname=="")
		{
			document.getElementById('p_add_activity').innerHTML="Enter Activity Name";
			document.getElementById("erroractivity").style.display='block';
			return;
		}
		
		var budget_id=parseInt(sbudgetid);
		
		var formData ="budget_id="+budget_id+"&name="+sactivityname;
			
			 var ul="<?php echo  Uri::create('activity/create');?>" ;
			 /*--hiding my modal--*/
			 $('#addActivityModal').modal('hide');
			 /*---placing a blocker on top--*/
	    	 $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
	    	 /*--end blocker--*/
			  AjaxCallAddActivity(formData,ul);
		
		
	}
	
	function AjaxCallAddActivity(formData,ul)
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
		error: function() {
		         alert('error');
		      },
		    	});	
 	}; 
 	
</script>