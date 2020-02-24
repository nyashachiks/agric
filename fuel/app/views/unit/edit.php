<h2>Editing <span class='muted'>Unit</span></h2>
<br>

<?php echo render('unit/_form'); ?>
<p>
	<?php echo Html::anchor('unit/view/'.$unit->id, 'View'); ?> |
	<?php echo Html::anchor('unit', 'Back'); ?></p>
