<h2>New <span class='muted'>Region_condition</span></h2>
<br />
<?php echo Form::open(array("class"=>"form-horizontal")); ?>
<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
<?php //echo render('region/condition/_form'); ?>
<?php foreach($region as $item):?>
		
		
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  		<div class="panel panel-default">
    		<div class="panel-heading" role="tab" id="heading<?php echo $item->id;?>">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion"
         href="#ID<?php echo $item->id;?>" aria-expanded="true" aria-controls="collapseOne">
          <?php echo $item->name;?>
        </a>
      </h4>
    </div>
    <div id="ID<?php echo $item->id;?>" class="panel-collapse collapse" 
    role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
      <!--section for sub item-->
			<?php
			
			foreach($item->conditions as $stage):
			
			?>
			<?php echo render('region/condition/product/_form',
			array('regionID'=>$item->id, 'condition'=>$stage,'products'=>$products)); ?>
			
			<?php
			 endforeach;
			 ?>
      </div>
    </div>
  </div>
  </div>
			
			
			
		<?php //endif;?>
		<?php endforeach;?>

		
	
<?php echo Form::close(); ?>
