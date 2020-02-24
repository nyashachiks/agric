<?php //Debug::dump($conditions);die;?>
<div class="form-horizontal form-label-left">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                             for="projectname">Project Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                         <?php echo Form::input('name','',['required'=>"required",
                         'class'=>"form-control col-md-7 col-xs-12"]) ;?>  
                              
                            </div>
                          </div>
                          <?php echo render('project/wizard/_collectioncombo',
                          ['collection'=>$conditions['region'],'name'=>'Region',
                          ]);?>
                           <?php echo render('project/wizard/_collectioncombo',
                          ['collection'=>$conditions['soiltype'],'name'=>'Soil_Type',
                          ]);?>
               			<?php echo render('project/wizard/_collectioncombo',
                          ['collection'=>$conditions['condition'],'name'=>'Condition',
                          ]);?>          
               
                         

                        </div>