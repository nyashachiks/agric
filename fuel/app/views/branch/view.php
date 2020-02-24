<h2>Viewing <span class='muted'>#<?php echo $branch->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $branch->id; ?></p>
<p>
	<strong>Branch code:</strong>
	<?php echo $branch->branch_code; ?></p>
<p>
	<strong>Bank name:</strong>
	<?php echo $branch->bank_name; ?></p>
<p>
	<strong>Bank address:</strong>
	<?php echo $branch->bank_address; ?></p>
<p>
	<strong>Bank city:</strong>
	<?php echo $branch->bank_city; ?></p>
<p>
	<strong>Branch name:</strong>
	<?php echo $branch->branch_name; ?></p>
<p>
	<strong>Swift code:</strong>
	<?php echo $branch->swift_code; ?></p>

<?php echo Html::anchor('branches/edit/'.$branch->id, 'Edit'); ?> |
<?php echo Html::anchor('branches', 'Back'); ?>