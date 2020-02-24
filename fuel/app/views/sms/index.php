<h2>Listing <span class='muted'>Sms</span></h2>
<br/>
<p>
	<?php echo Html::anchor('sms/create', 'Add new Sms', array('class' => 'btn btn-success')); ?>

</p>
<?php if ($sms): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Username</th>
			<th>Sender id</th>
			<th>Recipients</th>
			<th>Body</th>
			<th>Sending number</th>
			<th>Message id</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($sms as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->username; ?></td>
			<td><?php echo $item->sender_id; ?></td>
			<td><?php echo $item->recipients; ?></td>
			<td><?php echo $item->body; ?></td>
			<td><?php echo $item->sending_number; ?></td>
			<td><?php echo $item->message_id; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('sms/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('sms/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('sms/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Sms.</p>

<?php endif; ?>
