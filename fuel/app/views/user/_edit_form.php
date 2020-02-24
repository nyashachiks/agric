<?php
$showAddress=FALSE;
$isCompany=FALSE;
//check if the user is company user
//Debug::dump($user->company);die;
if(!isset($user->company))
{//means this is an individual
	$showAddress=TRUE;
}	
else{ //shows this is a company, only admin can change company password
	if($user->admin=='1')
		{
			$showAddress=TRUE;
			$isCompany=TRUE;
		}
}
?>	

<div class="col-md-12 col-xs-12 col-sm-12">
	<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-user"></i> Edit user details</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Personal</a>
                        </li>
                        
                         <?php if($showAddress): ?>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Address</a>
                        </li>
                        <?php endif; ?>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" 
                        aria-expanded="false">Upload Profile Picture</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" 
                        aria-expanded="false">Update password</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        	<!-- personal details form -->
                        	
                        	<form class="form-horizontal" method="post">

<div class="form-group">
<?php echo Form::label('First Name', 'first_name', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
<div class="col-md-6 col-sm-6 col-xs-12">
	<?php echo Form::input('first_name', 
					Input::post('first_name', isset($user) ? $user->first_name : ''), 
							array(	'class'=> 'form-control', 'placeholder'=>'')); ?>
</div>

</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Last name</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo Form::input('last_name',
					 Input::post('last_name', isset($user) ? $user->last_name : ''),
					 			array('class'=> 'form-control', 'placeholder'=>'')); ?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 
						'form-control', 'placeholder'=>'')); ?>
	</div>
</div>

<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		<button class="btn btn-md btn-success btn-round" type="submit">Save</button>
	</div>
</div>

</form>
                        	
                        	<!-- // personal details form -->
                        </div>
                        <?php //if(isset($country)): ?>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        	<!-- address -->
					    	 <form class="form-horizontal" method="post" action="<?php echo Uri::create('address/edit'); ?>">
					        <?php 
						    	echo render('address/_form',array('address'=>Model_Address::find($user->address_id)));
					    	?>
					    	</form>
                        	<!-- // address -->
                        </div>
                        <?php //endif; ?>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                        	<!-- profile -->
                        	<form class="form-horizontal" method="post" enctype= "multipart/form-data" 
                        	action="<?php echo Uri::create('profilepic/create'); ?>">
					    	<?php  echo render('user/_profilepic'); ?>
                        	</form>
                        	<!-- // profile -->
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                        	<!-- password -->
                        	<form class="form-horizontal" method="post" action="<?php echo Uri::create('user/updatePassword'); ?>">
					    	<?php  echo render('user/_password'); ?>
                        	</form>
                        	<!-- // password -->
                        </div>
                      </div>
                    </div>

                  </div>
	</div>
</div>