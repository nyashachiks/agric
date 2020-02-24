<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Labour available for hire</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<?php if ($labors): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th style='white-space:nowrap;'>Laborer Name</th>
			<th style='white-space:nowrap;'>Skill name</th>
			<th style='white-space:nowrap;'>Rate</th>
			
			<th style="width:100%;">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	

<?php foreach ($labors as $item): ?>		<tr>
			
			<td style='white-space:nowrap;'>
				<?php
					$users=Auth\Model\Auth_User::find($item->laborer_id); //searching for user
					$firstname='';
				  	$lastname='';
				    //getting metadata
				 	
				  	foreach($users->metadata as $meta) //iterating through metadata
				  	{
					 	if($meta->key=='first_name')
					  		$firstname=$meta->value;
					  	if($meta->key=='last_name')
					  		$lastname=$meta->value;
					} 
					echo $firstname.' '.$lastname;
				 ?> 
			 </td>
			<td style='white-space:nowrap;'><?php echo $item->skill_name; ?></td>
			<td style='white-space:nowrap;'><?php 
				$ratetime=Custom_UserUtility::$getRatePeriods[$item->rate_time];
				echo '$'.$item->rate.'/'.$ratetime; 
				?>
			</td>
			
			<td style="width:100%;">
				<div class="btn-toolbar">
					<div class="btn-group" style='float: right;'>
						<?php echo Html::anchor('labor/viewonly/'.$item->id, '<i class="glyphicon glyphicon-eye-open icon-white"></i> View', 
						array('class' => 'btn btn-sm btn-success')); ?>			
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>There is no labour avilable for hire.</p>

<?php endif; ?>
	</div>
</div>
</div>