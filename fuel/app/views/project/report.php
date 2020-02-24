

<?php if(isset($project)):?>

<!--a class="btn btn-primary" 
href="<?php echo Uri::base().'project/lineitem/'.
$project->product->id.'/'.$project->product->name.
'/'.$project->id.'/'.$project->name;?>">Add New</a-->

<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
                <div class="x_title">
                      <div class="pull-left"><strong>Name :</strong>	<?php echo $project->name;?>
</div>
		<div class="pull-right">
			<strong>Product :</strong><?php echo $project->product->name;?>
		</div>
                                <div class="clearfix"></div>
                </div>
                <div class="x_content">
 <div class="row">
<div class="col-md-6">
			<p>
				<strong>Region :</strong> 
				<?php echo render('project/_subheadingreport',array('collection'=>$project->regions));?>
			</p>
			<p>
				<strong>Soil Type :</strong> 
				<?php echo render('project/_subheadingreport',array('collection'=>$project->soiltypes));?>
			</p>
		</div>
		<div class="col-md-6">
			<p>
				<strong>Condition :</strong> 
				<?php echo render('project/_subheadingreport',array('collection'=>$project->conditions));?>
			</p>
		</div>
                  </div> 
                </div>
</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
<a class="btn btn-success btn-lg" 
href="<?php echo Uri::base().'project/addline/'.
$project->id;?>">Add Stage
</a>
<a class="btn btn-primary btn-lg" 
href="<?php echo Uri::base().'project/Arrange/'.
$project->id;?>">Arrange Stages
</a>
<a class="btn btn-info btn-lg" 
href="<?php echo Uri::base().'project/gnattchart/'.
$project->id;?>">View Gantt Chart
</a>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
                <div class="x_title">
                                <h2>Project Outline</h2>
                                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                                <br/>
	
	<?php
	 echo render('project/_subreport.php',['project'=>$project]);
	 //echo render('project/_subreportGraph.php',['project'=>$project]);
	 
	 ?>
                                
                </div>

</div>
</div>

<?php else:?>
<a class="btn btn-primary" href="<?php echo Uri::base().'project/create/'.
$product['id'].'/'.$product['name'];?>" >
Add New</a>
<?php
	echo "<div class='alert alert-warning'>No Record has yet been captured</div>";
	endif;?>	
