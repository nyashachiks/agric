<h2>Editing <span class='muted'>Material</span></h2>
<br>

<?php echo render('material/_form'); ?>
<p>
	<?php echo Html::anchor('material/view/'.$material->id, 'View'); ?> |
	<?php echo Html::anchor('material', 'Back'); ?></p>
