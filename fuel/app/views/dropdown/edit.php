<h2>Editing <span class='muted'>Dropdown</span></h2>
<br>

<?php echo render('dropdown/_form'); ?>
<p>
	<?php echo Html::anchor('dropdown/view/'.$dropdown->id, 'View'); ?> |
	<?php echo Html::anchor('dropdown', 'Back'); ?></p>
