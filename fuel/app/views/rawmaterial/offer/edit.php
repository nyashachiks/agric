<br/>
<?php echo render('rawmaterial/offer/_form', array('form_label' => 'Edit raw material offer','btn_label' => 'Save')); ?>

<p>
	<?php echo Html::anchor('rawmaterial/offer/view/'.$rawmaterial_offer->brand_name, 'View'); ?> |
	<?php echo Html::anchor('rawmaterial/offer', 'Back'); ?>		
</p>
