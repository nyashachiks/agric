
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
                <div class="x_title">
                                <div class="form-inline">
  <div class="form-group">
    <label for="exampleInputEmail3">Stage : </label>
      <input class="form-control" id="disabledInput" type="text" 
      placeholder="Disabled input here..." disabled>
    <!--input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email"-->
  </div>

</div>
                                <div class="clearfix"></div>
                </div>
                <div class="x_content">
<?php echo render('project/wizard/_task.php',['task'=>$task,'costs'=>$costs]);?>
                                
                </div>
</div>
</div>

<?php
//Debug::dump($project_stage);
//echo render('project/wizard/_task.php',['task'=>$task,'costs'=>$costs]);
?>
