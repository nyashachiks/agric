<h4><strong>Listing Smart Farmer<span class='muted'>Documents</span></strong></h4>
<br/>

<?php if ($docs): ?>
<table class="table table-striped">
	<thead>
		<tr>
			
			
			<th>Document name</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($docs as $item): ?>		<tr>

			
			<td><?php echo $item->name; ?></td>
			
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo  Html::anchor('document/download/'.$item->name, '<i class="glyphicon glyphicon-download-alt icon-white"></i>Download', array('class'=>'btn btn-md btn-success'));?>				
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Documents.</p>

<?php endif; ?>
