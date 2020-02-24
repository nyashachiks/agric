<h2>Editing <span class='muted'>Depot</span></h2>
<br>

<?php echo render('depot/_form'); ?>
<p>
	<?php echo Html::anchor('depot/view/'.$depot->id, 'View'); ?> |
	<?php echo Html::anchor('depot', 'Back'); ?></p>
