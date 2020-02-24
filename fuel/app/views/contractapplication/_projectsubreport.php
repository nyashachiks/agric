             <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Contract details</a>
                        </li>
                        
                        <!-- only show this when inputs have been disbursed -->
                        <?php if(strtolower(Uri::segment(1) == 'contract' 
                        		and isset($show_update_disburse_text_field) 
                        		and $show_update_disburse_text_field == false)): ?>
                        		
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Disbursed inputs</a>
                        </li>
                        <?php endif; ?>
                        
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        	
                        	<div class="panel panel-default">
								<div class="panel-body">
								 <?php echo render('shared/_stageNoButton.php',['project'=>$project]);?>
								</div>
								<div class="panel-footer">
									<strong>Grand total</strong> <?php $grand_total =  Session::get('grand_total'); ?>
									<div class="pull-right libs-grand"> </div>
								</div>
								<div class="panel-footer">
									<strong>Expected yield</strong>
									<div><?php echo $project->expected_yield.' tonnes'; ?></div>
								</div>

							</div>
                        	
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        	<div class="panel panel-default">
                        	<div class="panel-body">
	                        	<legend>Input disbursement summary</legend>
	                        	<table id="cpTo" class="table table-bordered table-striped">
	                        		<thead>
	                        			<th class="col-sm-5">Item name </th>
	                        			<th class="col-sm-4">Unit of measure </th>
	                        			<th class="col-sm-1">Approved</th>
	                        			<th class="col-sm-1">Disbursed</th>
	                        			<th class="col-sm-1">Line total</th>
	                        		</thead>
	                        		<tbody>
	                        		</tbody>
	                        	</table>
                        	</div>
                        	<div class="panel-footer">
									<strong>Grand total</strong> 
									<div class="pull-right libs-grand"></div>
								</div>
                        	</div>
                        	
                        </div>
                      </div>
                    </div>
         
 <?php $base = Uri::base();
 $target = Uri::segment(3);
 ?>    
        
 <script>
 
 var base_uri = "<?php echo $base; ?>";
 var target = "<?php echo $target; ?>";
 
 $(document).ready(function(){
 
  // we then retrieve the processed data in JSON
  var   copyTable = $('#cpTo tbody');
  
  //generate inputs table
   $.ajax({
            type: "GET",
            url: base_uri + "/rest/contract/list.json?",
            data: "target="+target,
            success: function(json) {
            	//console.log(json);
            	
            	$.each(json, function(i, key) {
			        var $tr = $('<tr>').append(
			            $('<td>').text(key.item),
			            $('<td>').text(key.units),
			            $('<td>').text(key.approv),
			            $('<td>').text(key.disb),
			            $('<td>').text(key.linetotal)
   					 );
   					 
   					copyTable.append($tr);
				});
        }
         
        });
    
    //get the totals for this contract
     $.ajax({
            type: "GET",
            url: base_uri + "/rest/contract/grand.json?",
            data: "target="+target,
            success: function(json) {

            	$.each(json, function(i, key) {
			       var grand = key.grand;  
			       console.log("grand = "+ grand); 					 
   					$(".libs-grand").append(grand); //todo format this as currency
				});
        }
         
        });
 
 });
</script>