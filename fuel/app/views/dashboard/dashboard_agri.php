<?php echo Asset::css('dashboard/jquery-ui.css');?>
<?php echo Asset::css('dashboard/sDashboard.css');?>
<?php echo Asset::js('dashboard/libs/jquery/jquery-1.8.2.js');?>
<?php echo Asset::js('dashboard/libs/jquery/jquery-ui.js');?>
<?php echo Asset::js('dashboard/libs/datatables/jquery.dataTables.js');?>
<?php echo Asset::js('dashboard/libs/flotr2/flotr2.js');?>
<?php echo Asset::js('dashboard/jquery-sDashboard.js');?>


<div id="weather">
	<a href="http://www.accuweather.com/en/zw/harare/353558/weather-forecast/353558" class="aw-widget-legal">
		<!--
		By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which 		can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in		English) which can be found at http://www.accuweather.com/en/privacy.
		-->
	</a>
	<div id="awcc1447250515550" class="aw-widget-current"  data-locationkey="" data-unit="c" data-language="en-us" 
		data-useip="true" data-uid="awcc1447250515550">
	</div>
	<script type="text/javascript" src="http://oap.accuweather.com/launch.js">
		
	</script>
</div>
<div id="gmap" style="width:100%;height:100%;">
	
</div>
<div id="productoffers">

	    	<?php echo render('productoffer/index_admin'); ?>
 </div>
 <div id="productoffers_history">

	    	<?php echo render('productoffer/index_history'); ?>
 </div>
 <div id="productoffers_rated">

	    	<?php echo render('productoffer/index_rated'); ?>
 </div>
 <div id="budgets">

	    	<?php echo render('budget/index'); ?>
 </div>
<div class="row">
	<ul id="myDashboard"></ul>
</div>
<script>
	var tableData = {
	    "aaData" : [["Buyer"],["Farmer"]],
	    "aoColumns" : [{
	        "sTitle" : "Subscriptions"
	    }
	]
	};
	var widgetDefinitions =
	[
	    
	    {
			widgetTitle : "Weather",
			widgetId : "weather",
			widgetContent : $("#awcc1447250515550")
		},
		{
			widgetTitle : "Map",
			widgetId : "farmmap",
			widgetContent : $("#gmap")
		},
		
		{
			widgetTitle : "Budget",
			widgetId : "budget",
			widgetContent : $("#budgets")
		},
		{ 
	        widgetTitle : "Products on Offer", //Title of the widget
	        widgetId: "products", //unique id for the widget
	        widgetContent: $("#productoffers"), //content for the widget#
	        
	    },
	    { 
	        widgetTitle : "Products History", //Title of the widget
	        widgetId: "products_history", //unique id for the widget
	        widgetContent: $("#productoffers_history"), //content for the widget#
	        
	    },
	    { 
	        widgetTitle : "Products Rated", //Title of the widget
	        widgetId: "products_rated", //unique id for the widget
	        widgetContent: $("#productoffers_rated"), //content for the widget#
	       
	    }
	                  
	 
]
$("#myDashboard").sDashboard({
    dashboardData : widgetDefinitions ,
    disableSelection : false // enables text selection on the dashboard      
});

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
