<h3>Viewing Contract application for <span class='muted'><?php echo $contractapplication->farm->name; ?>  </span></h3>

<p>
	<strong>Farm Name:</strong>
	<?php echo $contractapplication->farm->name; ?></p>
<p>
	<strong>Season :</strong>
	<?php echo $contractapplication->season->name; ?></p>
<p>
	<strong>Year:</strong>
	<?php echo $contractapplication->year; ?></p>
<p>
	<strong>Product :</strong>
	<?php echo $contractapplication->product->name; ?></p>
<p>
	<strong>Size:</strong>
	<?php echo $contractapplication->size .' ' .$contractapplication->measure_unit; ?></p>

<p>
	<strong>Status:</strong>
	<?php echo $contractapplication->status; ?></p>


<?php echo Html::anchor('contractapplication/index_mine', 'Back'); ?>