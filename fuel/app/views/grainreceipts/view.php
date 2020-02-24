<legend>Viewing grain grading data</legend>

<div class="col-md-4">

<p>
	<strong>Farmer name:</strong>
	<?php echo strtoupper(Model_User::get_full_name($grainreceipt->farmer_id)); ?></p>
<p>
	<strong>Grain name:</strong>
	<?php echo strtoupper($grainreceipt->grain->name); ?></p>
<p>
	<strong>Quantity:</strong>
	<?php echo $grainreceipt->qty. 'Kg' ?></p>
<p>
	<strong>Grade:</strong>
	
	<span class="label label-success"><?php echo $grainreceipt->grade->name; ?>
	</span>
	</p>
<p>
	<strong>Value:</strong>
	<?php echo '$ '. number_format($grainreceipt->value,2,'.',' '); ?></p>
<p>
	<strong>Received by:</strong>
	<?php echo strtoupper(Model_User::get_full_name($grainreceipt->received_by)).'<br/>on '. date('Y-m-d @ H:i', $grainreceipt->created_at); ?></p>
</div>
	
<div class="col-md-5">
	<div class="panel panel-success">
<div class="panel-heading">
	Grading data
</div>

	<div class="panel-body">
<?php if(count($grainreceipt->receiptdata)): ?>

<table class="table table-bordered">
	<tbody>
	<!-- get all grading criteria -->
	<?php foreach(Model_Gradingcriterium::find('all') as $crit): ?>
	
	<tr>
			<td><strong><?php echo $crit->crit_name; ?></strong></td>
			<td><?php 
				if(!empty($grainreceipt[$crit->short_name])){
					echo $grainreceipt[$crit->short_name].'%';
				}
			 ?>
			 </td>
		</tr>
	
	<?php endforeach; ?>
		
	</tbody>
</table>

<?php else: ?>
	<div class="alert alert-danger">There is no grading data for this receipt</div>
<?php endif; ?>
	</div>
</div>
</div>

<div class="row">
<div class="col-md-12" style="border-top: 1px solid #e5e5e5; padding-top: 10px;">
	<?php echo Html::anchor('grainreceipts', 'Back',array('class' => 'btn btn-md btn-warning')); ?>
	
</div>
</div>


