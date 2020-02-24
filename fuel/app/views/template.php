<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?> | We Effect Agric </title>
    <!-- lets attach css files -->
    <?php echo Asset::css(array(
    	'bootstrap.min.css',
    	'font-awesome/css/font-awesome.min.css',
    	'custom/custom.min.css',
    	'custom/libs-patch.css'
    )); ?>
    <?php  echo Asset::js('jquery.min.js'); ?>
    
 <?php echo Asset::css('bootstrap-datepicker3.standalone.min.css'); ?>
 <?php echo Asset::js(array(
    	'bootstrap-datepicker.js',
    )); ?>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
		<!-- lets forge a menu -->
		<?php echo render('sidebar/_menu'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
        
          <div class="">
            <!--<div class="page-title">
              <div class="title_left">
                <h3><?php //echo $view_legend; ?></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>-->
            
            <div class="clearfix"></div>
            <!-- alerts -->
            <div class="row">
            	<?php if (Session::get_flash('success')): ?>
				<div class="alert alert-success">
					<strong>Success</strong>
					<p>
					<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
					</p>
				</div>
			<?php endif; ?>
			<?php if (Session::get_flash('error')): ?>
				<div class="alert alert-danger">
					<strong>Error</strong>
					<p>
					<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
					</p>
				</div>
			<?php endif; ?>
            </div>
            <!-- /alerts -->
            
            <div class="row">
           	 <?php echo $content; ?>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
           Software by: <a href="https://eccensys.com">Eccensys Technologies</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- lets attach some javascript -->
    <?php echo Asset::js(array(
    	'bootstrap.min.js',
    	'fastclick.js',
    	'nprogress.js',
    	'custom.min.js'
    )); ?>

  </body>
</html>
