<h2>Viewing <span class='muted'>#<?php echo $paymentterm->id; ?></span></h2>

<p>
	<strong>Code:</strong>
	<?php echo $paymentterm->code; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $paymentterm->description; ?></p>

<?php echo Html::anchor('paymentterms/edit/'.$paymentterm->id, 'Edit'); ?> |
<?php echo Html::anchor('paymentterms', 'Back'); ?>