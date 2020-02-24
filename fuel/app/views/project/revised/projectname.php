
<?php echo Form::open();?>
<div class="x_panel">
		<div class="x_title">
			<span class="step_no">1</span><h2>Project Name</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br>
		<div id="step-1" class="content" style="display: block;">
                        <div class="form-horizontal form-label-left">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="projectname">Project Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                         <input required="required" class="form-control col-md-7 col-xs-12" name="name" 
                         value="<?php echo (isset($dataToRestore['projectname'])?
                         $dataToRestore['projectname']:'');?>" type="text" id="form_name">  
                              
                            </div>
                          </div>
                          
<div class="form-group">
        <label for="Region" class="control-label col-md-3 col-sm-3 col-xs-12">
       Region</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select required="required" class="form-control col-md-7 col-xs-12" name="Region[]" 
          id="form_Region[]">
     <?php $region= Model_Region::find('all');
     	foreach($region as $item):?>
     	<option value="<?php echo $item->id;?>" 
     	<?php echo (isset($dataToRestore['regionID'])?(
     	$dataToRestore['regionID']==$item->id?'selected="selected"':''
     	):'');?>
     	>
     	<?php echo $item->name;?>
     		
     	</option>
		<?php endforeach;?>
</select>  
        </div>
    </div>
                           
<div class="form-group">
        <label for="Soil_Type" class="control-label col-md-3 col-sm-3 col-xs-12">
       Soil Type</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select required="required" class="form-control col-md-7 col-xs-12" name="Soil_Type[]" id="form_Soil_Type[]">
	<?php $soil= Model_Soiltype::find('all');
     	foreach($soil as $item):?>
     	<option value="<?php echo $item->id;?>" 
     	<?php echo (isset($dataToRestore['soiltypeID'])?(
     	$dataToRestore['soiltypeID']==$item->id?'selected="selected"':''
     	):'');?>
     	>
     	<?php echo $item->name;?>
     		
     	</option>
		<?php endforeach;?>
</select>  
        </div>
    </div>
               			
<div class="form-group">
        <label for="Condition" class="control-label col-md-3 col-sm-3 col-xs-12">
       Condition</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select required="required" class="form-control col-md-7 col-xs-12" name="Condition[]" id="form_Condition[]">
	<?php $condition =Model_Condtion::find('all');
     	foreach($condition as $item):?>
     	<option value="<?php echo $item->id;?>" 
     	<?php echo (isset($dataToRestore['conditionID'])?(
     	$dataToRestore['conditionID']==$item->id?'selected="selected"':''
     	):'');?>
     	>
     	<?php echo $item->name;?>
     		
     	</option>
		<?php endforeach;?>
</select>  
        </div>
    </div>
    <div class="form-group">
    	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="expected_yield">
    		Expected Yield 
    		<span class="required"> / Hectare</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        	<input required="required" class="form-control col-md-7 col-xs-12" name="expected_yield" 
                         value="<?php echo (isset($dataToRestore['expected_yield'])?
                         $dataToRestore['expected_yield']:'');?>" type="text" id="expected_yield">  
       </div>
    </div>
    
    <div class="form-group">
        <div class="control-label col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <button class="btn btn-primary">Next</button>
        </div>
    </div>
          
               
                         

                        </div>                     
                         </div>

		</div>
	</div>
<?php echo Form::close();?>	
	
	
	