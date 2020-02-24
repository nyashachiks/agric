<h2>Listing Sap Bps</h2>
<br/>
<?php if ($sap_bps): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>BP Number</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Street</th>
			<th>Housenumber</th>
			<th>City</th>
			<th>Region</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($sap_bps as $sap_bp): ?>		
	<tr>
			<td><?php echo $sap_bp->bp_num; ?></td>
			<td><?php echo $sap_bp->firstname; ?></td>
			<td><?php echo $sap_bp->lastname; ?></td>
			<td><?php echo $sap_bp->street; ?></td>
			<td><?php echo $sap_bp->housenumber; ?></td>
			<td><?php echo $sap_bp->city; ?></td>
			<td><?php echo $sap_bp->region; ?></td>
			
			<td>
				<?php echo Html::anchor('sap/bp/view/'.$sap_bp->id, 'View'); ?> |
				<?php echo Html::anchor('sap/bp/edit/'.$sap_bp->id, 'Edit'); ?> |
				<?php echo Html::anchor('sap/bp/delete/'.$sap_bp->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
	</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Sap_bps.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('sap/bp/create', 'Add new Sap bp', array('class' => 'btn btn-success')); ?>

</p>
