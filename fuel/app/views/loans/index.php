<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Loan management</h2>
		
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
	
	<div class="row">
			<form method="get">
				<div class="col-md-2">
					<?php echo Html::anchor('loans','Reset', array('class' => 'btn btn-sm btn-primary')); ?>
				</div>
				<div class="col-md-3">
					<input  type="text" class="input input-sm form-control" name="fname" placeholder="Search by farmer name"/>
				</div>
				
				<div class="col-md-3">
					<?php
			$arr = Model_Loan::get_select_options('Filter by agronomist'); 
			
				echo Form::select('agro', Input::get('agro', isset($diseasesymptom) ? $diseasesymptom->agro : 0),
					$arr,			
					 array('class' => 'form-control input-sm')); 
				?>
				</div>
				
				<div class="col-md-3">
				
			<?php
			$arr = array(
				10 => 'Filter by status',
				0 => 'Pending approval',
				-1 => 'Bad debt, written off',
				1 => 'Paid up',
				2 => 'In repayment'
			);	
				echo Form::select('status', Input::get('status', isset($diseasesymptom) ? $diseasesymptom->status : 10),
					$arr,			
					 array('class' => 'form-control input-sm')); 
				?>
					
				</div>
				<div class="col-md-1">
					<button type="submit" class="btn btn-success btn-sm">Filter</button>
				</div>
				<legend></legend>
			</form>
		</div>
		<!-- //filters -->
	
	
		<?php if(isset($sos) and count($sos)): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Loan No.</th>
			<th>Application date</th>
			<th>Agronomist</th> 
			<th>Farmer </th>
			<th>Loan amount</th>
			<th>Status</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($sos as $so): ?>
	<tr>
		<td><?php echo $so->loanid; ?></td>
		<td><?php  echo $so->issue_date; ?></td>
		<td>
			<?php echo $so->agronomist; ?>
		</td>
		<td>
			<?php echo $so->farmer; ?>
		</td>
		<td><?php echo '$'.$so->amount; ?></td>
		
		<td>
			<?php if($so->status == 0): ?>
				<span class="label label-info">
					Pending approval
				</span>
			<?php elseif($so->status == -1): ?>
			<span class="label label-danger">
					Bad debt, written off
				</span>
			<?php elseif($so->status == 1): ?>
			<span class="label label-success">
					Paid up
				</span>
			<?php else: ?>
			<span class="label label-warning">
					In repayment
				</span>
			<?php endif; ?>
		</td>
		<td>
			<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('#', '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>	</div>
				</div>
		</td>
	</tr>	
	
	<?php endforeach; ?>
	</tbody>
</table>
<?php else: ?>

<div class="alert alert-danger">
	There are no loans found.
</div>
<?php endif; ?>
	</div>
</div>
</div>