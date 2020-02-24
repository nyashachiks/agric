<h2>Viewing <span class='muted'>#<?php echo $dropdown->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $dropdown->name; ?></p>
<p>
	<strong>Url:</strong>
	<?php echo $dropdown->url; ?></p>

<?php echo Html::anchor('dropdown/edit/'.$dropdown->id, 'Edit'); ?> |
<?php echo Html::anchor('dropdown', 'Back'); ?>