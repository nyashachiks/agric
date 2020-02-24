<h2>Editing <span class='muted'>Grainreceipt</span></h2>
<br>

<?php echo render('grainreceipts/_form'); ?>
<p>
	<?php echo Html::anchor('grainreceipts/view/'.$grainreceipt->id, 'View'); ?> |
	<?php echo Html::anchor('grainreceipts', 'Back'); ?></p>
