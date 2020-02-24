<h2>Editing Stakeholder_Product</h2>
<br>

<?php echo render('stakeholder/product/_form', 
array('form_label' => 'Edit Stakeholder_Product', 'btn_text' => 'Edit')); ?>
<p>
	<?php echo Html::anchor('stakeholder/product/view/'.$stakeholder_Product->id, 'View'); ?> |
	<?php echo Html::anchor('stakeholder/product', 'Back'); ?></p>
