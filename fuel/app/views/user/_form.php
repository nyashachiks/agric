<?php echo Asset::js('dashboard/libs/jquery/jquery-1.8.2.js')?>
<?php echo Asset::js('jquery.ddslick.min.js')?>
<style>
	.dd-selected,.dd-option{
		padding: 0px;
		display: inline;
		
	}
	.dd-option{
		padding: 10px;
		
	}
</style>
		
		<div class="row">
		
			<div class="col-md-2">
				<?php echo Form::label('First Name:', 'first_name', array('class'=>'control-label')); ?>
				</div>
				<div class="col-md-10">	
					<?php echo Form::input('first_name', 
					Input::post('first_name', isset($user) ? $user->first_name : ''), 
							array(	'class'=> 'form-control', 'placeholder'=>'First Name')); ?>
				</div>
		</div>
		
		<div class="row">
			<div class="col-md-2">
					<?php echo Form::label('Last Name:', 'last_name', array('class'=>'control-label')); ?>
				</div>
				<div class="col-md-10">
					<?php echo Form::input('last_name',
					 Input::post('last_name', isset($user) ? $user->last_name : ''),
					 			array('class'=> 'form-control', 'placeholder'=>'Last Name')); ?>
				</div>
		</div>
		
	<!--div class="row">
		
			<div class="col-md-2">
				
						<?php echo Form::label('Mobile:', 'mobile', array('class'=>'control-label')); ?>
			</div>
			
				
	    	<div class="col-md-10"  style="padding: 0px" >	
				<?php echo Form::input('mobile', Input::post('mobile', isset($user) ? $user->username : ''), 
							array('class'=> 'form-control', 'placeholder'=>'Mobile')); ?>
			</div>
	</div-->
				<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-2">
					<?php echo Form::label('Email:', 'email', array('class'=>'control-label')); ?>
				</div>
				<div class="col-md-10">
					<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 
						'form-control', 'placeholder'=>'Email')); ?>
				</div>
		</div>
<?php
	if(isset($user))
		{
			$address =Model_Address::find($user->address_id);
		} 
?>



<div class="row">
	<div class="col-md-10">

<?php  if(isset($address))
			{
				echo render('address/_form',array('address'=>$address));
			}
		else
			{
				echo render('address/_form');
			}
 ?>
 </div>
 </div>
 
<script>
		$('#myDropdown').ddslick
		({
			width:100,
			onSelected: function (data) 
			{
				$('#code').val(data.selectedData.value);
        		console.log(data.selectedData.value);
    		}
       
		});

</script>