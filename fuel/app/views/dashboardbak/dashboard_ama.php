<?php echo Asset::css('dashboard/jquery-ui.css');?>
<?php echo Asset::css('dashboard/sDashboard.css');?>
<?php echo Asset::js('dashboard/libs/jquery/jquery-1.8.2.js');?>
<?php echo Asset::js('dashboard/libs/jquery/jquery-ui.js');?>
<?php echo Asset::js('dashboard/libs/datatables/jquery.dataTables.js');?>
<?php echo Asset::js('dashboard/libs/flotr2/flotr2.js');?>
<?php echo Asset::js('dashboard/jquery-sDashboard.js');?>

<div class="row">
	<!-- left widgets -->
	<div class="col-md-6 col-sm-12">
		<div class="panel panel-default" style="max-height: 250px">
			<div class="panel-heading">
				<h3 class="panel-title">Budgets</h3>
			</div>
			<div class="panel-body">
				<?php echo render('budget/widget'); ?>
			</div>
		</div>
	</div>
	<!-- //left widgets -->
	
	<!-- right widgets -->
	<div class="col-md-6 col-sm-12">
	<div class="panel panel-default" style="height: 250px">
				<div class="panel-heading">
					<h3 class="panel-title">Weather</h3>
				</div>
				<div class="panel-body">
					
					<div id="weather">
						<a href="http://www.accuweather.com/en/zw/harare/353558/weather-forecast/353558" class="aw-widget-legal">
						</a>
						<div id="awcc1447250515550" class="aw-widget-current"  data-locationkey="" data-unit="c" data-language="en-us" 
							data-useip="true" data-uid="awcc1447250515550">
						</div>
						<script type="text/javascript" src="http://oap.accuweather.com/launch.js">
							
						</script>
					</div>
					
				</div>
		</div>
	</div>
	<!-- //right widgets -->
	
</div>

<!-- map widget -->
<div class="row-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Markets</h3>
		</div>
		<div class="panel-body" id="gmap" style="width: 100%; height: 300px;">
			
		</div>
	</div>
</div>
<!-- //map widget -->

<script>
	
$(function() {
	
	new Maplace({
    show_markers: true,
    locations: [
    {
        lat:-17.859656,
        lon: 31.038168,
        zoom: 14,
        title:'Mbare Musika',
        html:'<h5>Mbare Musika</h5>'
    },
    {
        lat:-19.451392,
        lon: 29.815155,
        zoom: 14,
        title:'Kudzanayi Market',
        html:"<h5>Kudzanayi Market</h5>"
    },
    {
        lat:-20.137287,
        lon: 28.573415,
        zoom: 14,
        title:'Emkambo',
        html:"<h5>Emkambo</h5>"
    },
    {
        lat:-17.3013062,
        lon: 31.319849,
        zoom: 14,
        title:'Bindura Agriculture Market ',
        html:"<h5>Bindura Agriculture Market </h5>"
    },
    {
        lat:-20.151225,
        lon: 28.586131,
        zoom: 14,
        title:'Market  Street ',
        html:"<h5>Market  Street </h5>"
    },
    {
        lat: -18.138015,
        lon: 30.147383,
        zoom: 14,
        title:'Chegutu Roadside Market',
        html:"<h5>Chegutu Roadside Market</h5>"
    },
    {
        lat:-17.365266,
        lon: 30.193566,
        zoom: 14,
        title:'Chinhoyi Agriculture Market',
        html:"<h5>Chinhoyi Agriculture Market</h5>"
    },
    {
        lat:-18.019782,
        lon: 31.067907,
        zoom: 14,
        title:'Guzha Market Chikwanha ',
        html:"<h5>Guzha Market – Chikwanha </h5>"
    },
    {
        lat:-18.210967,
        lon: 28.486396,
        zoom: 14,
        title:'Gokwe South Markets ',
        html:"<h5>Bomba, Njelele, Machengere, Gawa and Munegiwa Markets </h5>"
    },
    {
        lat:-20.290681,
        lon: 28.938308,
        zoom: 14,
        title:'Esigodini Market  ',
        html:"<h5>Esigodini Market </h5>"
    },
    {
        lat:-17.881749,
        lon:30.981896,
        zoom: 14,
        title:'Highfield Lusaka Agriculture Market',
        html:"<h5>Lusaka Agriculture Market</h5>"
    },
    {
        lat:-18.920133,
        lon:29.823655,
        zoom: 14,
        title:'Kwekwe Agriculture Market',
        html:"<h5>Kwekwe Agriculture Market</h5>"
    },
    {
        lat:-18.976662,
        lon:32.669288,
        zoom: 14,
        title:'Sakubva Agriculture Market',
        html:"<h5>Sakubva Agriculture Market</h5>"
    },
    {
        lat:-20.095739,
        lon:31.615219,
        zoom: 14,
        title:'Masvingo Markets',
        html:"<h5>Bikita, Garikai, Nyika and Tafara Markets</h5>"
    },
    {
        lat:-20.313941,
        lon:30.054968,
        zoom: 14,
        title:'Zvishavane Markets',
        html:"<h5>Hama maoko and Mandava Agriculture Markets</h5>"
    }]
}).Load();


});
</script>
