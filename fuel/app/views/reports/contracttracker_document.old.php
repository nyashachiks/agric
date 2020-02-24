
<?php echo Asset::js('jspdf/jspdf.js');?>
<?php echo Asset::js('jspdf/addhtml.js');?>
<?php echo Asset::js('jspdf/addimage.js');?>
<?php echo Asset::js('jspdf/canvas.js');?>
<?php echo Asset::js('jspdf/deflate.js');?>
<?php echo Asset::js('jspdf/FileSaver.js');?>
<?php echo Asset::js('jspdf/from_html.js');?>
<?php echo Asset::js('jspdf/html2pdf.js');?>
<?php echo Asset::js('jspdf/split_text_to_size.js');?>
<?php echo Asset::js('jspdf/standard_fonts_metrics.js');?>
<?php echo Asset::js('jspdf/svg.js');?>
<?php echo Asset::js('jspdf/cell.js');?>



<div class="row-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1>Contract Tracker report</h1>
		</div>
		<div class="panel-body">
			<div class="row">
				<form method="post">
					<div class="col-md-2">
						<p class="text-left">Select a Contract</p>
					</div>
					<div class="col-md-6">
					<?php
						echo Form::select('id', 'none',Model_User::get_userFarmerid('-- Select a Farmer --'),array('class' => 'form-control input-sm')

);
?>
					</div>
					<div class="col-md-4">
						<button type="submit" class="btn btn-block btn-md btn-primary">Generate report</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div style="float: right">

	<?php 
	$dist = 1;
				echo Form::button('print', '<i class="glyphicon glyphicon-print"></i> Print Contract', 
									array('class' => 'btn btn-success btn-md', 'type'=>'button', 
									'onclick'=>"printPage()", 'style'=>'float:right')); 
				echo Form::button('pdf', '<i class="glyphicon glyphicon-file"></i> Generate PDF', 
									array('id'=>'cmd','class' => 'btn btn-success btn-md', 'type'=>'button', 
									 'style'=>'float:right')); 
				echo Form::hidden('contract', $dist); 
		?>	
		
		</div>
<div id="printContract">

<?php if(isset($farms) && count($farms)): ?>
<div class="row-fluid">
<div class="col-md-8">
	<table class="table table-striped table-bordered">
		<tbody>
		<tr>
			<td>** CONTRACT TRACKER DOCUMENT **</td>
		</tr>
		</tbody>
	</table>
</div>
	<div class="col-md-4">
		<table class="table table-striped table-bordered">
		<tbody>
			<tr>
				<td class="report-stat-label">Selected Contract:</td>
				<td class="text-center">
					<?php 
				
				$user = Auth\Model\Auth_User::find($district);
				// Debug::Dump($district);
// Debug::Dump($farms);exit;
		$full_name = array();
		foreach($user->metadata as $meta)
	  {
		if($meta->key=='first_name')
			$cfirstname=$meta->value;
		
		if($meta->key=='last_name')
			$clastname=$meta->value;
			
	 }	
			
	 
		$full_name = $cfirstname." ".$clastname;
		 
		
				echo $full_name;
?>
				</td>
			</tr>
			<tr>
				<td class="report-stat-label">Generated at:</td>
				<td class="text-center">
					<?php echo Date::forge(time())->format("%H:%M %d-%m-%Y");
 ?>
				</td>
			</tr>
			
			<tr>
				<td class="report-stat-label">Number of records:</td>
				<td class="text-center">
					<?php echo count($farms); ?>
				</td>
			</tr>
		</tbody>
	</table>
	</div>
</div>


<div class="row-fluid">
	<table class="table table-striped table-bordered">
		<thead>
			<th class="col-xs-2">Contract Number</th>
			<th class="col-xs-2">Contractor</th>
			<th class="col-xs-2">Loan Amount</th>
			<th class="col-xs-2">Balance Brought Forward</th>
			<th class="col-xs-2">Amount Paid</th>
			<th class="col-xs-1">Task Name</th>
			<th class="col-xs-1">Task Notes</th>
			<th class="col-xs-1">Task Id</th>
			
			
		</thead>
		<tbody>
			<?php foreach($farms as $f): ?>
			<tr>
				<td><?php echo $f['id']; ?></td>
				<td><?php $user1 = Auth\Model\Auth_User::find($f['contractor_id']);
