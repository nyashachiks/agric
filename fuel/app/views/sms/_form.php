<?php echo Form::open(/*'http://txt.co.zw/Remote/SendMessage',*/array("class"=>"form-horizontal")); ?>
 
	<fieldset>
		<?php 
			list(, $userid) = Auth::get_user_id(); 
			$username='ttcsremote6';
			$user_identity=Auth\Model\Auth_User::find($userid);
			
			$sendingnumber=$user_identity->username;
			echo Form::hidden('sender_id', Input::post('sender_id', $userid)); 
			echo Form::hidden('username', Input::post('username', $username),array('id'=>'username')); 
			echo Form::hidden('message_id', Input::post('message_id', '1'),array('id'=>'message_id')); 
			echo Form::hidden('sending_number', Input::post('sending_number', $sendingnumber),array('id'=>'sender_number')); 
			
		?>
		
		
		
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Recipients', 'recipients', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::textarea('recipients', Input::post('recipients', isset($sm) ? $sm->recipients : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Recipients')); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Body', 'body', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::textarea('body', Input::post('body', isset($sm) ? $sm->body : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Body')); ?>
			</div>
		</div>
		
		<div class="row-fluid">
			
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::button('submit', 'Send', array('class' => 'btn btn-primary')); ?>		
			<!--button type="button" onclick="SaveDB()">Send Sms</button-->
		</div>
	</fieldset>
<?php echo Form::close(); ?>
<script>
function SaveDB()
{
	alert('pop');
	var formData ="username="+$('input[name="username"]').val()+"&sender_id="+$('input[name="sender_id"]').val()+"&sending_number="+
	$('input[name="message_id"]').val()+"&sending_number="+$('input[name="sending_number"]').val()+"&body="+$('textarea[name="body"]').val()+
	"&recipients="+$('textarea[name="recipients"]').val(); 
	AjaxCall(formData,'http:\/\/localhost:1234\/smart_farmer\/public\/sms\/create','savedb');
	
}
function SendingSmS()
{
	alert('pop');
	var formData ="username="+$('input[name="username"]').val()+"&sender_id="+$('input[name="sender_id"]').val()+"&sending_number="+
	$('input[name="message_id"]').val()+"&sending_number="+$('input[name="sending_number"]').val()+"&body="+$('textarea[name="body"]').val()+
	"&recipients="+$('textarea[name="recipients"]').val(); 
	AjaxCall(formData,'http:\/\/txt.co.zw\/Remote\/SendMessage','sms');
	
}
	function AjaxCall(formData,ul,trans){   
    	$.ajax({ url: ul,
            data: formData,
            type: 'post',
            beforeSend: function (request)
            {
                request.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
            },
           // dataType: "json",
           success: function(data){
           	if(trans=='savedb')
			document.forms[0].submit();// SendingSmS();
			else
			alert('Done');
           },
		error: function() {
		         alert('error');
		      },
		    	});	
 }; 
</script>