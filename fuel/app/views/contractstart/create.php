<?php echo render('contractstart/_form', 
array('form_label' => 'Create Contractstart', 
'btn_text' => 'Create',
'contactApplicationId'=>$contractapplication->id)); ?>
<?php
if(isset($contractapplication->project)){
	 echo render('contract/_projectsubreport.php',
	 ['project'=>$contractapplication->project,
	 'contactApplicationId'=>$contractapplication->id]);
	 }
	 else
	 {
	 	echo "No project template was used!";
	 }
	 ?>