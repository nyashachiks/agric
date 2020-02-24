<div class="row">
     <!-- Start Wizard -->
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Step 1<br />
                                              <small>Step 1 description</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2<br />
                                              <small>Step 2 description</small>
                                          </span>
                          </a>
                        </li>
                     
                       
                      </ul>
                      <div id="step-1">
                        <?php 
                        $arr=['region'=>$region,
                        'condition'=>$condition,
                        'soiltype'=>$soiltype,
                        //'stage'=>$stage,
                        'costs'=>$costs
                        ];
                        echo render('project/wizard/_stage1.php',['conditions'=>$arr]);?>
                      </div>
                      <div id="step-2">
                       
                       <div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
                <div class="x_title">
                                <h2>
<div class="form-inline">
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

</div></h2>
                                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                                
<?php echo render('project/wizard/_task.php',['task'=>$task,'costs'=>$costs]);?>
                                
                </div>
</div>
</div>

                      </div>
                      
                  

                    </div>
                    <!-- End wizard Content -->
                    
                    </div> <!-- // end .row -->
               

<?php echo Asset::js('jquery.smartWizard.js'); ?>

<script>
  $(document).ready(function() {
    $('#wizard').smartWizard();

    $('.buttonNext').addClass('btn btn-success');
    $('.buttonPrevious').addClass('btn btn-primary');
    $('.buttonFinish').addClass('btn btn-default');
  });
</script>