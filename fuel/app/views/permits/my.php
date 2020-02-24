<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>My import permit applications</h2>
			<ul class="nav navbar-right panel_toolbox">
		      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
		    </ul>
		    <div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br/>
			
<?php if ($permits): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th class="col-xs-2">Entry #</th>
			<th class="col-xs-2">Applicant</th>
			<th class="col-xs-4">Commodity</th>
			<!--<th>Quantity applied</th>-->
			<th class="col-xs-2">Status</th>
			<th class="col-xs-2">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($permits as $item): ?>		<tr>
			
			<td><strong><?php echo $item->id; ?></strong></td>
			<td><?php echo $item->user->get_full_name($item->applicant_id); ?></td>
			<td><?php echo $item->commodity; ?></td>
			<!--<td><?php echo $item->qty_applied.' '. $item->measurement->unit; ?></td>-->
			<td>
				<?php if ($item->status == 0): ?>
					<span class="label label-info">Pending approval</span>
				<?php endif; ?>
				
				<?php if ($item->status == 1): ?>
					<span class="label label-success">Reviewed, accepted</span>
				<?php endif; ?>
				
				<?php if ($item->status == -1): ?>
					<span class="label label-danger">Reviewed, declined</span>
				<?php endif; ?>
			</td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('permits/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>
												
						<?php if($item->status == 0): ?>
						<?php echo Html::anchor('permits/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('permits/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>
						<?php endif; ?>
						
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger">
	<p>You do not have any import permit applications. To create an application, click on the green button below</p>
</div>
<?php endif; ?>
<p>
	<?php echo Html::anchor('permits/create', 'New import permit', array('class' => 'btn btn-success')); ?>
</p>


		</div>
	</div>
	
	
</div>


