<h2>Viewing SAP BP # <?php echo $sap_bp->bp_num; ?></h2>

<p>
	<strong>Firstname:</strong>
	<?php echo $sap_bp->firstname; ?></p>
<p>
	<strong>Lastname:</strong>
	<?php echo $sap_bp->lastname; ?></p>
<p>
	<strong>Street:</strong>
	<?php echo $sap_bp->street; ?></p>
<p>
	<strong>Housenumber:</strong>
	<?php echo $sap_bp->housenumber; ?></p>
<p>
	<strong>City:</strong>
	<?php echo $sap_bp->city; ?></p>
<p>
	<strong>Region:</strong>
	<?php echo $sap_bp->region; ?></p>

<?php echo Html::anchor('sap/bp/edit/'.$sap_bp->id, 'Edit'); ?> |
<?php echo Html::anchor('sap/bp', 'Back'); ?>