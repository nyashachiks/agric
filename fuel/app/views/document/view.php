<h2>Viewing <span class='muted'>#<?php echo $document->id; ?></span></h2>

<p>
	<strong>User id:</strong>
	<?php echo $document->user_id; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $document->description; ?></p>
<p>
	<strong>Saved as:</strong>
	<?php echo $document->saved_as; ?></p>
<p>
	<strong>Actual name:</strong>
	<?php echo $document->actual_name; ?></p>

<?php echo Html::anchor('document/edit/'.$document->id, 'Edit'); ?> |
<?php echo Html::anchor('document', 'Back'); ?>