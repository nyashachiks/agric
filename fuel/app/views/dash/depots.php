<!-- load these guys only on dashboard so as to enhance speed for other pages-->
    
    <?php echo Asset::js('maplace.min.js');?>
    <script src="http://maps.google.com/maps/api/js?libraries=geometry&v=3.23&key=AIzaSyB-RkgD4mdnooCjhgXCMs2p8BGrU54ZN4U"></script>
    


<div class="col-md-12 col-sm-12 col-xs-12">
<div class="dashboard_graph x_panel">
  <div class="row x_title">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <h2>Market Places</h2>
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
        title:'Market 1 ',
        html:'<h5>GMB DURA</h5><br/><p> Dura Building, <br/>179 - 187 Samora Machel Avenue East, <br/> Harare</p>'
    },
    

    
    {
        
        lat:-18.9930968,
        lon: 32.6545771,
        zoom: 14,
        title:'Market 2',
        html:'<h5>Mutare Grains</h5><br/><p> Mutare Grains, <br/>Mutare</p>'
    },
     {
        
        lat:-17.3855863,
        lon: 30.379209,
        zoom: 14,
        title:'Market 3 ',
        html:'<h5>Grain Marketing Board Banket</h5><br/><p> Banket, <br/>Banket</p>'
    }]
}).Load();


});

</script>