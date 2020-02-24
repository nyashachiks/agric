<div class="modal fade" id="farmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">My Farms</h4>
      </div>
      <div class="modal-body">
      
       <?php echo render('farm/index'); ?>
      
       <div class="clearfix"></div>
      
        
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="SaveFarmer()">Save changes</button>
      </div>
      <?php echo render('utilities/closeform'); ?>
    </div>
  </div>
</div>