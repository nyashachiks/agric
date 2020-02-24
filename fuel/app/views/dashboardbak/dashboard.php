
 <div class="right_col" role="main">
 <div class="">
  <?php //Debug::dump(
 // Model_Product::getProductCount());die;//getTotalQuantityBidded());die;
 $allprod= Model_Product::getTotalQuantityBidded("Mazhanje");
 $maize = []; // = Guava , for the demo
foreach($allprod as $item) {
   // $maize[] = [$item['bidmonth']-1,$item['quantity']];
    $maize[] = [$item['bidmonth']-0,$item['quantity']];
}
$allprod= Model_Product::getTotalQuantityBidded("Peaches");
 $Peaches = []; // = tomatoes! for the demo
foreach($allprod as $item) {
    $Peaches[] = [$item['bidmonth']-1,$item['quantity']];
   // $Peaches[] = [$item['bidmonth']-0,$item['quantity']];
}
$allprod= Model_Product::getTotalQuantityBidded("Mango");
 $Mango = [];
foreach($allprod as $item) {
    //$Mango[] = [$item['bidmonth']-1,$item['quantity']];
    $Mango[] = [$item['bidmonth']-0,$item['quantity']];
}
 
 	//Debug::dump($arr);die;
 ?>
 <?php echo render('dash/tiles'); ?>
 
 <?php if(Model_User::is_ADMIN()): ?>
 <div class="row">
 		 <?php echo render('dash/tiles_second'); ?>
 		 
 </div>
 <?php else: ?>
 <?php if(!Model_User::is_FARMER()): ?>
 	<div class="row">
	 	<?php echo render('dash/graph_non_admin'); ?>
	 </div>
	<?php endif; ?>
 <?php endif; ?>
 
 <!-- subs widget -->
	 <div class="row">
		
		 
		 <?php 
		 	
		 		if($there_is_internet == true): 
		 ?>
		 	<?php echo render('dash/weather'); ?>
		 <?php else: ?>
		 	<?php echo render('dash/weather_no_internet'); ?>
			
		 <?php endif; ?>
		 
		
		</div>
		
		 
		
	 </div>
 <!-- // subs widget -->
 
<div class="row">
 	<?php // echo render('dash/markets'); ?>
 </div>
 
 	
 </div>
 </div>
 
 
<!-- lets attach JAVASCRIPT stuff here -->
    <?php echo Asset::js(array(
    	'jquery.min.js',
    	'bootstrap.min.js',
    	'fastclick.js',
    	'nprogress.js',
    	'Chart.min.js',
    	'jquery.sparkline.min.js',
    	'raphael.min.js',
    	'morris.min.js',
    	'skycons.js',
    	'jquery.flot.js',
    	'jquery.flot.time.js',
    	'jquery.flot.selection.js',
    	'jquery.flot.stack.js',
    	'jquery.flot.resize.js',
    	'jquery.flot.orderBars.js',
    	'date.js',
    	'jquery.flot.spline.js',
    	'curvedLines.js',
    	'moment.min.js',
    	'daterangepicker.js',
    	'iCheck/icheck.min.js',
    	'custom.min.js'
    )); ?>
<!-- // end attach JS -->  

    <!-- Flot -->
    <?php if(!Model_User::is_FARMER() || Model_User::is_ADMIN()): ?>
    <script>
     $(function() {
var income = [[0,100],[1,9]];
 
var data2 = [[0,-1]];;

var data = [
        {
            data: <?php echo json_encode($maize); ?>,
            color: '#409628',
            label:'Wheat',
            lines: {
					show: true,
					lineWidth: 1
				},
				shadowSize: 0
        },    
         {
            data: <?php echo json_encode($Peaches); ?>,
            color: '#400528',
            label:'Sorghum',
            lines: {
					show: true,
					lineWidth: 1
				},
				shadowSize: 0
        }  ,
        {
            data: <?php echo json_encode($Mango); ?>,
            color: '#fa1503',
            label:'Maize',
            lines: {
					show: true,
					lineWidth: 1
				},
				shadowSize: 0
        }  
    ];

var options = {
    xaxis: { ticks:[[0,'Aug'],[1,'Sept'],[2,'Oct'],[3,'Nov'],[4,'Dec'],[5,'Jan'],[6,'Feb'],
    [7,'Mar'],[8,'Apr'],[9,'May'],[10,'June'],[11,'July']]}
};

	$.plot($("#placeholder3xx3"), data, options);	
	});
     
    </script>
    <!-- /Flot -->
    <?php endif; ?>
    
    <!-- jQuery Sparklines -->
    <script>
     
    </script>
    <!-- /jQuery Sparklines -->
    
        <!-- bootstrap-daterangepicker -->
    <script type="text/javascript">
      $(document).ready(function() {

        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        };

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2012',
          maxDate: '12/31/2015',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function() {
          console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });
        $('#options1').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
          $('#reportrange').data('daterangepicker').remove();
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->
    
      <!-- Skycons -->
    <script>
      var icons = new Skycons({
          "color": "#73879C"
        }),
        list = [
          "clear-day", "clear-night", "partly-cloudy-day",
          "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
          "fog"
        ],
        i;

      for (i = list.length; i--;)
        icons.set(list[i], list[i]);

      icons.play();
    </script>
    <!-- /Skycons -->
    
