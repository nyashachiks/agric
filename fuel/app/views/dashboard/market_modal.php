<div class="modal fade" id="marketModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Market Details</h4>
      </div>
      <div class="modal-body">
       <?php echo render('utilities/openform'); ?>
       <?php echo render('market/view'); ?>
        <div class="clearfix"></div>
       
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
      <?php echo render('utilities/closeform'); ?>
    </div>
  </div>
</div>