
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
			<h1>Contract report</h1>
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
			<td>** CONTRACT DOCUMENT **</td>
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
			<th class="col-xs-2">Balance Carried Forward</th>
			<th class="col-xs-1">Amount Paid</th>
			<th class="col-xs-1">Date Paid</th>
			<th class="col-xs-1">Status</th>
			
			
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
				
				<td><?php echo $f['balance_carried_forward']; ?></td>
				
				<td><?php echo $f['amount_paid']; ?></td>
				
				<td><?php echo $f['date_paid']; ?></td>
				
				<td><?php echo $f['status']; ?></td>
				
			
				
			</tr>
			<?php endforeach; ?>
			<?php 
Package::load('PHPExcel');
$connection = mysqli_connect('localhost', 'root', 'cosmos^7', 'sf2');
// Create your database query
$query = "SELECT distinct c.id as cid,c.contractor_id as crid,c.loan_amount as clamount,c.balance_brought_forward as cbalbfw,c.balance_carried_forward as cbalcf,c.amount_paid as apaid,c.date_paid as dpaid,c.status as st,um.id as umid,u.id as uid,u.email as uemail from farms f 
			join users u on u.id = f.user_id 
			join users_metadata um on um.id = u.id
			join contractapplications ca on ca.farmer_id = f.user_id 
			join contracts c on c.contractapplication_id = ca.id
			where u.id = '{$district}'";  

// Execute the database query
$result = mysqli_query($connection,$query);// or die(mysqli_error());

// Instantiate a new PHPExcel object
$objPHPExcel = new PHPExcel(); 
// Set the active Excel worksheet to sheet 0
$objPHPExcel->setActiveSheetIndex(0); 
// Initialise the Excel row number
$rowCount = 1; 
// Iterate through each result from the SQL query in turn
// We fetch each database result row into $row in turn
 //Debug::dump($query);
			 // Debug::dump($data['users']);
	//		 exit;
	$customTitle = array ('Contract ID','Contractor ID','Contract Amount','Balance Brought Forward','Balance Carried Forward','Amount Paid','Date Paid','Phone','Status','User ID','ID','Email');
$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $customTitle[0]);
$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $customTitle[1]);
$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $customTitle[2]);
$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $customTitle[3]);
$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $customTitle[4]);
$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $customTitle[5]);
$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $customTitle[6]);
$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $customTitle[7]);
$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $customTitle[8]);
$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $customTitle[9]);

$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $customTitle[10]);
$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $customTitle[11]);
$rowCount++;
if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
while($row = mysqli_fetch_array($result)){ 
    // Set cell An to the "name" column from the database (assuming you have a column called name)
    //    where n is the Excel row number (ie cell A1 in the first row)
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['cid']); 
				 
    // Set cell Bn to the "age" column from the database (assuming you have a column called age)
    //    where n is the Excel row number (ie cell A1 in the first row)
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['crid']); 
	 $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['clamount']); 
	 
	  $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['cbalbfw']); 
	  
	   $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['cbalcf']); 
	   
	    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['apaid']); 
		
		 $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['dpaid']); 
		  $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['umid']); 
		  $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['st']); 
		  $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['umid']); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $row['uid']);//uemail 
			 $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $row['uemail']);
    // Increment the Excel row counter
    $rowCount++; 
} 

// Instantiate a Writer to create an OfficeOpenXML Excel .xlsx file
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
// Write the Excel file to filename some_excel_file.xlsx in the current directory
$objWriter->save('../../../contract_doc.xlsx'); 

?>
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
			<td>** CONTRACT REPORT **</td>
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
			<th class="col-xs-2">Balance Carried Forward</th>
			<th class="col-xs-1">Amount Paid</th>
			<th class="col-xs-1">Date Paid</th>
			<th class="col-xs-1">Status</th>
			
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
