<div class="modal fade" id="editLaborModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       		 <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Editing Labor</h4>
      </div>
      <div class="modal-body">
	      <div id='erroredit' style="display: none" class="alert alert-danger" >
	      		<strong>Error</strong>	
	      	</div>
	      <?php echo render('labor/edit');?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="saveEditActivity()"><i class="glyphicon glyphicon-plus"></i> Save changes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-trash icon-white"></i> Close</button>
      </div>
      
    </div>
  </div>
</div>
