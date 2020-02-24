<?php

// init with the API key
$f = new ForecastIO("535dd83e728190b8e669a851f4fc4825");

/* for testing we use 
---------------------

	lat -17.8082294 
	long 31.075727500000003
	
*/

$lat = '-17.8082294';
$lon = '31.0757275';
$city_name = 'Harare';
$now = array();

$req = $f->getCurrentConditions($lat,$lon);



if(is_object($req)){
	$now['icon'] = $req->getIcon();
	$now['summary'] = $req->getSummary();
	$now['city'] = $city_name;
	$now['max_temp'] =  round($req->getApparentTemperature());
	
	$dateParts 	 = explode(',', $req->getTime('l, H:i A'));
	$now['day']  =  $dateParts[0];
	$now['time'] = $dateParts[1];
}

// holds a list of icon names for respective forecast days
$icon_names    =  array();
@$icon_names[7] = $now['icon'];


// forecast for the next week, incl today
$weekForecast = $f->getForecastWeek($lat,$lon);



?>


<div class="x_panel">
  <div class="x_title">
    <h2>Today's Weather <small>forecast</small></h2>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <div class="row">
      <div class="col-sm-12">
        <div class="temperature" style="text-align: center">
	        <b><?php echo isset($now['day'])?$now['day']:''; ?></b>, <?php 
	        echo isset($now['time'])?$now['time']:''; ?>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="weather-icon">
          <span>
                              <canvas height="84" width="84" id="icon7"></canvas>
                          </span>

        </div>
      </div>
      <div class="col-sm-8">
        <div class="weather-text">
        <h2><?php echo $now['city']; ?>
                              <br><i><?php echo isset($now['summary'])?$now['summary']:''; ?></i>
                          </h2>
        </div>
      </div>
      <div class="col-sm-4 col-sm-offset-4">
      	 <div class="weather-text pull-right">
        <h3 class="degrees"><?php echo isset($now['max_temp'])?$now['max_temp']:''; ?></h3>
      </div>
      </div>
      
    </div>
   
    <div class="clearfix"></div>
    
  <!-- START weekly forecast -->
    <div class="row weather-days">
    <?php for($count = 1; $count <= 6 ; $count++): ?>
	
    	 <div class="col-sm-2">
        <div class="daily-weather">
          <h2 class="day"><?php echo isset($weekForecast[$count])?
          $weekForecast[$count]->getTime('D'):''; ?></h2>
          <h3 class="degrees"><?php echo
          isset($weekForecast[$count])? round($weekForecast[$count]->getMaxTemperature()):''; ?></h3>
          <span>
                 <!-- <canvas id="<?php echo 
                 isset($weekForecast[$count])?
                 $weekForecast[$count]->getIcon():'';?>" width="32" height="32">
                  </canvas>-->
                  <canvas id="icon<?php echo $count; ?>" width="32" height="32"></canvas>
                  <?php try{
if(isset($icon_names[$count])) 
$icon_names[$count] = $weekForecast[$count]->getIcon();
}
catch(Exception $e){} ?>
          </span>
        </div>
      </div>
    <?php endfor; ?>
    </div>
    <!-- // END weekly forecast -->
  </div>
</div>


<?php echo Asset::js('skycons.js'); ?>
<script>

  var skycons = new Skycons({"color": "#73879C"});
  
  // array of icon names
  var iconNames = <?php echo json_encode($icon_names); ?>;

  // ... lets add by the canvas DOM element itself.
  skycons.add(document.getElementById("icon1"), iconNames[1]);
  skycons.add(document.getElementById("icon2"), iconNames[2]);
  skycons.add(document.getElementById("icon3"), iconNames[3]);
  skycons.add(document.getElementById("icon4"), iconNames[4]);
  skycons.add(document.getElementById("icon5"), iconNames[5]);
  skycons.add(document.getElementById("icon6"), iconNames[6]);
  
  // icon for current conditions
  skycons.add(document.getElementById("icon7"), iconNames[7]);

  // start animation!
  skycons.play();
  
</script>

