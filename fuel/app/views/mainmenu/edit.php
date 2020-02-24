
<?php echo render('mainmenu/_form', array('form_label' => 'Edit main menu', 'btn_label' => 'Save')); ?>
<p>
	<?php echo Html::anchor('mainmenu/view/'.$mainmenu->id, 'View'); ?> |
	<?php echo Html::anchor('mainmenu', 'Back'); ?></p>
