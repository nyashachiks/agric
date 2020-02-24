<h2>Listing <span class='muted'>Variablecosts</span></h2>
<br>
<?php if ($variablecosts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Unit</th>
			<th>Disbursed By Contractor</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($variablecosts as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo (count($item->units)>0?$item->units->name:'');?></td>
			<td><?php $arr=[0=>'No',1=>'Yes'];
					echo $arr[$item->disbursed];?>
			 </td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('variablecosts/view/'.$item->id, 
						'<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('variablecosts/edit/'.$item->id, 
						'<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('variablecosts/delete/'.$item->id, 
						'<i class="icon-trash icon-white"></i> Delete', 
						array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Variablecosts.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('variablecosts/create', 'Add new Variablecost', array('class' => 'btn btn-success')); ?>

</p>
