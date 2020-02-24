<script>
$(function() {
	  $("#btnnext").on("click", function(e){
  	//moves from charges to payment order
  	paymentorderstep();
    		step='step4';
    		steps(step);
    	});
    	/*---placing a blocker on top--*/
    	$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
    	/*--end blocker--*/
});
var loandetail_id,
	type,
	amount,
	_fixed,
	recurring;
	var par;
	
function MenuOrder(count)
{ //this function is for ordering a list of items
	$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
	var ul=$('#url').val();
	var prefix=document.getElementsByTagName('select');
	var vals=document.getElementsByClassName('itemValue');
	for(x=0;x<count;x++)
	{
		var appendEnd=""; 
		if(prefix.length>0){ //prefix is used on projects, just to help bring out critical path
			appendEnd="&prefix="+prefix[x].value;
		}	
		var formData="count="+x+"&info="+vals[x].value+"&prefix="+appendEnd;
		AjaxCall(formData,ul,'order');
	}
}
   function DoAction(id)
{ 
if (confirm('Are you sure you want to delete this record')) {
      var formData = "id=" + id ;  // $("#formOne").serialize();
	 var ul="<?php echo  Uri::create('loanproduct/charge/delete/');?>" + id;
	 par=  $('#'+ id).closest('tr');
		//  $('#'+ id).closest('tr').remove(); 
	  ///alert($('#'+ id).closest('tr').text());
		 AjaxCall(formData,ul,'delet');
		 par.hide();
		}
    else {
    // Do nothing!
	}
} 
function Edit(id)
{ 
$('#type_text'+id).hide();
$('#type'+id).show();
$('#amount_text'+id).hide();
$('#amount'+id).show();
$('#fixed_text'+id).hide();
$('#fixed'+id).show();
$('#recurring_text'+id).hide();
$('#recurring'+id).show();
$('#charge_btn'+id).hide();
$('#charge_save_btn'+id).show();
$('#amount'+id).focus();
}
function charge_edit(id)
{
	 loandetail_id=$('#loanproduct_id').val() ;//this is defined in _charges form
	type=$('#type'+id).val() ;
	amount=parseFloat($('#amount'+id).val()) ;
	_fixed=$('#fixed'+id).val()  ;
	recurring=$('#recurring'+id).val() ;
	var formData = "loandetail_id=" + loandetail_id +"&type=" + type+"&amount=" +
	 amount +"&fixed="+_fixed + "&recurring="+recurring ;
	 var ul="<?php echo  Uri::create('loanproduct/charge/edit/');?>" + id;
	  par = $('#'+ id).closest('tr');
		 AjaxCall(formData,ul,'charge');
}
function charge()
{
	 loandetail_id=$('#loanproduct_id').val() ;//this is defined in _charges form
	type=$('#saveselect').val() ;
	amount=parseFloat($('#savetext').val()) ;
	_fixed=$('#fixedselect').val()  ;
	recurring=$('#recselect').val() ;
	var formData = "loandetail_id=" + loandetail_id +"&type=" + type+"&amount=" +
	 amount +"&fixed="+_fixed + "&recurring="+recurring ;
	 var ul="<?php echo  Uri::create('loanproduct/charge/create');?>";
	  par = $(this).parent().parent();
		 AjaxCall(formData,ul,'charge');
}
function AjaxCall(formData,ul,trans){   
    	$.ajax({ url: ul,
            data: formData,
            type: 'post',
           // dataType: "json",
           success: function(data){
           	$('#hidden').show();
	if(trans=='charge')
	{deal_charges();}
	if(trans=='order')
	{
	//hiding all buttons again as i have reached end
	//$('.btn').hide();
		//redirecting as i am done collecting all neccessary details
	//	window.location.replace("<?php echo  Uri::create('loanproduct/index');?>");
	}},
error: function() {
         alert('error');
      },
    	});	
    	 }; 
function deal_charges()
{
	//alert(par.find("td:nth-child(1)").text());
	var fixedarray=['Percentage','Fixed'];
	var recarray=['Once Off','Recurring'];
	par.find("td:nth-child(1)").html(type); //nth-child starts count on 1
	par.find("td:nth-child(2)").html(amount);
	par.find("td:nth-child(3)").html(fixedarray[_fixed]);
	par.find("td:nth-child(4)").html(recarray[recurring]);
	par.find("td:nth-child(5)").html('<span class="label label-success">Added</span>');
}
</script>