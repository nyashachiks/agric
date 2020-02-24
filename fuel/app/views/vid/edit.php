<h2>Editing Vid</h2>
<br>

<?php echo render('vid/_form'); ?>
<p>
	<?php echo Html::anchor('vid/view/'.$vid->id, 'View'); ?> |
	<?php echo Html::anchor('vid', 'Back'); ?></p>
