<h2>Editing <span class='muted'>Conversion</span></h2>
<br>

<?php echo render('conversion/_form'); ?>
<p>
	<?php echo Html::anchor('conversion/view/'.$conversion->id, 'View'); ?> |
	<?php echo Html::anchor('conversion', 'Back'); ?></p>
