<div class="modal fade" id="editFarmguideModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       		 <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Editing an Activity</h4>
      </div>
      <div class="modal-body">
	      <div id='erroreditfarmguide' style="display: none" class="alert alert-danger" >
	      		<strong>Error</strong>	
	      		<p id='p_edit_farmguide'></p>	
	      	</div>
	      <?php echo render('farmguide/edit');?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="saveEditFarmguide()"><i class="glyphicon glyphicon-plus"></i> Save changes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-trash icon-white"></i> Close</button>
      </div>
      
    </div>
  </div>
</div>
<script>
	
	function saveEditFarmguide()
	{
		var fid=document.getElementById('efid').value;
		var factivityid=document.getElementById('efactivityid').value;
		var factdes=document.getElementById('efdescription').value;
		
			
		
		if(factdes=="")
		{
			document.getElementById('p_edit_farmguide').innerHTML="Enter Activity Name";
			document.getElementById("erroreditfarmguide").style.display='block';
			return;
		}
		
		var id=parseInt(fid);
		var activityid=parseInt(factivityid);
		var formData ="activity_id="+activityid+"&description="+factdes;
		var ul="<?php echo  Uri::create('farmguide/edit/');?>"+id ;
		
			 /*--hiding my modal--*/
			 $('#editFarmguideModal').modal('hide');
			 /*---placing a blocker on top--*/
	    	 $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
	    	 /*--end blocker--*/
			  AjaxCallEditFarmguide(formData,ul);
		}
	function AjaxCallEditFarmguide(formData,ul)
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
