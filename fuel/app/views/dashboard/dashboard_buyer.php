<?php echo Asset::css('dashboard/jquery-ui.css');?>
<?php echo Asset::css('dashboard/sDashboard.css');?>

<?php echo Asset::js('dashboard/libs/datatables/jquery.dataTables.js');?>
<?php echo Asset::js('dashboard/libs/flotr2/flotr2.js');?>
<?php echo Asset::js('dashboard/libs/touchpunch/jquery.ui.touch-punch.js');?>
<?php echo  Asset::js('dashboard/libs/gitter/jquery.gritter.js');?>
<?php echo  Asset::js('dashboard/jquery-sDashboard.js');?>
<?php echo  Asset::js('dashboard/libs/exampleData.js');?>
<?php echo Asset::js('jquery.blockUI.js');?>
<div id="account">
	<a href="<?php echo Uri::base();?>user/view/<?php echo Auth::get_user_id()[1];
	//array index 1 contains the user id we need;?>" class="btn btn-link btn-lg">
    	<span class="glyphicon glyphicon-user"></span> Profile 
  	</a>
  
  	<a href="<?php echo Uri::base();?>logout" class="btn btn-link btn-lg">
   		<span class="glyphicon glyphicon-log-out"></span> Logout 
  	</a>
</div>
<div id="welcome">
	<h2>Welcome <?php ?></h2>
</div>
<div class="row">
<ul id="myDashboard"></ul>
</div>


<div id="subscribe">
	<table class="table table-condensed table-bordered table-striped">
		<tbody>
			<tr>
				<td width="60%" id="farmer">
				<?php echo ($farms>0?'Farms <span class="badge">'.$farms.'</span>':"Farmer");?> </td>
				<td><button id="btnfarmer" class="btn btn-primary btn-sm glyphicon glyphicon-ok" data-toggle="modal" data-target="#myModal1"
				 onclick="Register('farmer')">
				<?php  echo ($farms>0?'Add Farm':'<span class=""></span> Subscribe');?> </button> </td>
				<td><button class="btn btn-warning btn-sm glyphicon glyphicon-remove"> Un-Subscribe</button></td>
			</tr>
			<tr>
				<td>Buyer</td>
				<td><button class="btn btn-primary btn-sm glyphicon glyphicon-ok"> Subscribe</button> </td>
				<td><button class="btn btn-warning btn-sm glyphicon glyphicon-remove"> Un-Subscribe</button></td>
			</tr>
			<tr>
				<td>Trader</td>
				<td><button class="btn btn-primary btn-sm trader glyphicon glyphicon-ok"> Subscribe</button> </td>
				<td><button class="btn btn-warning btn-sm trader glyphicon glyphicon-remove"> Un-Subscribe</button></td>
			</tr>
		</tbody>
	</table>
</div>
<script type="text/javascript">
			$(function() {
				//**********************************************//
				//dashboard json data
				//this is the data format that the dashboard framework expects
				//**********************************************//

				var dashboardJSON = 
				[	{
						widgetTitle : "Subscribe",
						widgetId : "subscribe",
						widgetContent : $("#subscribe")
					},
					{
						widgetTitle : "Weather",
						widgetId : "weather",
						widgetContent : $("#m-booked-weather-bl250-3741")
					}];

				//basic initialization example
				$("#myDashboard").sDashboard({
					dashboardData : dashboardJSON
				});
				});
				
		</script>

<!-- Modal -->
  <?php echo render('dashboard/farmers_modal'); ?>
<script>
/*--wen user clicks subscribe for the first time please register this in the db--*/
function Register(btn)
{
	var str=$.trim($('#'+ btn).html());
	if(str=='Farmer')
		{
			if (str=="Farmer" && confirm('Subscribe to ' +  $('#'+ btn).html())) {
		     var formData = "type=" + btn +"&subscribe=1";  
			 var ul="<?php echo  Uri::create('dashboard/subscribe');?>" ;
			 /*---placing a blocker on top--*/
	    	$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
	    	/*--end blocker--*/
			 AjaxCall(formData,ul,'delet');
				}
		    else {
		    // Do nothing!
			}
			return;
		}
	else
		{
			$('#myModal').modal();
		}
}
function SaveFarmer()
{
	if(true)
		{
			if (true) {
				 var formData ="country="+$('input[name="country"]').val()+"&city="+$('input[name="city"]').val()+"&address="+
				 $('textarea[name="address"]').val()+"&address2="+$('textarea[name="address2"]').val()+"&district="+
				 $('input[name="district"]').val()+"&postal_code="+$('input[name="postal_code"]').val()+"&phone="+
				 $('input[name="phone"]').val()+"&name="+$('input[name="name"]').val()+"&size="+$('input[name="size"]').val()+
				 "&units="+$('input[name="units"]').val();  
			 var ul="<?php echo  Uri::create('farm/create');?>" ;
			 /*--hiding my modal--*/
			 $('#myModal').modal('hide');
			 /*---placing a blocker on top--*/
	    	$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
	    	/*--end blocker--*/
			 AjaxCall(formData,ul,'savefarmer');
				}
		    else {
		    // Do nothing!
			}
			return;
		}
	else
		{
			$('#myModal').modal();
		}
}
function AjaxCall(formData,ul,trans){   
    	$.ajax({ url: ul,
            data: formData,
            type: 'post',
           // dataType: "json",
           success: function(data){
           	if(trans=="savefarmer")
           	{
				$('#farmer').html('farms ' + '<span class="badge">' + data+'</span>');
				return;	
			}
           	if(data=='1')
           	{
				$('#farmer').html('farms ' + '<span class="badge">0</span>');
				$('#btnfarmer').html(' Add Farm');
				$("#btnfarmer").removeClass("glyphicon-ok");
				$("#btnfarmer").addClass("glyphicon-plus");
				 $(".trader").attr("disabled","disabled");
			}
           },
		error: function() {
		         alert('error');
		      },
		    	});	
 }; 
