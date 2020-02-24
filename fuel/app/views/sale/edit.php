<h2>Editing <span class='muted'>Sale</span></h2>
<br>

<?php echo render('sale/_form'); ?>
<p>
	<?php echo Html::anchor('sale/view/'.$sale->id, 'View'); ?> |
	<?php echo Html::anchor('sale', 'Back'); ?></p>
