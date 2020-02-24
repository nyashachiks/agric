<h2>Editing <span class='muted'>Document</span></h2>
<br>

<?php echo render('document/_form'); ?>
<p>
	<?php echo Html::anchor('document/view/'.$document->id, 'View'); ?> |
	<?php echo Html::anchor('document', 'Back'); ?></p>
