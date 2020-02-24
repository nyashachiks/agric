<h2>New <span class='muted'>Region_condition</span></h2>
<br />
<?php echo Form::open(array("class"=>"form-horizontal")); ?>
<?php //echo render('region/condition/_form'); ?>
<?php foreach($region as $item):

//Debug::dump(isset($item->conditions[1])?'yes':'no');die;
?>
		<?php //if(count($item->product_variablecosts)>0):?>
		
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
			//Debug::dump($item->product_variablecosts);
			foreach($condition as $stage):
			?>
			
				<?php echo Form::checkbox('regionid_conditionid[]',$item->id.'|'.$stage->id,
				isset($item->conditions[$stage->id])?TRUE:FALSE);?>
			
			
			<?php echo $stage->name;?>	
			
			<?php
			 endforeach;
			 ?>
      </div>
    </div>
  </div>
  </div>
			
			
			
		<?php //endif;?>
		<?php endforeach;?>

		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>
