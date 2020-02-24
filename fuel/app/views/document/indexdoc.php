 <div class="page-header">
	  <h1>Documents: <small>list of legal documents</small></h1>
	</div>

<?php if ($documents): ?>
<table class="table table-striped">
	<thead>
		<tr>
			
			
			<th>Document name</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($documents as $item): ?>		<tr>

			
			
			<td><?php echo $item->actual_name; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo  Html::anchor('document/download/'.$item->id, '<i class="glyphicon glyphicon-download-alt icon-white"></i>Download', array('class'=>'btn btn-md btn-success'));?>				
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Documents.</p>

<?php endif; ?>
