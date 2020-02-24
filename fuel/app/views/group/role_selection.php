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
<?php foreach($roles as $item):?>
	<tr>
		<td>
		<?php 
		$isroles_struct=false;
		$isroles_group=isset($selected_group->roles);
		 foreach($selected_group->structures as $struct)
		 {
		 	try{
				if(isset($struct->roles[$item->id]))
				{
					$isroles_struct=TRUE;
					break;
				}
				
			}
			catch(Exception $e)
			{
				$isroles_struct=FALSE;
				Log::error('Roles selection '.$e);
			}
		 //	Debug::dump(isset($struct->roles[3]));
		 }
		 
		echo Form::checkbox('select[]',$item->id,$isroles_struct||$isroles_group,array('class'=>'form-control'));?>
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