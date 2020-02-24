<h2>Listing <span class='muted'>Paymentterms</span></h2>
<br>
<?php if ($paymentterms): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Code</th>
			<th>Description</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($paymentterms as $item): ?>		<tr>

			<td><?php echo $item->code; ?></td>
			<td><?php echo $item->description; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('paymentterms/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('paymentterms/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('paymentterms/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Paymentterms.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('paymentterms/create', 'Add new Paymentterm', array('class' => 'btn btn-success')); ?>

</p>
