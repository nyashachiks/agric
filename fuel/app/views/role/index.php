
<?php echo Asset::js('dashboard/libs/jquery/jquery-ui.js');?>

<p>
<a href="<?php echo Uri::base().'role\\create';?>" class="btn btn-primary">
<span class="glyphicon glyphicon-plus-sign"></span> Add Post</a>
</p>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>
				Post
			</th>
			<th>
				Permissions
			</th>
			<th>&nbsp;</th>
		</tr>
		
	</thead>
	<tbody>
	<?php foreach($role as $item):
		 //Debug::dump($item);?>
		 <tr>
		 	<td>
		 		<?php echo $item->name;?>
		 	</td>
		 	<td>
		 		<?php 
		 		$str='';
				$index='';
				$perm=$item->permissions;
		 		
		 			foreach($perm as $p)
		 			{
						$str .= $p->description. ' | ';
					 	//Custom_Permissionutility::getControllerList()[$p->permission].' , ';	
						$index .=$p->id.',';
					}
				
		 		?>
		 		<div id="div<?php echo $item->id;?>">
			<?php echo Str::sub($str,0,strlen($str)-2)  ;?>
		</div>
		<div id="divhidden<?php echo $item->id;?>" hidden="true">
			<?php echo $index;?>
		</div>
		 	</td>
		 	<td>
		<div class="btn-toolbar">
					<div class="btn-group">
		<a href="<?php 
		$th= str_replace(' ','_',$item->name);
		echo Uri::base();?>structure/selectorg/<?php echo $item->id.'/'.$th;?>" 
		class="btn btn-default btn-sm">
		<span class="badge">
		<?php 
		echo count($item->groups);?>
		</span>
		Assign to Organisation</a>
			<button class="btn btn-success btn-sm" onclick="getModal(<?php echo $item->id;?>)">Add Permissions</button>
			<a href="<?php echo Uri::base().'Role/deleterolepermission/'. $item->id;?>" class="btn btn-danger btn-sm">Delete Permissions</a>
			</div>
			</div>
		</td>
		 </tr>
		
		<?php endforeach;?>
	</tbody>
</table>
<!-- Modal -->
  <?php echo render('role/_addmodal'); ?>
  <script>
  function getModal(id)
  {
  	$('input[name="group"]').val(id)
  	$('#myModal').modal();
  }
  function AjaxCall(formData,ul,trans){  
    	$.ajax({ url: ul,
            data: formData,
            type: 'post',
            //dataType: "json",
           success: function(data){
           	$('#div'+trans).html(data);
           	return data;
           },
		error: function() {
		         return -1;
		      },
		    	});	
 }; 

  function saveRole()
{
	if(true)
		{
			if (true) {
				 var formData ="group="+$('input[name="group"]').val()+"&role="+$('select[name="role"]').val();  
			 var ul="<?php echo  Uri::create('role/createrolepermission');?>" ;
			 /*--hiding my modal--*/
			 $('#myModal').modal('hide');
			 /*---placing a blocker on top--*/
	    	$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
	    	/*--end blocker--*/
			var data= AjaxCall(formData,ul,$('input[name="group"]').val());
				}
		    else {
		    // Do nothing!
			}
			return;
		}
	else
		{
			$('#myModal').modal();
		}
}
  </script>