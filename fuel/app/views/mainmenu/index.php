<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Main menus</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<div class="row">
	<div class="col-md-2">
		<?php echo Html::anchor('mainmenu/create', 'Add new Mainmenu', array('class' => 'btn btn-primary')); ?>
		</div>
<div class="col-md-2">		
<a href="<?php echo Uri::create('mainmenu/arrange/left');?>" type="button" class="btn btn-success">
	Arrange Left Menu
</a>

</div>
<div class="col-md-2">
	<a href="<?php echo Uri::create('mainmenu/arrange/right');?>" type="button" class="btn btn-danger">
	Arrange Right Menu
</a>
</div>
</div>
<br />
<?php if ($mainmenus): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Url</th>
			<th>Visible</th>
			<th>Alignment</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($mainmenus as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->url; ?></td>
			<td><?php 
			$arr=array(0=>'False',1=>'True');
			echo $arr[$item->visible]; ?></td>
			<td><?php echo $item->aligned; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
					<?php echo Html::anchor('dropdown/index/'.$item->id, '<i class="icon-eye-open"></i> Sub Menu',
						 array('class' => 'btn btn-default btn-sm')); ?>
				<?php echo Html::anchor('mainmenu/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', 
				array('class' => 'btn btn-default btn-sm')); ?>					
					<?php echo Html::anchor('mainmenu/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', 
					array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger">
	<p>There are no main menus</p>
</div>

<?php endif; ?>
	</div>
</div>
</div>