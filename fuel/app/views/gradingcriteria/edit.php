<h2>Editing <span class='muted'>Gradingcriterium</span></h2>
<br>

<?php echo render('gradingcriteria/_form'); ?>
<p>
	<?php echo Html::anchor('gradingcriteria/view/'.$gradingcriterium->id, 'View'); ?> |
	<?php echo Html::anchor('gradingcriteria', 'Back'); ?></p>
