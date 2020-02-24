

<?php echo render('sap/bp/_form', array('form_label' => 'Editing Sap Bp #'.$sap_bp->bp_num, 'btn_text'=> 'Edit')); ?>
<p>
	<?php echo Html::anchor('sap/bp/view/'.$sap_bp->id, 'View'); ?> |
	<?php echo Html::anchor('sap/bp', 'Back'); ?></p>
