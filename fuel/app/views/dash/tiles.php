<?php $kpi = new Kpi(); ?>

<div class="row top_tiles">

              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <a href="<?php echo Uri::create('depot/geo'); ?>">
                <div class="tile-stats">
                 <div class="icon"><i class="fa fa-map-marker"></i></div>
                  <div class="count"><?php echo $kpi->countMarketPlaces(); ?></div>
                  <h3>Depots</h3>
                  <p>Dotted across Zimbabwe.</p>
                </div>
              </a>
              </div>
              
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
	              <a href="<?php echo Uri::create('user/farmers'); ?>">
	                <div class="tile-stats">
	                  <div class="icon"><i class="fa fa-user"></i></div>
	                  <div class="count"><?php echo $kpi->countFarmers(); ?></div>
	                  <h3>Farmers</h3>
	                  <p>.. and still counting.</p>
	                </div>
                </a>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                 <a href="<?php echo Uri::create('productoffer'); ?>">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-shopping-cart"></i></div>
                  <div class="count"><?php echo $kpi->countProductsOnSale(); ?></div>
                  <h3>Products on sale</h3>
                  <p>Take a look, now!</p>
                </div>
                </a>
              </div>
             
</div>