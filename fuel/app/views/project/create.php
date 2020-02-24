<style>
.panel-body1{
	height: 100px;
	overflow-y: scroll;
	
}

</style>
<?php echo Form::open();?>
<legend><?php echo $product['name']. Form::hidden('product_id',$product['id']);?></legend>

<?php echo render('wizard/wizard',['region'=>$region,'condition'=>$condition,'soiltype'=>$soiltype,
'stage'=>$stage,'costs'=>$costs,'task'=>$task]);?>

<?php echo Form::close();?>