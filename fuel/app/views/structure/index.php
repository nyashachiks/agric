<h2>Listing <span class='muted'>Structures</span></h2>
<br />
<?php echo Html::anchor('structure/create', 'Add new Structure', array('class' => 'btn btn-success')); ?>
<?php if ($structures): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Type</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($structures as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->description;  /*try{
				$item->groups->name;//  echo $item->type;// Model_Structure::$structure[$item->type];
			}catch(Exception $e)
			{
				Log::error($e->getMessage(),'Structure.index'); //logging error
			}*/
			 ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
					<?php 
					$count=0;
					$count = (isset($item->structures)?count($item->structures):0);
					echo Html::anchor('structure/selectorg/'.$item->id, '<span class="badge">'.$count.'
					</span> <i class="glyphicon glyphicon-user"></i>
					 Organisations Covered',
						 array('class' => 'btn btn-primary btn-sm')); ?>
						 <!--covering roles-->
					<?php 
					$count = (isset($item->roles)?count($item->roles):0);
					echo Html::anchor('structure/selectroles/'.$item->id, '<span class="badge">'.$count.'
					</span> <i class="glyphicon glyphicon-user"></i>
					 Roles Covered',
						 array('class' => 'btn btn-warning btn-sm')); ?>
						 
						<?php echo Html::anchor('structure/view/'.$item->id, '<i class="glyphicon glyphicon-eye-open"></i> View',
						 array('class' => 'btn btn-default btn-sm','onclick'=>'getModal()')); ?>	
						 					<?php echo Html::anchor('structure/edit/'.$item->id,
						 					 '<i class="glyphicon glyphicon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('structure/delete/'.$item->id, 
						 					 '<i class="glyphicon glyphicon-trash glyphicon-white"></i> Delete', 
						 					 array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Structures.</p>

<?php endif; ?>
<!--p>
	<?php echo Html::anchor('structure/create', 'Add new Organisation', array('class' => 'btn btn-success')); ?>
</p-->
