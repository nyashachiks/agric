<h2>Viewing <?php echo $budget->name; ?></h2>
		
	<p>
		<strong>Name:</strong>
		<?php echo $budget->name; ?>
	</p>
	<p>
		<strong>Product:</strong>
		<?php $product = Model_Product::find('all');
						foreach($product as $item)
							$arr[]=$item->name;
		echo $arr[$budget->product-1]; ?>
	</p>
	<p>
		<strong>Region:</strong>
		<?php echo Custom_UserUtility::$getRegions[$budget->region]; ?>
	</p>
		
	<p>
		<strong>Soil Type:</strong>
		<?php echo Custom_UserUtility::$getSoilType[$budget->soiltype]; ?>
	</p>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

<?php if ($activities):
//creating a count for the collapsing div
$collapseDivCount=0;
 ?>
			
				<?php foreach ($activities as $item): 
				//incrementing my div count
				$collapseDivCount++;
				?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="<?php echo $collapseDivCount; ?>">
      <h4 class="panel-title">
       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="<?php echo '#col'.$collapseDivCount; ?>" aria-expanded="false" aria-controls="collapseThree">
         <?php echo $item->name; ?>
        </a>
      </h4>
    </div>
   <div id="<?php echo 'col'.$collapseDivCount; ?>" class="panel-collapse collapse" 
   role="tabpanel" aria-labelledby="<?php echo '#'.$collapseDivCount; ?>">
      <div class="panel-body">
     <div class="row-fluid" style="padding-left: 10px;">
					<?php  
						$activity_id=$item->id;
						$inputs=Model_Input::query()->where('activity_id',$activity_id)->get();
						//echo Session::set('inputs', $inputs);
						
					echo render('input/indexview', array('inputs'=>$inputs, 'activity'=>$item->name));
					?>	
				</div>	
				<div class="row-fluid" style="padding-left: 10px;">
					<?php  
						$activity_id=$item->id;
						$farmguides=Model_Farmguide::query()->where('activity_id',$activity_id)->get();
						echo render('farmguide/indexview', array('farmguides'=>$farmguides, 'activity'=>$item->name));
					?>	
				</div>	
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  <?php else: ?>
		<p>No Activities.</p>
  <?php endif; ?>
  
</div>