<!-- load these guys only on dashboard so as to enhance speed for other pages-->
	
	<?php echo Asset::js('maplace.min.js');?>
	<script src="http://maps.google.com/maps/api/js?libraries=geometry&v=3.23&key=AIzaSyB-RkgD4mdnooCjhgXCMs2p8BGrU54ZN4U"></script>
	


<div class="col-md-12 col-sm-12 col-xs-12">
<div class="dashboard_graph x_panel">
  <div class="row x_title">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <h2>Marketplaces in Zimbabwe</h2>
    </div>
    
  </div>
  <div class="x_content">
    <div class="demo-container">
      <div id="gmap" class="demo-placeholder" style="width: 100%; height:400px;"></div>
    </div>
  </div>
</div>
</div>

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