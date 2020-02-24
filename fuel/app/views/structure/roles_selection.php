<table class="table table-bordered table-striped">
<?php echo render('utilities/openform');?>
<thead>
	<tr>
		<th width="5%">
			Select
		</th>
		<th>
			Organisation
		</th>
	</tr>
</thead>
<tbody>
<tr>
	<td>
		<?php 
		//this represents default org and id, is zero all the time
		//echo Form::checkbox('select[]',0,isset($struct_selected->structures[0]),array('class'=>'form-control'));?>
	</td>
	<td>
		All Roles
	</td>
</tr>
<?php 

foreach($roles as $item):?>
	<tr>
		<td>
		<?php echo Form::checkbox('select[]',$item->id,isset($struct_selected->roles[$item->id]),array('class'=>'form-control'));?>
		</td>
		<td>
			<?php 
			echo $item->name;?>
		</td>
	</tr>
	<?php endforeach;?>
</tbody>
</table>
<?php echo render('utilities/submitbutton.php', array('label'=>' Save', 'img'=>'famfam/disk.png'));?>
<?php echo render('utilities/closeform.php');?>