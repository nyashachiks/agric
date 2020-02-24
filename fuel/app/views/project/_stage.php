
<?php foreach($collection as $item):?>
<div class=row>
<div class="col-md-1">
	<?php echo Form::radio($name.'[]',$item->id);?>
</div>
<div class="col-md-11">
<?php echo $item->name;?>	
</div>
</div>
<?php endforeach;?>