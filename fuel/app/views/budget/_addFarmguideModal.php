<div class="modal fade" id="addFarmguideModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       		 <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Add a Farm Guide</h4>
      </div>
      <div class="modal-body">
	      	<div id='errorfarmguide' style="display: none" class="alert alert-danger" >
	      		<strong>Error</strong>
	      		<p id='p_add_farmguide'></p>	
	      	</div>
	      	
	       <?php echo render('farmguide/_form');?>
      </div>
      <div class="modal-footer">
        	<button type="button" class="btn btn-primary" onclick="saveFarmGuide()"><i class="glyphicon glyphicon-plus"></i> Save changes</button>
        	<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-trash icon-white"></i> Close</button>
       </div>
      
    </div>
  </div>
</div>
<script>
	function saveFarmGuide()
	{
		var factivity_id=document.getElementById('factivityid').value;
		var farmguide_description=document.getElementById('fdescription').value
		var activityName=document.getElementById('factivityname').value;
		if(farmguide_description=="")
		{
		document.getElementById('p_add_farmguide').innerHTML="Enter Farm guide description for "+activityName+" activity";
		document.getElementById("errorfarmguide").style.display='block';
		return;
		}
		
		var activity_id=parseInt(factivity_id);
		var formData ="activity_id="+activity_id+"&description="+farmguide_description;
			
			 var ul="<?php echo  Uri::create('farmguide/create');?>" ;
			 /*--hiding my modal--*/
			 $('#addFarmguideModal').modal('hide');
			 /*---placing a blocker on top--*/
	    	 $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
	    	 /*--end blocker--*/
			  AjaxCallAddFarmguide(formData,ul);
		
		
	}
	
	function AjaxCallAddFarmguide(formData,ul)
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
		        location.reload();
		      },
		    	});	
 	}; 
 	
</script>