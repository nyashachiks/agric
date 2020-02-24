<h2>Viewing <span class='muted'><?php echo $conversion->name; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $conversion->name; ?></p>
<p>
	<strong>Quantity:</strong>
	<?php echo $conversion->quantity; ?></p>
<p>
	<strong>Measurement id:</strong>
	<?php echo $conversion->measurement->unit; ?></p>

<?php echo Html::anchor('conversion/edit/'.$conversion->id, 'Edit'); ?> |
<?php echo Html::anchor('conversion', 'Back'); ?>