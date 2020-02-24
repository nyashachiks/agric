<h2>Viewing #<?php echo $testjo->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $testjo->name; ?></p>
<p>
	<strong>Id:</strong>
	<?php echo $testjo->id; ?></p>
<p>
	<strong>Address:</strong>
	<?php echo $testjo->address; ?></p>

<?php echo Html::anchor('testjo/edit/'.$testjo->id, 'Edit'); ?> |
<?php echo Html::anchor('testjo', 'Back'); ?>