<?php

// init with the API key
//$f = new ForecastIO("535dd83e728190b8e669a851f4fc4825");

/* for testing we use 
---------------------

	lat -17.8082294 
	long 31.075727500000003
	
*/


$now = array();

$req = Session::get('array');

$req = Session::get('rq');
if ( $req === false )
{
    echo "no";
}
$i = 10;
$now['icon'] = Session::get('icon');
	$now['summary'] = Session::get('summary');
	$now['city'] = Session::get('city');
	
	$now['max_temp'] =  Session::get('max_temp');
	
	
	$now['day']  =  Session::get('day');
	$now['time'] = Session::get('time');

// holds a list of icon names for respective forecast days
$icon_names    =  array();
@$icon_names[7] = $now['icon'];


$days = Session::get('dy');
$temp = Session::get('tmp');
$icon = Session::get('icn');

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
          <h2 class="day"><?php echo isset($days[$count])? $days[$count]:''; ?></h2>
          <h3 class="degrees"><?php echo isset($temp[$count])? round($temp[$count]):'';?></h3>
          <span>
                 <!-- <canvas id="<?php echo 
                 isset($icon[$count])?
                  $icon[$count]:'';?>" width="32" height="32">
                  </canvas>-->
                  <canvas id="icon<?php echo $count; ?>" width="32" height="32"></canvas>
                  <?php try{
if(isset($icon_names[$count])) 
$icon_names[$count] = $icon[$count];
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

