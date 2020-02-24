<div class="panel panel-default">
<div class="panel-heading">
<a data-toggle="collapse" href="#demo<?php echo $condition->id;?>"
 type="button"><?php echo $condition->name;?></a>
</div>
<div  id="demo<?php echo $condition->id;?>" class="collapse">
<div class="panel-body">
<?php foreach($products as $product):
			?>
			<div class="col-md-12">
				<?php echo Form::checkbox('regionid_conditionid_productid[]',$regionID.'|'.$condition->id
				.'|'.$product->id);
				//isset($item->conditions[$stage->id])?TRUE:FALSE);?>
			
			
			<?php echo $product->name;?>	
			</div>
			<?php endforeach;?>
</div>
</div>
</div>
