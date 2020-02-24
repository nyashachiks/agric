<?php echo Form::open();?>
<?php echo Form::hidden('projectStageID',$projectStageID);?>
<div class="row">
     <!-- Start Wizard -->
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Step 1<br />
                                              <small>Tasks</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2<br />
                                              <small>Resources</small>
                                          </span>
                          </a>
                        </li>
                     
                       
                      </ul>
                     
                      <div id="step-1" align="center">
<p>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Task</h2>
<div class="clearfix"></div>
</div>
<div class="x_content">
<div class="form-inline">
  <div class="form-group">
    <label for="exampleInputEmail3">Task : </label>
      <?php 
    $arr=[];
    foreach($task as $item):
		$arr[$item->id]=$item->name;
	endforeach;
    echo Form::select('taskID','',$arr,['required'=>"required",
     'class'=>"form-control",'id'=>'stage']) ;?> 
    <!--input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email"-->
  </div>
<div class="form-group">
    <label for="exampleInputEmail3">Duration : </label>
      <?php 
    $arr=[];
    foreach($task as $item):
		$arr[$item->id]=$item->name;
	endforeach;
    echo Form::input('duration','',['required'=>"required",
     'class'=>"form-control",'id'=>'stage']) ;?> 
     <label for="exampleInputEmail3">day(s) </label>
    <!--input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email"-->
  </div>

</div>
</div>
</div>
</div>
</p>

                      </div>
                      
                     <div id="step-2">
<p>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Resources</h2>
<div class="clearfix"></div>
</div>
<div class="x_content">
<?php echo render('project/_cost',array('collection'=>$costs));
//echo render('project/_form'); ?>
</div>
</div>
</div>
</p>                      </div>

                    </div>
                    <!-- End wizard Content -->
                    
                    </div> <!-- // end .row -->
<?php echo Form::close();?>               

<?php echo Asset::js('jquery.smartWizard.js'); ?>

<script>
  $(document).ready(function() {
    $('#wizard').smartWizard();

    $('.buttonNext').addClass('btn btn-success');
    $('.buttonPrevious').addClass('btn btn-primary');
    $('.buttonFinish').addClass('btn btn-default');
  });
</script>