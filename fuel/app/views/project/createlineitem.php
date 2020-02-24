<style>
.panel-body{
	height: 100px;
	overflow-y: scroll;
	
}

</style>
<?php echo Form::open();?>
<legend><?php echo $product['name']. Form::hidden('product_id',$product['id']);?></legend>
<p>
Project Name: <?php echo $project['name']. Form::hidden('project_id',$project['id']);?>
</p>
<?php echo render('project/_project',['region'=>$region,'condition'=>$condition,'soiltype'=>$soiltype,'stage'=>$stage,'costs'=>$costs,'task'=>$task,'project_data'=>$project_data]);?>

<div class=row>
<!--button-->

<div class="col-md-12">
	<button type="submit" class="btn btn-success">Add</button>
</div>
</div>
<?php echo Form::close();?>