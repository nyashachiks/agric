<h2>Editing <span class='muted'>Region</span></h2>
<br>

<?php echo render('region/_form'); ?>
<p>
	<?php echo Html::anchor('region/view/'.$region->id, 'View'); ?> |
	<?php echo Html::anchor('region', 'Back'); ?></p>
