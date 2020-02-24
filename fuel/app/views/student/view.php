<h2>Viewing #<?php echo $student->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $student->name; ?></p>
<p>
	<strong>Surname:</strong>
	<?php echo $student->surname; ?></p>

<?php echo Html::anchor('student/edit/'.$student->id, 'Edit'); ?> |
<?php echo Html::anchor('student', 'Back'); ?>