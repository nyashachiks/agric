<h2>User activation</h2>
<legend></legend>
	
<?php if ($users): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>UserID</th>
			<th>Date signed up</th>
			<th>User full name</th>
			<th>Phone number</th>
			<th>Email</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $item): ?>	
		<tr>
			<td><?php echo $item->id;?> </td>
			<td><?php echo date("Y-m-d @ H:i", $item->created_at); ?> </td>
			<td><?php echo Model_User::get_full_name($item->id);?> </td>
			<td><?php echo $item->username;?> </td>
			<td><?php echo $item->email; ?></td>
			<td>
				<div class="btn-toolbar">
					<button id="<?php echo $item->id; ?>" class="btn btn-sm btn-success btn-round libs-btn-activate">Activate</button>
				</div>

			</td>
		</tr>
		<?php endforeach; ?>	
	</tbody>
</table>

		<?php else: ?>
		<div class="alert alert-danger">
			<p>We do not have inactive users.</p>
		</div>

		<?php endif; ?>
		
<!-- MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="libs_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Input receipt number</h4>
      </div>
      <div class="modal-body">
       <form class="form form-horizontal" id="libs_form" method="post" action="<?php echo Uri::create('user/activate'); ?>">
	       	<div class="form-group">
			    <label for="recno" class="col-sm-4 control-label">Receipt number:</label>
			    <div class="col-sm-8">
			      <input name="recno" type="email" class="form-control" id="recno" placeholder="">
				  
				  <!-- value will be set via JS -->
			      <input id="user_id" type="hidden" name="user_id" value="" />
			    </div>
		  	</div>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="libs_form_submit">Activate</button>
      </div>
    </div>
  </div>
</div>
<!-- //MODAL -->		

<script>
	$(document).ready(function(){
		
		$(".libs-btn-activate").click(function(){
			var targetId = $(this).attr('id');
			console.log("id = " + targetId);
			
			//pop out an input form. bootbox
			$("#libs_modal").modal();
			$("#user_id").val(targetId);
			
		});
		
		$("#libs_form_submit").click(function(){
			$("#libs_form").submit();
		});
	});
</script>