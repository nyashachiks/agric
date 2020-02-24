
<div class="col-md-3 left_col">
                
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo Uri::create('dashboard'); ?>" class="site_title">
              <i class="fa fa-paw"></i> <span>W.E Prototype</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?php 
                list(,$uid) = Auth::get_user_id();
                $profilepic=Model_Profilepic::getProfilePic($uid);
                echo  Asset::get_file($profilepic,'img'); ?>" 
                alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo ucwords(Model_User::get_first_name()); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="margin-top: 90px;">
              <div class="menu_section">
               <h3>Application menu</h3>
               <!-- @todo: grab all menus from the Db and their children and then we gen the html here  -->
                <ul class="nav side-menu">
<?php 
                   $menu=Model_Mainmenu::query()->order_by('position')->get(); //getting menu items
                   foreach($menu as $item) :
                   //no drop downs
                   if(isset($item->dropdowns))
                                {
                                                if(count($item->dropdowns)==0)
                                                {
                                                                if(Custom_Permissionutility::HasMenuAccess($item->id,-1))
                                                                {
                                                                echo '<li><a href="'.Uri::create($item->url).'"><i class="fa '. $item->icon .'"></i>'. 
                                                                	$item->name.'<span class="fa fa-hand-o-right"></span></a></li>';
                                                                }
                                                }
                                                else //now dealings with items with a drop down menu
                                                {
                                                                $displaytoplevel=false;
                                                                //toplevel
                                                                $str= '<li>';
                                $str.= '<a href="#"><i class="fa '.$item->icon.'"></i>'. $item->name.
                                '<span class="fa fa-chevron-down"></span></a>';
                                                                $str.= '<ul class="nav child_menu">';
                                                                
                                                                //need to loop through our dropdown menus
                                                                foreach($item->dropdowns as $sub)
                                                                {
                                                                                if(Custom_Permissionutility::HasMenuAccess($item->id,$sub->id))
                                                                                {
                                                                                                $str.= '<li><a href="'. Uri::base().$sub->url.'">'.$sub->name.'</a></li>';
                                                                                                $displaytoplevel=TRUE;
                                                                                }
                                                                }
                                                                $str.= '</ul>';
                                                                $str.= '</li>';
                                                                if($displaytoplevel)
                                                                                echo($str);
                                                
                                                }
                                }
                   endforeach;
                   ?>
                           
                </ul>
                
              </div>
            </div>
            <!-- /sidebar menu -->

            
          </div>
</div>
        
         <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo Asset::get_file($profilepic,'img'); ?>" alt="">
                    <?php echo ucwords(Model_User::get_first_name()); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo Uri::create('logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
