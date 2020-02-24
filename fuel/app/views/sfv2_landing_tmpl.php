<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo Uri::base(false);?>/assets/landing-theme/images/fav.png" type="image/x-icon">
  <meta name="description" content="">

  <link rel="stylesheet" href="<?php echo Uri::base(false);?>/assets/landing-theme/et-line-font-plugin/style.css">
  <link rel="stylesheet" href="<?php echo Uri::base(false);?>/assets/landing-theme/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="<?php echo Uri::base(false);?>/assets/landing-theme/tether/tether.min.css">
  <link rel="stylesheet" href="<?php echo Uri::base(false);?>/assets/landing-theme/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo Uri::base(false);?>/assets/landing-theme/socicon/css/socicon.min.css">
  <link rel="stylesheet" href="<?php echo Uri::base(false);?>/assets/landing-theme/animate.css/animate.min.css">
  <link rel="stylesheet" href="<?php echo Uri::base(false);?>/assets/landing-theme/dropdown/css/style.css">
  <link rel="stylesheet" href="<?php echo Uri::base(false);?>/assets/landing-theme/theme/css/style.css">
  <link rel="stylesheet" href="<?php echo Uri::base(false);?>/assets/landing-theme/mobirise/css/mbr-additional.css" type="text/css">
  
  <link rel="stylesheet" href="<?php echo Uri::base(false);?>/assets/landing-theme/libstar/custom.css" type="text/css" />
  
   <script src="<?php echo Uri::base(false);?>/assets/landing-theme/web/assets/jquery/jquery.min.js"></script>
  
  <title><?php echo $title; ?> | </title>
</head>
<body>
<section id="ext_menu-2">

    <nav class="navbar navbar-dropdown navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                   <!--  <div class="navbar-brand">
                        <a href="#top" class="navbar-logo"><img src="<?php //echo Uri::base(false);?>/assets/landing-theme/images/logoi.png" alt="SmartFarmer" title=""></a>
                    </div> -->

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                      <!--<li class="nav-item"><a class="nav-link link" href="#top">ABOUT</a></li>
                      <li class="nav-item"><a class="nav-link link" href="#top">FEATURES</a></li>
                      <li class="nav-item"><a class="nav-link link" href="#top">PRICING</a></li>
                      <li class="nav-item"><a class="nav-link link" href="#top">CONTACT</a></li>-->
                      <li class="nav-item nav-btn">
                        <a class="nav-link btn btn-white btn-white-outline" href="<?php echo Uri::create('login'); ?>">LOGIN</a>
                      </li>
                    </ul>
                   <!-- <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>-->

                </div>
            </div>

        </div>
    </nav>

</section>

<section class="mbr-section mbr-section-hero mbr-section-full mbr-parallax-background mbr-after-navbar" id="header1-1" style="background-image: url(<?php echo Uri::base(false);?>/assets/landing-theme/images/bg.jpg);">

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);"></div>

    <div class="mbr-table-cell">

        <?php echo $content; ?>
    </div>

    

</section>

<!-- fix here -->
  <script src="<?php echo Uri::base(false);?>/assets/landing-theme/web/assets/jquery/jquery.min.js"></script>
  
  
  <script src="<?php echo Uri::base(false);?>/assets/landing-theme/tether/tether.min.js"></script>
  <script src="<?php echo Uri::base(false);?>/assets/landing-theme/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo Uri::base(false);?>/assets/landing-theme/smooth-scroll/SmoothScroll.js"></script>
  <script src="<?php echo Uri::base(false);?>/assets/landing-theme/viewportChecker/jquery.viewportchecker.js"></script>
  <script src="<?php echo Uri::base(false);?>/assets/landing-theme/dropdown/js/script.min.js"></script>
  <script src="<?php echo Uri::base(false);?>/assets/landing-theme/touchSwipe/jquery.touchSwipe.min.js"></script>
  <script src="<?php echo Uri::base(false);?>/assets/landing-theme/jarallax/jarallax.js"></script>
  <script src="<?php echo Uri::base(false);?>/assets/landing-theme/theme/js/script.js"></script>
  
  
  <input name="animation" type="hidden">
   <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon"></i></a></div>
  </body>
</html>