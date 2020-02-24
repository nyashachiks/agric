<h2>Editing <span class='muted'>Branch</span></h2>
<br>

<?php echo render('branches/_form'); ?>
<p>
	<?php echo Html::anchor('branches/view/'.$branch->id, 'View'); ?> |
	<?php echo Html::anchor('branches', 'Back'); ?></p>
