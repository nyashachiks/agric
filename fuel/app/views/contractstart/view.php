<h2>Viewing #<?php echo $contractstart->id; ?></h2>

<!--p>
	<strong>Contract id:</strong>
	<?php echo $contractstart->contract_id; ?></p>
<p-->
	<strong>Startdate:</strong>
	<?php echo Date::forge($contractstart->startdate)->format("%d/%m/%Y "); ?></p>
	<p>
		<?php
		$contractapplication=Model_Contractapplication::find($contractstart->contract_id);
if(isset($contractapplication->project)){
	 echo render('contractstart/_projectsubreport.php',
	 ['project'=>$contractapplication->project,
	 'contactApplicationId'=>$contractapplication->id,
	 'timestamp'=>$contractstart->startdate]);
	 }
	 else
	 {
	 	echo "No project template was used!";
	 }
	 ?>
	</p>

<?php echo Html::anchor('contractstart/edit/'.$contractstart->id, 'Edit'); ?> |
<?php echo Html::anchor('contractstart', 'Back'); ?>