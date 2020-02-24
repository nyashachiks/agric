<?php echo Asset::js('dashboard/libs/jquery/jquery-1.8.2.js')?>
<?php echo Asset::js('jquery.ddslick.min.js')?>
<style>
.col-md-3,.col-md-6,.col-md-9{
	padding: 0px;
}
	.dd-selected,.dd-option{
		padding: 0px;
		display: inline;
		
	}
	.dd-option{
		padding: 10px;
		
	}
</style>
<br/>  
<br/> 
<br/> 
<br/> 

<div class="panel panel-primary" style="max-width: 400px; margin:0 auto 10px ;">

  <div class="panel-heading" align="center" >
    <h3 class="panel-title"  >Login</h3>
  </div>
  <div class="panel-body1" align="center">
  	
  	<br/>
  	   <?php echo  render('utilities/openform');?>
  	   <div class="row">
   <div class="col-sm-3 col-sm-offset-1"   >
			<!--img combo box-->
			<input type="hidden" id=code name=code />
			<select name="carlist"  id="myDropdown" >
				<?php foreach(Model_Flag::getAllFlags() as $item):
						try{ ?>	
        
        					<option style="padding: 0px;"  value="<?php echo $item['code'];?>"
     							data-imagesrc="<?php echo Uri::base(); ?>/assets/img/flags/<?php echo Str::lower($item['iso']);?>.png"  >
	        					<?php echo $item['code'];?>
        			        </option>        
    			<?php }
			    catch(Exception $e)
			    {
					
				}
    
     			endforeach;?>
    		</select>
    	  </div>
	<div class="col-sm-6">
        <input style="width: 100%"  value="<?php echo Input::post('user', isset($user) ? $user : '');  ?>"
         name="username" type="text" class="form-control" placeholder="Your Mobile Number">
        </div>
        </div> 
		<br/>
		<div class="row">
		<div class="col-sm-9 col-sm-offset-1" >
        <input style="width:100%" name="password" type="password" class="form-control" placeholder="Your Password">
	</div>
	</div>
	<br />
	<div class="row">
		<div class="col-sm-9 col-sm-offset-1" align="left" >
		&nbsp;&nbsp;<a href="<?php echo Uri::base().'auth/login/email';?>">Use Email to login</a>
		</div>
		</div>
		<p>&nbsp;</p>
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
<script>
		$('#myDropdown').ddslick({
				width:100,
			      onSelected: function (data) {
			      	$('#code').val(data.selectedData.value);
        console.log(data.selectedData.value);
    }
       
});

		</script>

			