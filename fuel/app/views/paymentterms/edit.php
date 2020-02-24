<h2>Editing <span class='muted'>Paymentterm</span></h2>
<br>

<?php echo render('paymentterms/_form'); ?>
<p>
	<?php echo Html::anchor('paymentterms/view/'.$paymentterm->id, 'View'); ?> |
	<?php echo Html::anchor('paymentterms', 'Back'); ?></p>
