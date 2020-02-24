<!-- load these guys only on dashboard so as to enhance speed for other pages-->
    
    <?php echo Asset::js('maplace.min.js');?>
    <script src="http://maps.google.com/maps/api/js?libraries=geometry&v=3.23&key=AIzaSyB-RkgD4mdnooCjhgXCMs2p8BGrU54ZN4U"></script>
    


<div class="col-md-12 col-sm-12 col-xs-12">
<div class="dashboard_graph x_panel">
  <div class="row x_title">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <h2>GMB DEPOTS</h2>
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
        
        lat:-17.8219694,
        lon: 31.0662899,
        zoom: 14,
        title:'GMB DURA',
        html:'<h5>GMB DURA</h5><br/><p> Dura Building, <br/>179 - 187 Samora Machel Avenue East, <br/> Harare</p>'
    },
    

    
    {
        
        lat:-18.9930968,
        lon: 32.6545771,
        zoom: 14,
        title:'Mutare Grains',
        html:'<h5>Mutare Grains</h5><br/><p> Mutare Grains, <br/>Mutare</p>'
    },
     {
        
        lat:-17.3855863,
        lon: 30.379209,
        zoom: 14,
        title:'Grain Marketing Board Banket',
        html:'<h5>Grain Marketing Board Banket</h5><br/><p> Banket, <br/>Banket</p>'
    },
    {
        
        
        lat:-18.5342739,
        lon: 32.115494,
        zoom: 14,
        title:'Grain Marketing Rusape',
        html:'<h5>Grain Marketing Board Rusape</h5><br/><p> Rusape, <br/>Rusape</p>'
    },
    
    {
        
        
        lat:-18.6267298,
        lon: 31.587297,
        zoom: 14,
        title:'GMB Wedza Depot ',
        html:'<h5>GMB Wedza Depot</h5><br/><p> Wedza, <br/>Wedza</p>'
    },
    {
        
        
        lat:-17.8810632,
        lon: 30.6822968,
        zoom: 14,
        title:'GMB Norton Depot ',
        html:'<h5>GMB Norton Depot</h5><br/><p> Endeavour Rd, Norton, <br/>Norton</p>'
    },
    {
        
        
        lat:-18.1322508,
        lon: 30.1372683,
        zoom: 14,
        title:'GMB Chegutu Depot ',
        html:'<h5>GMB Chegutu Depot</h5><br/><p> Chegutu, <br/>Chegutu</p>'
    },

	{	
        lat:-18.1833426,
        lon: 31.5442363,
        zoom: 14,
        title:'Grain Marketing Board ',
        html:'<h5>GMB Marondera Depot</h5><br/><p> Lot 6, Antwerp Rd, Marondera, <br/>Marondera</p>'
    },


	{
        lat:-17.8683696,
        lon: 30.968784,
        zoom: 14,
        title:'GMB Aspindale Depot ',
        html:'<h5>GMB Aspindale Depot</h5><br/><p> Aspindale, <br/>Harare</p>'
    },
	
	{
        lat:-19.020333,
        lon: 30.8934088,
        zoom: 14,
        title:'GMB Chivhu Depot ',
        html:'<h5>GMB Chivhu Depot</h5><br/><p> Chivhu, <br/>Chivhu</p>'
    },
	
	{
        lat:-17.1246445,
        lon: 31.9624028,
        zoom: 14,
        title:'GMB Mutawatawa Depot ',
        html:'<h5>GMB Mutawatawa Depot</h5><br/><p> Mutawatawa, <br/>Mutawatawa</p>'
    },
	
	{
        lat:-18.0334232,
        lon: 32.1657103,
        zoom: 14,
        title:'GMB Chiendambuya Depot ',
        html:'<h5>GMB Chiendambuya Depot</h5><br/><p> Chiendambuya, <br/>Chiendambuya</p>'
    },
	
	{
        lat:-17.3209975,
        lon: 31.3253218,
        zoom: 14,
        title:'Bindura Grain Marketing Board ',
        html:'<h5>GMB Bindura Depot</h5><br/><p> Bindura, <br/>Bindura</p>'
    },

	{
        lat:-19.6392312,
        lon: 31.1402748,
        zoom: 14,
        title:'GMB Gutu Depot ',
        html:'<h5>GMB Gutu Depot</h5><br/><p> Gutu, <br/>Gutu</p>'
    },
	
	{
        lat:-17.4177609,
        lon: 32.2215459,
        zoom: 14,
        title:'GMB Nyika Depot ',
        html:'<h5>GMB Nyika Depot</h5><br/><p> Nyika, <br/>Masvingo</p>'
    },
	
	{
        lat:-17.5935787,
        lon: 30.7195488,
        zoom: 14,
        title:'GMB Concession',
        html:'<h5>GMB Concession Depot</h5><br/><p> Concession, <br/>Concession</p>'
    },
	
	
	{
        lat:-18.1322508,
        lon: 30.1372683,
        zoom: 14,
        title:'GMB Chegutu',
        html:'<h5>GMB Chegutu Depot</h5><br/><p> Chegutu, <br/>Chegutu</p>'
    },
	
	
	{
        lat:-18.0950286,
        lon: 29.9060672,
        zoom: 14,
        title:'GMB Kadoma',
        html:'<h5>GMB Kadoma Depot</h5><br/><p> Kadoma, <br/>Kadoma</p>'
    },
	
	
	{
        lat:-18.0743119,
        lon: 30.5434467, 
        zoom: 14,
        title:'GMB Mhondoro, Mubayira',
        html:'<h5>GMB Mhondoro Mubayira Depot</h5><br/><p> Mhondoro Mubayira, <br/>Mhondoro Mubayira</p>'
    },
	
	
	{
        lat:-17.1649976,
        lon: 29.3873591,
        zoom: 14,
        title:'GMB Kariba',
        html:'<h5>GMB Kariba Depot</h5><br/><p> Kariba, <br/>Kariba</p>'
    },
	
	
	{
        lat:-17.3103737,
        lon: 29.806826,
        zoom: 14,
        title:'GMB Karoi',
        html:'<h5>GMB Karoi Depot</h5><br/><p> Karoi, <br/>Karoi</p>'
    },
	
	
	{
        lat:-17.5432963,
        lon: 30.2601573,
        zoom: 14,
        title:'GMB Lions Den Chinhoyi',
        html:'<h5>GMB Lions Den Chinhoyi Depot</h5><br/><p> Lions Den Chinhoyi, <br/>Lions Den Chinhoyi</p>'
    },
	
	
	{
        lat:-17.3491681,
        lon: 30.0436284,
        zoom: 14,
        title:'GMB Doma ',
        html:'<h5>GMB Doma Mhangura Depot</h5><br/><p> Doma Mhangura, <br/>Doma Mhangura</p>'
    },
	
	
	{
        lat:-17.7095241,
        lon: 30.1854702,
        zoom: 14,
        title:'GMB Murombedzi',
        html:'<h5>GMB Murombedzi Depot</h5><br/><p> Murombedzi, <br/>Murombedzi</p>'
    },
	
	{
		lat:-18.3901647,
        lon: 29.8581312,
        zoom: 14,
        title:'GMB Kwekwe Depot ',
        html:'<h5>GMB Kwekwe Depot</h5><br/><p> Kwekwe, <br/>Kwekwe</p>'
    },

	
	{
        lat:-20.847078,
        lon: 30.1936322,
        zoom: 14,
        title:'GMB Mataga',
        html:'<h5>GMB Mataga Depot</h5><br/><p> Mataga, <br/>Mataga</p>'
    },
	
	
	{
        lat:-19.0903414,
        lon: 29.4238208,
        zoom: 14,
        title:'GMB Zvishavane',
        html:'<h5>GMB Zvishavane Depot</h5><br/><p> Zvishavane, <br/>Zvishavane</p>'
    },
	
    
	{
        lat:-17.7710392,
        lon: 27.8479258,
        zoom: 14,
        title:'GMB Binga',
        html:'<h5>GMB Binga Depot</h5><br/><p> Binga, <br/>Binga</p>'
    },
	
	
	{
        lat:-19.1654572,
        lon: 28.3053489,
        zoom: 14,
        title:'GMB Plumtree',
        html:'<h5>GMB Plumtree Depot</h5><br/><p> Plumtree, <br/>Plumtree</p>'
    },
	
	{
        lat:-20.1688626,
        lon:28.5213004,
        zoom: 14,
        title:'GMB Bulawayo',
        html:'<h5>GMB Bulawayo</h5><p>Kelvin West, <br/>Bulawayo</p>'
    }]
}).Load();


});

</script>