</script>
<!-- weather widget start -->

<div id="m-booked-weather-bl250-3741"> <a href="//www.booked.net/weather/harare-35983" class="booked-wzs-250-175" style="background-color:#64d464;"> <div class="booked-wzs-250-175-data wrz-01"> <div class="booked-wzs-250-175-right"> <div class="booked-wzs-day-deck"> <div class="booked-wzs-day-val"> <div class="booked-wzs-day-number"><span class="plus">+</span>37</div> <div class="booked-wzs-day-dergee"> <div class="booked-wzs-day-dergee-val">&deg;</div> <div class="booked-wzs-day-dergee-name">C</div> </div> </div> <div class="booked-wzs-day"> <div class="booked-wzs-day-d">H: <span class="plus">+</span>38&deg;</div> <div class="booked-wzs-day-n">L: <span class="plus">+</span>27&deg;</div> </div> </div> <div class="booked-wzs-250-175-city">Harare</div> <div class="booked-wzs-250-175-date">Friday, 13 November</div> <div class="booked-wzs-left"> <span class="booked-wzs-bottom-l">See 7-Day Forecast</span> </div> </div> </div> <table cellpadding="0" cellspacing="0" class="booked-wzs-table-250"> <tr> <td>Sat</td> <td>Sun</td> <td>Mon</td> <td>Tue</td> <td>Wed</td> <td>Thu</td> </tr> <tr> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> </tr> <tr> <td class="week-day-val"><span class="plus">+</span>37&deg;</td> <td class="week-day-val"><span class="plus">+</span>31&deg;</td> <td class="week-day-val"><span class="plus">+</span>29&deg;</td> <td class="week-day-val"><span class="plus">+</span>25&deg;</td> <td class="week-day-val"><span class="plus">+</span>27&deg;</td> <td class="week-day-val"><span class="plus">+</span>29&deg;</td> </tr> <tr> <td class="week-day-val"><span class="plus">+</span>23&deg;</td> <td class="week-day-val"><span class="plus">+</span>21&deg;</td> <td class="week-day-val"><span class="plus">+</span>17&deg;</td> <td class="week-day-val"><span class="plus">+</span>18&deg;</td> <td class="week-day-val"><span class="plus">+</span>16&deg;</td> <td class="week-day-val"><span class="plus">+</span>17&deg;</td> </tr> </table> </a> 
</div>
	<script type="text/javascript">
	$(function() { var css_file=document.createElement("link"); css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href",'//s.bookcdn.com/css/w/booked-wzs-widget-275.css?v=0.0.1'); document.getElementsByTagName("head")[0].appendChild(css_file); function setWidgetData(data) { if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = document.getElementById('m-booked-weather-bl250-3741'); if(objMainBlock !== null) { var copyBlock = document.getElementById('m-bookew-weather-copy-'+data.results[i].widget_type); objMainBlock.innerHTML = data.results[i].html_code; if(copyBlock !== null) objMainBlock.appendChild(copyBlock); } } } else { alert('data=undefined||data.results is empty'); } }
	}); </script> 
	<script type="text/javascript" charset="UTF-8" src="http://widgets.booked.net/weather/info?action=get_weather_info&ver=4&cityID=35983&type=3&scode=124&ltid=3457&domid=w209&cmetric=1&wlangID=1&color=64d464&wwidth=250&header_color=ffffff&text_color=333333&link_color=08488D&border_form=1&footer_color=ffffff&footer_text_color=333333&transparent=0">
		
	</script>
<!-- weather widget end -->