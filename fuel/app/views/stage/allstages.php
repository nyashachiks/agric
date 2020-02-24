<h2>Listing <span class='muted'>Stages</span></h2>
<br>
<?php if ($stages): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($stages as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td>
			<a href="<?php echo Uri::base().'product/variablecost/stage/stage_product/'.
			$item->id.'/'.$item->name;?>" 
			class="btn btn-default">
				Select
			</a>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Stages.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('stage/create', 'Add new Stage', array('class' => 'btn btn-success')); ?>

</p>
