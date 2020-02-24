

<div class="row top_tiles">

              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <a href="<?php echo Uri::create('contract/search_page'); ?>">
                <div class="tile-stats">
                 <div class="icon"><i class="fa fa-search"></i></div>
                 	<div class="count"> Find</div>
                  <h3>Search Reports</h3>
                  <p>By product or season.</p>
                </div>
              </a>
              </div>
              
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
	              <a href="<?php echo Uri::create('contract/report_all'); ?>">
	                <div class="tile-stats">
	                  <div class="icon"><i class="fa fa-briefcase"></i></div>
	                  <div class="count"><?php echo $count_contracts; ?></div>
	                  <h3>All Contracts</h3>
	                  <p>.. and still counting.</p>
	                </div>
                </a>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                 <a href="<?php echo Uri::create('contract/contractors'); ?>">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-group"></i></div>
                  <div class="count"><?php echo  $count_contractors; ?></div>
                  <h3>Agronomists</h3>
                  <p>Take a look, now!</p>
                </div>
                </a>
              </div>
              
</div>