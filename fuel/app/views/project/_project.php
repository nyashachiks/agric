<!--liberty white space-->
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
                <div class="x_title">
                                <h2>
                                	Project Criteria
                                </h2>
                                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                                <br/>
<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Region(s)</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Condition(s)</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Soil Type(s)</a>
    </li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Stage</a>
    </li>
    <li role="presentation"><a href="#task" aria-controls="settings" role="tab" data-toggle="tab">Task</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
 <?php echo render('project/_collection',array('collection'=>$region,'name'=>'region',
 'collectionToCheck'=>(isset($project_data)?$project_data->regions:'')
 ));?>
 </div>
    <div role="tabpanel" class="tab-pane" id="profile">
    	<?php echo render('project/_collection',
    	array('collection'=>$condition,'name'=>'condition',
    	'collectionToCheck'=>(isset($project_data)?$project_data->conditions:'')));?>	
    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
    <?php echo render('project/_collection',array('collection'=>$soiltype,'name'=>'soiltype',
    'collectionToCheck'=>(isset($project_data)?$project_data->soiltypes:'')));?>
    </div>
    <div role="tabpanel" class="tab-pane" id="settings">
    <?php echo render('project/_stage',array('collection'=>$stage,'name'=>'stage'));?>
    </div>
     <div role="tabpanel" class="tab-pane" id="task">
    <?php echo render('project/_stage',array('collection'=>$task,'name'=>'task'));?>
    </div>
  </div>

</div>
                                
                </div>
</div>
</div>
<!--end of liberty white space-->
<!--libs 2-->
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
                <div class="x_title">
                                <h2>Costs</h2>
                                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                                <br/>
<?php echo render('project/_cost',array('collection'=>$costs));
//echo render('project/_form'); ?>
                                
                </div>
</div>
</div>

<!--end of libs 2-->