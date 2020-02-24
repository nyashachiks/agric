<h2>Editing <span class='muted'>Season</span></h2>
<br>

<?php echo render('season/_form'); ?>
<p>
	<?php echo Html::anchor('season/view/'.$season->id, 'View'); ?> |
	<?php echo Html::anchor('season', 'Back'); ?></p>
