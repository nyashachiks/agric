<h2>Editing <span class='muted'>City</span></h2>
<br>

<?php echo render('city/_form'); ?>
<p>
	<?php echo Html::anchor('city/view/'.$city->id, 'View'); ?> |
	<?php echo Html::anchor('city', 'Back'); ?></p>
