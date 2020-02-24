
<br/>  
<br/> 
<br/> 
<br/> 

<div class="panel panel-primary" style="max-width: 400px; margin: 0 auto 10px;">

  <div class="panel-heading" align="center" >
    <h3 class="panel-title"  >Login</h3>
  </div>
  <div class="panel-body1" align="center">
  	
  	<br/>
  	   <?php echo  render('utilities/openform');?>
  	   <div class="row">
  
	<div class="col-sm-9 col-sm-offset-1">
        <input style="width: 100%"  value="<?php echo Input::post('user', isset($user) ? $user : '');  ?>"
         name="username" type="text" class="form-control" placeholder="Email address">
        </div>
        </div> 
		<br/>
		<div class="row">
		<div class="col-sm-9 col-sm-offset-1" >
        <input style="width:100%" name="password" type="password" class="form-control" placeholder="Your Password">
	</div>
	</div>
	<br />

    </div>
    
    
      <!--div align="left">
     <a href="<?php echo Uri::base().'auth/reset';?>" style="color:blue; font-size: 1.2em">Forgot your Password?</a>
      </div-->
  
  <div class="panel-footer">
  <div class="row">
  <div class="col-sm-4">
  	<?php echo render('utilities/submitbutton',array('class'=>' btn-lg btn-primary','img'=>'famfam/key.png','label'=>'Login')).
			   render('utilities/closeform');?>
	</div>
	<div class="col-sm-4">
	<a href="<?php echo Uri::base();?>register" >
	<?php echo render('utilities/backbutton',array('class'=>' btn-lg','img'=>'famfam/user_edit.png','label'=>'Register'));?>
	</a>				
	</div>
	</div>				
  </div>
</div>


			