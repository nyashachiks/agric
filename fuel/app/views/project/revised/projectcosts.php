<div class="x_panel">
		<div class="x_title">
			<span class="step_no">4</span><h2>Project Resources 	 	</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br>
		<?php if(isset($project_Stage_Task)):?>
	<?php echo Form::open();?>	
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php 
$count=-1;
foreach($project_Stage_Task as $item):
$count++;
?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne<?php echo $item->id;?>">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" 
        href="#collapseOne<?php echo $item->id;?>" aria-expanded="true" aria-controls="collapseOne">
          <?php echo $item->task->name;?>
        </a>
        <div class="pull-right">
        	Duration  <?php echo $item->duration;?> day(s)
        </div>
      </h4>
    </div>
    <div id="collapseOne<?php echo $item->id;?>" class="panel-collapse collapse 
    <?php echo ($count==0?'in':'')?>" 
    role="tabpanel" aria-labelledby="headingOne<?php echo $item->id;?>">
      <div class="panel-body">
     <table  class="table table-bordered table-striped table-compressed " style="width: 100% !important">
	<thead>
		<tr>
			<th>&nbsp;</th>
			<th>Cost</th>
			<th>Quantity</th>
			<th>Unit(s) Required</th>
			<th>Unit Price</th>
			<th>Affected by Yield</th>
			<td>Notes</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach($variableCosts as $sub):?>
		<tr>
			<td><input name="selected[]" value="<?php echo $item->id.'_'. $sub->id;?>" type="checkbox" id="form_check[]"></td>
			<td>
			<?php echo $sub->name;?>	
			</td>
			<td>
			<?php echo $sub->units->name;?>
			</td>
			<td>
			<input class="col-md-2 form-control"  name="qty<?php echo $item->id.'_'. $sub->id;?>" value="" type="text"></td>
			<td>
			<input class="col-md-2 form-control"  name="unitprice<?php echo $item->id.'_'. $sub->id;?>"
			 value="" type="text">			</td>
			
			
			<td><select class="col-md-4 form-control" id="yield1" 
			name="pertonne<?php echo $item->id.'_'. $sub->id;?>">
	<option value="0">No</option>
	<option value="1">Yes</option>
</select></td>
			<td><textarea cols="20" rows="2" name="notes<?php echo $item->id.'_'. $sub->id;?>" class="col-md-4 form-control">				
			</textarea> </td>
			
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
       
      </div>
    </div>
  </div>
<?php endforeach;?>
</div>
 <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12" align="right">
          <a href="<?php echo Uri::create('project/addprojectTask/costs');?>"
           type="button" class="btn btn-warning">Previous</a>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <button class="btn btn-primary">Finish</button>
        </div>
    </div>
  <?php echo Form::close();?>  
<?php else:?>
<label class="danger">No Records Found</label>
<?php endif;?>
		</div>
	</div>
	
	
	
	
	
