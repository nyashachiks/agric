<h2>Editing <span class='muted'>Bid</span></h2>
<br>

<?php echo render('bid/_form'); ?>
<p>
	<?php echo Html::anchor('bid/view/'.$bid->id, 'View'); ?> |
	<?php echo Html::anchor('bid', 'Back'); ?></p>
