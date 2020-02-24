
<?php 
$arr=[];
foreach($collection as $item):
$arr[$item->id]=$item->name;
endforeach;?>
<div class="form-group">
        <label for="<?php echo $name;?>" class="control-label col-md-3 col-sm-3 col-xs-12">
       <?php echo str_replace('_',' ',$name);?></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <?php echo Form::select($name.'[]','',$arr,['required'=>"required",
     'class'=>"form-control col-md-7 col-xs-12"]) ;?>  
        </div>
    </div>
