<!--h2>New <span class='muted'>Structure</span></h2>
<br>

<?php //echo render('structure/_form'); ?>


<p><?php echo Html::anchor('structure', 'Back'); ?></p-->
<h4>Structure</h4>
<div class="panel panel-danger">
	<div class="panel-heading">
		Structure 
	</div>
	<div class="panel-body">
		<?php echo render('utilities/openform');
		 echo render('structure/_form'); ?>
	</div>
	</div>

<!--div class="panel panel-primary">
	<div class="panel-heading">
		Contact Details
	</div>
	<div class="panel-body">
		<?php 
	  //echo render('user/registrationwizard');
	 
	  //echo render('address/_form');
	  //echo render('utilities/_password'); 
	  ?>
	</div>
</div-->


	  <div class="clearfix"></div>
	  
	  <div class="col-md-12">
	  	
	  <?php
	 // $img=Asset::get_file('famfam/user.png','img');
	  echo render('utilities/submitbutton',array('label'=>' Save','img'=>'famfam/disk.png','class'=>' btn-lg btn-primary'));
	  echo render('utilities/closeform');  ?>
	  &nbsp;
	  <a href="<?php echo Uri::base();?>" >
	  	<?php 
	  echo render('utilities/backbutton',array('label'=>' Cancel &nbsp;&nbsp;','img'=>'famfam/cancel.png','class'=>' btn-lg btn-warning'));
	  ?>
	  </a>
	
	 </div>

