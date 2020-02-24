<h2>Listing <span class='muted'>Dropdowns for : <?php echo $mainmenu->name;?></span></h2>
<div class="row">
	<div class="col-md-2">
	<?php echo Html::anchor('dropdown/create/'. $mainmenu->id, 'Add new Dropdown', array('class' => 'btn btn-primary')); ?>
</div>
<div class="col-md-2">
	<?php echo Html::anchor('dropdown/arrange/'. $mainmenu->id, 'Arrange', array('class' => 'btn btn-success')); ?>
</div>
</div>
<br />
<?php if ($dropdowns): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Url</th>
			<th>Visible</th>
			
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($dropdowns as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->url; ?></td>
			<td><?php 
			$arr=array(0=>'False',1=>'True');
			echo $arr[$item->visible]; ?></td>
			
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('dropdown/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('dropdown/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('dropdown/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Dropdowns.</p>

<?php endif; ?>
