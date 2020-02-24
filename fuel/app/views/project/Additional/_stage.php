<div class="form-group">
    <label for="exampleInputEmail3">Stage : </label>
      <?php 
    $arr=[];
    foreach($stage as $item):
		$arr[$item->id]=$item->name;
	endforeach;
    echo Form::select('stage','',$arr,['required'=>"required",
     'class'=>"form-control",'id'=>'stage']) ;?> 
    <!--input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email"-->
  </div>
