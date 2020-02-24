<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?> |  </title>
    <!-- lets attach css files -->
    <?php echo Asset::css(array(
    	'bootstrap.min.css',
    	'font-awesome/css/font-awesome.min.css',
    	'custom/custom.min.css',
    	'morris.css',
    	'iCheck/skins/flat/green.css',
    	'sfarmer_tweaker.css'
    )); ?>
    
    <style>
    	.btn-round{
			
		}
    </style>
    
    <?php  echo Asset::js('jquery.min.js'); ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
		<!-- lets forge a menu -->
		<?php echo render('sidebar/_menu'); ?>

        <!-- page content -->
        
        <?php  echo $content; ?>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
           Software by: <a href=""></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
  </body>
</html>
