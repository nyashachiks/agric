<h2>Editing Raw_material</h2>
<br>

<?php echo render('raw/material/_form'); ?>
<p>
	<?php echo Html::anchor('raw/material/view/'.$raw_material->id, 'View'); ?> |
	<?php echo Html::anchor('raw/material', 'Back'); ?></p>
