<?php $kpi = new Kpi(); ?>

<div class="row top_tiles">

              <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?php echo Uri::create('stoporder/create'); ?>">
                <div class="tile-stats">
                 <div class="icon"><i class="fa fa-money"></i></div>
                  <div class="count"><?php echo '*'; ?></div>
                  <h3>Create Stop Order</h3>
                  
                </div>
              </a>
              </div>
              
              <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
	              <a href="<?php echo Uri::create('stoporder'); ?>">
	                <div class="tile-stats">
	                  <div class="icon"><i class="fa fa-suitcase"></i></div>
	                  <div class="count"><?php echo'*';  ?></div>
	                  <h3>Edit Stop Order </h3>
	                 
	                </div>
                </a>
              </div>
             
             
</div>