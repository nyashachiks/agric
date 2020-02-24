
<?php foreach($collection as $item):?>
<div class=row>
<div class="col-md-1">
	<?php echo Form::checkbox($name.'[]',$item->id,
	(isset($collectionToCheck)?(Custom_Helper::isChecked($item->id,$collectionToCheck)):FALSE));?>
</div>
<div class="col-md-11">
<?php echo $item->name;?>	
</div>
</div>
<?php endforeach;?>