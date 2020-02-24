<h2>Listing Stakeholder_Products</h2>
<br>
<?php if ($stakeholder_Products): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Trading Name</th>
			<th>Name</th>
			<th>Description</th>
			
			
			<th>Additional details</th>
			<th>Picture</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($stakeholder_Products as $stakeholder_Product): ?>		<tr>
			<td><?php echo $stakeholder_Product->tradingname; ?></td>
			<td><?php echo $stakeholder_Product->name; ?></td>
			<td><?php echo $stakeholder_Product->description; ?></td>
			
			<td><?php echo $stakeholder_Product->additional_details; ?></td>
			<td>
			
			<?php Custom_Filehandler::ViewPic($stakeholder_Product->pic,'img-rounded','150px'); ?></td>
			<td>
				<?php echo Html::anchor('stakeholder/product/view/'.$stakeholder_Product->id, 'View'); ?> |
				<?php echo Html::anchor('stakeholder/product/edit/'.$stakeholder_Product->id, 'Edit'); ?> |
				<?php echo Html::anchor('stakeholder/product/delete/'.$stakeholder_Product->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Stakeholder_Products.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('stakeholder/product/create', 'Add new Stakeholder Product', array('class' => 'btn btn-success')); ?>

</p>
