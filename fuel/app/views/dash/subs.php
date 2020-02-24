<!-- Start subs -->
<div class="col-md-4 col-sm-4 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Subscribe<small>tick your choices</small></h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <div class="">
        <ul class="to_do">
          <li>
            <p>
              <input <?php if(Model_Subscription::isSubscribed('farmer') == true) echo "checked"; ?>  id="asFarmer" type="checkbox" class="flat">As farmer </p>
          </li>
          <li>
            <p>
              <input <?php if(Model_Subscription::isSubscribed('contractor') == true) echo "checked"; ?> id="asContractor" type="checkbox" class="flat">As agronomist </p>
          </li>
          <li>
            <p>
              <input <?php if(Model_Subscription::isSubscribed('buyer') == true) echo "checked"; ?> id="asBuyer" type="checkbox" class="flat">As buyer</p>
          </li>
          <li>
            <p>
              <input <?php if(Model_Subscription::isSubscribed('trader') == true) echo "checked"; ?> id="asTrader" type="checkbox" class="flat">As trader </p>
          </li>
          <li>
            <p>
              <input <?php if(Model_Subscription::isSubscribed('labor') == true) echo "checked"; ?> id="asLabour" type="checkbox" class="flat">As labour for hire</p>
          </li>
          <li>
            <p>
              <input <?php if(Model_Subscription::isSubscribed('logistic') == true) echo "checked"; ?> id="asEquipment" type="checkbox" class="flat">As equipment supplier</p>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- End subs -->

<?php $baseUrl = Uri::base(); ?>
<script>
	$(document).ready(function(){

		var targetChBox = "";
		
		$("input[class=flat]").on('ifChanged', function(){
			
			targetChBox = $(this).attr("id");
			console.log("Thats a click for: " + targetChBox);
			
			var chVal = $("#"+targetChBox).iCheck('update')[0].checked;
			
			var baseUrl = "<?=$baseUrl?>";
			switch(targetChBox){

				case 'asFarmer':
					(chVal == true)? 
						window.location = baseUrl + "subscriptions/dosub/farmer"
					:	window.location = baseUrl + "/subscriptions/unsub/farmer";
				break;
				
				case 'asContractor':
					(chVal == true)? 
						window.location = baseUrl + "subscriptions/dosub/contractor"
					:	window.location = baseUrl + "/subscriptions/unsub/contractor";
				break;
				
				case 'asBuyer':
					(chVal == true)? 
						window.location = baseUrl + "subscriptions/dosub/buyer"
					:	window.location = baseUrl + "/subscriptions/unsub/buyer";
				break;
				
				case 'asTrader':
					(chVal == true)? 
						window.location = baseUrl + "subscriptions/dosub/trader"
					:	window.location = baseUrl + "/subscriptions/unsub/trader";
				break;
				
				case 'asLabour':
					(chVal == true)? 
						window.location = baseUrl + "subscriptions/dosub/labor"
					:	window.location = baseUrl + "/subscriptions/unsub/labor";
				break;
				
				case 'asEquipment':
					(chVal == true)? 
						window.location = baseUrl + "subscriptions/dosub/logistic"
					:	window.location = baseUrl + "/subscriptions/unsub/logistic";
				break;
				
			}
			
		});
	});
		
</script>