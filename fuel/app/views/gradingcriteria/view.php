<h2>Viewing <span class='muted'>#<?php echo $gradingcriterium->id; ?></span></h2>

<p>
	<strong>Crit name:</strong>
	<?php echo $gradingcriterium->crit_name; ?></p>
<p>
	<strong>Short name:</strong>
	<?php echo $gradingcriterium->short_name; ?></p>

<?php echo Html::anchor('gradingcriteria/edit/'.$gradingcriterium->id, 'Edit'); ?> |
<?php echo Html::anchor('gradingcriteria', 'Back'); ?>