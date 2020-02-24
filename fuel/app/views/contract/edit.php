<h2>Editing <span class='muted'>Contract</span></h2>
<br>

<?php echo render('contract/_form'); ?>
<p>
	<?php echo Html::anchor('contract/view/'.$contract->id, 'View'); ?> |
	<?php echo Html::anchor('contract', 'Back'); ?></p>
