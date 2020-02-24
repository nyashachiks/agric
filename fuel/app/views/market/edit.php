<h2>Editing <span class='muted'>Market</span></h2>
<br>

<?php echo render('market/_form'); ?>
<p>
	<?php echo Html::anchor('market/view/'.$market->id, 'View'); ?> |
	<?php echo Html::anchor('market', 'Back'); ?></p>
