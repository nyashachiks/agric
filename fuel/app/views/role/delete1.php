<h2><?php echo $role->name;?></h2>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
		<th>
			Permissions
			</th>
			<td>
				&nbsp;
			</td>
		</tr>
		
	</thead>
	<tbody>
	<?php foreach($role->permissions as $item):?>
		<tr>
			<td>
			<?php echo $item->description;?> 	
			</td>
			<td>
			<a href="<?php echo Uri::base().'role/delete/'. $item->id.'/'.$role->id;?>" class="btn btn-default">Delete</a>
			</td>
		</tr>
		<?php endforeach;?> 
	</tbody>
</table>