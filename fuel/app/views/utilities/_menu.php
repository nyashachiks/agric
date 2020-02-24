<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <!--left side-->
   <ul class="nav navbar-nav ">
	   <li><a href="<?php echo Uri::base();?>dashboard">Dashboard</a></li>
	   
		<?php 
				
				$myarr=Custom_UserUtility::getUserProfile();
				$role=$myarr['role'];
			
				if(isset($role)&&($role==='Agritax'))
				{?>
					<!--Users drop down-->
				  	 <li class="dropdown">
					   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							View Registered Users
							<span class="caret">
							</span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="<?php echo Uri::base();?>user/farmers">
									Farmers
								</a>
							</li>
							<li>
								<a href="<?php echo Uri::base();?>user/buyers">
									Buyers
								</a>
							</li>
						</ul>
					</li>
		<?php		}
			else{?>
					
					<!--Users drop down-->
				  	 <li class="dropdown">
					   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							Legal
							<span class="caret">
							</span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="<?php echo Uri::base();?>document/document">
									View Legislation Documents
								</a>
							</li>
						</ul>
					</li>
		<?php	}
		?>
	   <?php 
	   //dealing with left side
	   $menu=Model_Mainmenu::query()->where('aligned','Left')->get();
	   foreach($menu as $item) :
	   //no drop downs
	   if(isset($item->dropdowns))
		{
			if(count($item->dropdowns)==0)
			{
				if(Custom_Permissionutility::HasMenuAccess($item->id,-1))
				{
					if($item->aligned=='Left')
					{
	   	
	     			echo  '<li><a href="' . Uri::base(). $item->url.'">'. $item->name.'</a></li>';
					}
					
				}
			}
			else //now dealings with items with a drop down menu
			{
				$displaytoplevel=false;
				//toplevel
				$str= '<li class="dropdown">';
	         	$str.= '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'
	         			. $item->name.'<span class="caret"></span></a>';
				$str.= '<ul class="dropdown-menu">';
				 
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
   
   <!--right side-->
    <!--left side-->
   <ul class="nav navbar-nav navbar-right">
    <?php 
   //dealing with right side
   $menu=Model_Mainmenu::query()->where('aligned','Right')->get();
   foreach($menu as $item) :
   //no drop downs
   if(isset($item->dropdowns))
	{
		if(count($item->dropdowns)==0)
		{
			if(Custom_Permissionutility::HasMenuAccess($item->id,-1))
			{
     			echo  '<li><a href="' . Uri::base(). $item->url.'">'. $item->name.'</a></li>';
			}
		}
		else //now dealings with items with a drop down menu
		{
			$displaytoplevel=false;
			//toplevel
			$str= '<li class="dropdown">';
         	$str.= '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'
         			. $item->name.'<span class="caret"></span></a>';
			$str.= '<ul class="dropdown-menu">';
			 
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
  
   <!--<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				Profile
				<span class="caret">
				</span>
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="<?php echo Uri::base();?>user/view">
						View Profile
					</a>
				</li>
				<li>
					<a href="<?php echo Uri::base();?>document/index">
									View and Upload My Documents
					</a>
				</li>
				
			</ul>
	</li>
   <li><a href="<?php echo Uri::base();?>logout">Logout</a></li> -->
   </ul>
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>