$full_name1 = array();
		foreach($user1->metadata as $meta)
	  {
		if($meta->key=='first_name')
			$cfirstname1=$meta->value;
		
		if($meta->key=='last_name')
			$clastname1=$meta->value; 
			
	 }	
		$full_name1[$f['contractor_id']] = $cfirstname1." ".$clastname1;
		echo $full_name1[$f['contractor_id']]; ?></td>
				
				
				<td><?php echo $f['loan_amount']; ?></td>
				
				<td><?php echo $f['balance_brought_forward']; ?></td>
				
				<td><?php echo $f['amount_paid']; ?></td>
				
				<td><?php echo $f['name']; ?></td>
				
				<td><?php echo $f['notes']; ?></td>
				
				<td><?php echo $f['project_stage_task_id']; ?></td>
				
			
				
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<table class="table table-striped table-bordered">
		<tbody>
			<tr>
				<td class="text-center">
					** END OF REPORT **
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?php elseif (isset($farms) && count($farms)==0): ?>
<div class="row-fluid">
<div class="col-md-8">
	<table class="table table-striped table-bordered">
		<tbody>
		<tr>
			<td>** CONTRACT TRACKER REPORT **</td>
		</tr>
		</tbody>
	</table>
</div>
<div class="col-md-4">

		<table class="table table-striped table-bordered">
		<tbody>
			<tr>
				<td class="report-stat-label">Selected Contract:</td>
				<td class="text-center">
					<?php 
				
				$user = Auth\Model\Auth_User::find($district);

		$full_name = array();
	//	Debug::Dump($user);
		//exit;
		foreach($user->metadata as $meta)
	  {
		if($meta->key=='first_name')
			$cfirstname=$meta->value;
	//	Debug::Dump($cfirstname);
		//exit;
		if($meta->key=='last_name')
			$clastname=$meta->value;
			//Debug::Dump($meta->value);
	 }	
			
	 
		$full_name = $cfirstname." ".$clastname;
		 
		// Debug::Dump($full_name);
		// exit;
				echo $full_name;
?>
				</td>
			</tr>
			<tr>
				<td class="report-stat-label">Generated at:</td>
				<td class="text-center">
					<?php echo Date::forge(time())->format("%H:%M %d-%m-%Y");
 ?>
				</td>
			</tr>
			
			<tr>
				<td class="report-stat-label">Number of records:</td>
				<td class="text-center">
					<?php echo count($farms); ?>
				</td>
			</tr>
		</tbody>
	</table>
	</div>


<div class="row-fluid">
	<table class="table table-striped table-bordered">
		<thead>
		<th class="col-xs-2">Contract Number</th>
			<th class="col-xs-2">Contractor</th>
			<th class="col-xs-2">Loan Amount</th>
			<th class="col-xs-2">Balance Brought Forward</th>
			<th class="col-xs-2">Amount Paid</th>
			<th class="col-xs-1">Task Name</th>
			<th class="col-xs-1">Task Notes</th>
			<th class="col-xs-1">Task Id</th>
			
		</thead>
		<tbody>
			
			<tr>
				<td colspan="10"><p class="text-center">No Records</td>
				
				
			</tr>
			
		</tbody>
	</table>
	<table class="table table-striped table-bordered">
		<tbody>
			<tr>
				<td class="text-center">
					** END OF REPORT **
				</td>
			</tr>
		</tbody>
	</table>
</div>
</div>
</div>
<?php else:?>
** SELECT A CONTRACT **
<?php endif; ?>

<script>
	function printPage()
	{
		   var html="<html>";
		   html+= document.getElementById('printContract').innerHTML;

		   html+="</html>";

		   var printWin = window.open('','','left=0,top=0,toolbar=0,scrollbars=0,status  =0');
		   printWin.document.write(html);
		   printWin.document.close();
		   printWin.focus();
		   printWin.print();
		   printWin.close();
	}
	var doc = new jsPDF('p', 'pt', 'letter');
	var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.fromHTML($('#printContract').html(), 15, 15, {
        'width': 300, 
            'elementHandlers': specialElementHandlers
    });
    var filename=document.getElementById('contract').value;
    doc.save(filename+'.pdf');
});

</script>
