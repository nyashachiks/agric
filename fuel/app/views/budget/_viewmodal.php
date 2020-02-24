<div class="modal fade" id="editBudgetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       		 <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Topic</h4>
      </div>
      <div class="modal-body" style="text-align: left;">
	      
	       <?php echo render('edit/view');?>
      </div>
      <div class="modal-footer">
        	<button type="button" class="btn btn-primary" 
        	onclick="editBudgetModal(document.getElementById('view_top_id').value, 
        		document.getElementById('view_top_objective').value, document.getElementById('view_top_title').value, 
        		document.getElementById('view_top_curriculum').value)">
        			<i class="glyphicon glyphicon-wrench icon-white"></i> 
        			Edit
        	</button>
        	<button type="button" class="btn btn-danger" data-dismiss="modal">
        		<i class="glyphicon glyphicon-trash icon-white"></i>
        		 Close
        	</button>
       </div>
      
    </div>
  </div>
</div>