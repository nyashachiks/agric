<h2>Editing <span class='muted'>Structure</span></h2>
<br>

<?php echo render('structure/_form'); ?>
<p>
	<?php echo Html::anchor('structure/view/'.$structure->id, 'View'); ?> |
	<?php echo Html::anchor('structure', 'Back'); ?></p>
