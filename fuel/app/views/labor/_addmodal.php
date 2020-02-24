<div class="modal fade" id="addLaborModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  
  
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       		 <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Add A Skill</h4>
      </div>
      <div class="modal-body">
	      	<div id='errorlabor' style="display: none" class="alert alert-danger" >
	      		<strong>Error</strong>
	      		<p id="p4"></p>	
	      	</div>
	       <?php echo render('labor/_form');?>
      </div>
      <div class="modal-footer">
        	<button type="button" class="btn btn-primary" onclick="saveLabor()"><i class="glyphicon glyphicon-plus"></i> Save </button>
        	<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-trash icon-white"></i> Close</button>
       </div>
      
    </div>
  </div>
  </div>
<script>
	function saveLabor()
	{
		$("#labor_form").submit(); return;
		var skill_Name=document.getElementById('skillName').value;
		var skill_Rate=document.getElementById('skillRate').value;
		var skill_Rate_Time=document.getElementById('skillRateTime').value;
		var skill_Description=document.getElementById('skillDescription').value;
		var skill_Laborer_Id=document.getElementById('skillLaborerId').value;
		var skill_File_Name=document.getElementById('skillFileName').value;
		//var file_size=document.getElementById('skillFileName').files[0].size;
		//var in_file_size=parseInt(file_size);
		
		
		if(skill_Name=="")
		{
			document.getElementById('p4').innerHTML="Enter the skill name";
			document.getElementById("errorlabor").style.display='block';
			return;
		}
		if(skill_Rate=="")
		{
			document.getElementById('p4').innerHTML="Enter the rate";
			document.getElementById("errorlabor").style.display='block';
			return;
		}
		var rate=parseFloat(skill_Rate);
		if(isNaN(rate))
		{
			document.getElementById('p4').innerHTML="Rate should be a number.";
			document.getElementById("errorlabor").style.display='block';
			return;
		}
		if(skill_Rate_Time==0||skill_Rate_Time=='0')
		{
			document.getElementById('p4').innerHTML="Pick a rate interval";
			document.getElementById("errorlabor").style.display='block';
			return;
		}
		
		if(skill_Description=='')
		{
			document.getElementById('p4').innerHTML="Please enter a description";
			document.getElementById("errorlabor").style.display='block';
			return;
		}
		if(skill_File_Name=="")
		{
			document.getElementById('p4').innerHTML="Pick a file to upload";
			document.getElementById("errorlabor").style.display='block';
			return;
		}
		/*if(in_file_size>=2097152);
		{
			document.getElementById('p4').innerHTML="Pick a file less than 2MB in size";
			document.getElementById("errorlabor").style.display='block';
			return;
		}*/
		
		
		var id=parseInt(skill_Laborer_Id);
		var file = document.getElementById('skillFileName').files[0];
		
		
		var formData ="skill_name="+skill_Name+"&rate="+rate+"&rate_time="+skill_Rate_Time+"&description="+skill_Description
					+"&laborer_id="+id;  
		
		var ul="<?php echo  Uri::create('labor/create');?>" ;
		 /*---placing a blocker on top--*/
	    $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
	   	/*--end blocker--*/
		//var data= SaveCall(formData,ul);
		//document.getElementById("errorlabor").style.display='none';
		//$('#addLaborModal').modal('hide');
		
		uploadFile(file,skill_Name,rate,skill_Rate_Time,skill_Description,id);
		
		
	}
	//document.getElementById()
	function uploadFile(file,skillname,rate,skillratetime,skilldescrition,id)
	{
		
		var ul="<?php echo  Uri::create('labor/create');?>" ;
		var xhr=new XMLHttpRequest();
		var fd= new FormData();
		xhr.open("POST",ul,true);
		xhr.onreadystatechange=function(){
			if(xhr.readyState==4 && xhr.status==200)
			{
				console.log(xhr.responseText);
			}
		};
		fd.append('file',file);
		fd.append('skill_name',skillname);
		fd.append('rate',rate);
		fd.append('rate_time',skillratetime);
		fd.append('description',skilldescrition);
		fd.append('laborer_id',id);
		xhr.send(fd);
		$('#addLaborModal').modal('hide');
	}
	function editScheme(id, description, total, topid)
	{
		document.getElementById('e_id').value=id;
		document.getElementById('etop_id').value=topid;
		document.getElementById('escheme_des').value=description;
		document.getElementById('escheme_total').value=total;
		$('#editSchemeModal').modal();
	}
	function saveEditScheme()
	{
		var ed_id=$('#e_id').val();
		var topic_id=$('#etop_id').val();
		var description=$('#escheme_des').val();
		var assessment_total=$('#escheme_total').val();
		var id=parseInt(ed_id);
		var formData ="id"+id+"&topic_id="+topic_id+"&description="+description+"&assessment_total="+assessment_total;  
		var ul="<?php echo  Uri::create('scheme/edit/');?>"+id ;
		 /*---placing a blocker on top--*/
	    $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
	   	/*--end blocker--*/
		var data= MyCall(formData,ul);
		$('#editModal').modal('hide');
	}
	
	function saveScheme()
	{
		
		var topic_id=$('#top_id').val();
		var description=$('#scheme_des').val();
		var assessment_total=$('#scheme_total').val();
		var formData ="topic_id="+topic_id+"&description="+description+"&assessment_total="+assessment_total;  
		var ul="<?php echo  Uri::create('scheme/create');?>" ;
		 /*---placing a blocker on top--*/
	    $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
	   	/*--end blocker--*/
		var data= MyCall(formData,ul);
		$('#editModal').modal('hide');
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
	            	//location.reload();
		            return data;
	            },
				error: function() 
				{
			         return -1;
			    },
		  });	
	  }

</script>
