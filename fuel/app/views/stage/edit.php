<h2>Editing <span class='muted'>Stage</span></h2>
<br>

<?php echo render('stage/_form'); ?>
<p>
	<?php echo Html::anchor('stage/view/'.$stage->id, 'View'); ?> |
	<?php echo Html::anchor('stage', 'Back'); ?></p>
