<h2>Viewing #<?php echo $stakeholder_Product->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $stakeholder_Product->name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $stakeholder_Product->description; ?></p>
<p>
	<strong>Pic:</strong>
	<?php Custom_Filehandler::ViewPic($stakeholder_Product->pic,'img-rounded','200px'); ?></p>
<p>
	<strong>Additional details:</strong>
	<?php echo $stakeholder_Product->additional_details; ?></p>

<?php echo Html::anchor('stakeholder/product/edit/'.$stakeholder_Product->id, 'Edit'); ?> |
<?php echo Html::anchor('stakeholder/product', 'Back'); ?>