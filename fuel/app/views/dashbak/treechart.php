<style>
	#tree-wrap {
		background-image: url(<?php echo Asset::get_file('schweppes.png','img'); ?>);
		background-repeat: no-repeat;
		
	}
	#root {
		width: 130px;
		height: 50px;
		background: #BAB8B8;
		color: #fff;
		text-align: center;
		border-radius: 30px;
		cursor: pointer;
		position: absolute;
		top: 97px;
		left: -6px;
		line-height: 50px;
	}
	
	#agent1 {
		width: 90px;
		height: 36px;
		background: #5b8fc9;
		color: #fff;
		text-align: center;
		border-radius: 30px;
		cursor: pointer;
		position: absolute;
		top: 33px;
		left: 185px;
		line-height: 36px;
	}
	#agent2 {
		width: 90px;
		height: 36px;
		background: red;
		color: #fff;
		text-align: center;
		border-radius: 30px;
		cursor: pointer;
		position: absolute;
		top: 175px;
		left: 185px;
		line-height: 36px;
	}
	#farmer1,#farmer2, #farmer3, #farmer4, #farmer5, #farmer6 {
		min-width: 90px;
		background: #1abb9c;
		color: #fff;
		text-align: center;
		border-radius: 30px;
		cursor: pointer;
		position: absolute;
		line-height: 25px;
		height: 25px;
	}
	#farmer1 {
		top: 0;
		left: 305px;
	}
	#farmer2 {
		top: 40px;
		left: 305px;
		width: 110px;
	}
	#farmer3 {
		top: 80px;
		left: 305px;
		width: 115px;
	}
	#farmer4 {
		top: 140px;
		left: 305px;
		width: 115px;
	}
	#farmer5 {
		top: 180px;
		left: 305px;
		width: 100px;
	}
	#farmer6 {
		top: 220px;
		left: 305px;
		
	}
	
</style>

<div class="col-md-5 col-sm-12 col-xs-12">
<div class="dashboard_graph x_panel" >
  <div class="row x_title">
    <div class="col-md-6">
      <h2>Agronomist network overview</h2>
	  
    </div>
  </div>
  <div class="x_content" id="tree-wrap" style="height: 255px">
  	<div id="root">GMB</div>
  	<div id="agent1">CEPHAS MAGAVA</div>
  	<div id="agent2">ALVIN VAFANA</div>
	
  	<div id="farmer1">Majorie Napata</div>
  	<div id="farmer2">Nyasha Chikwanda</div>
  	<div id="farmer3">Oliver Chimuka</div>
  	<div id="farmer4">Svodesai Sithole</div>
  	<div id="farmer5">Munyaradzi Muswerakuenda</div>
  	<div id="farmer6">Liberty Mataruse</div>
	
  </div>
</div>
</div>