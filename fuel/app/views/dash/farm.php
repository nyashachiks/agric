<!-- load these guys only on dashboard so as to enhance speed for other pages-->
	
	<?php echo Asset::js('maplace.min.js');?>
	<script src="http://maps.google.com/maps/api/js?libraries=geometry&v=3.23&key=AIzaSyB-RkgD4mdnooCjhgXCMs2p8BGrU54ZN4U"></script>
	


<div class="col-md-12 col-sm-12 col-xs-12">
<div class="dashboard_graph x_panel">
  <div class="row x_title">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <h4>Farm Location</h4>
    </div>
    
  </div>
  <div class="x_content">
    <div class="demo-container">
      <div id="gmap" class="demo-placeholder" style="width: 100%; height:400px;"></div>
	<input type="hidden" id="lat" value="<?php echo $latitude; ?>" />
      	<input type="hidden" id="lon" value="<?php echo $longitude; ?>" />
      	<input type="hidden" id="title" value="<?php echo $title; ?>" />
    </div>
  </div>
</div>
</div>

<script>
	$(function() {
	var lati= parseFloat(document.getElementById('lat').value);
	var longi= parseFloat(document.getElementById('lon').value);
	
	new Maplace({
    show_markers: true,
    locations: [
    {
        lat: lati,
        lon: longi,
        zoom: 14,
        title: document.getElementById('title').value ,
        html: document.getElementById('title').value
    }]
}).Load();


});

</script>