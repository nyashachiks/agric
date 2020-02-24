<h2>Editing <span class='muted'>Profilepic</span></h2>
<br>

<?php echo render('profilepic/_form'); ?>
<p>
	<?php echo Html::anchor('profilepic/view/'.$profilepic->id, 'View'); ?> |
	<?php echo Html::anchor('profilepic', 'Back'); ?></p>
