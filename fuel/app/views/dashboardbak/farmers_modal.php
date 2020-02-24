<?php echo Form::open('farm/create', array("class"=>"form-horizontal",'id'=>'myform')); ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Farm Details</h4>
      </div>
      <div class="modal-body">
       		<div id='errorfarmer' style="display: none" class="alert alert-danger" >
	      		<strong>Error</strong>
	      		<p id="p6"></p>	
	      	</div>
	       <?php echo render('farm/_form'); ?>
	       <?php echo render('address/_form'); ?>
	       <?php echo render('registration/_form'); ?>
	       <!-- farm registration -->
	       
	       
	       
	       <!-- // farm registration -->

	       <div class="clearfix"></div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="SaveFarmer()">Save changes</button>
      </div>
     
    </div>
  </div>
</div>
 <?php echo render('utilities/closeform'); ?>