<h2>Editing <span class='muted'>Measurement</span></h2>
<br>

<?php echo render('measurement/_form'); ?>
<p>
	<?php echo Html::anchor('measurement/view/'.$measurement->id, 'View'); ?> |
	<?php echo Html::anchor('measurement', 'Back'); ?></p>
