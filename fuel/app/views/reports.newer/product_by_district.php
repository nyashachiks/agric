<div class="row-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1>Product by district report</h1>
		</div>
		<div class="panel-body">
			<div class="row">
				<form method="post">
					<div class="col-md-2">
						<p class="text-left">Select a district</p>
					</div>
					<div class="col-md-6">
					<?php
						echo Form::select('district', 'none',Model_Address::get_districts('-- Select a district --'),array('class' => 'form-control input-sm')

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

<?php if(isset($farms) && count($farms)): ?>
<div class="row-fluid">
<div class="col-md-8">
	<table class="table table-striped table-bordered">
		<tbody>
		<tr>
			<td>** PRODUCT BY DISTRICT REPORT **</td>
		</tr>
		</tbody>
	</table>
</div>
	<div class="col-md-4">
		<table class="table table-striped table-bordered">
		<tbody>
			<tr>
				<td class="report-stat-label">Selected district:</td>
				<td class="text-center">
					<?php echo $district; ?>
				</td>
			</tr>
			<tr>
				<td class="report-stat-label">Generated at:</td>
				<td class="text-center">
					<?php echo Date::forge(time())->format("%H:%M %d-%m-%Y"); ?>
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
			<th class="col-xs-2">Product name</th>
			<th class="col-xs-3">Farm name</th>
			<th class="col-xs-2">Farm size</th>
			<th class="col-xs-2">Address</th>
			<th class="col-xs-2">Phone</th>
			<th class="col-xs-1">District</th>
		</thead>
		<tbody>
			<?php foreach($farms as $f): ?>
			<tr>
				<td><?php echo Model_Product::get_product_name($f['f_id']); ?></td>
				<td><?php echo $f['name']; ?></td>
				<td><?php echo $f['size'].' '. $f['units']; ?></td>
				<td><?php echo nl2br($f['address']); ?></td>
				<td><?php echo $f['phone']; ?></td>
				<td><?php echo $f['district']; ?></td>
			</tr>
			<?php endforeach; ?>
			<?php 
Package::load('PHPExcel');
$connection = mysqli_connect('localhost', 'root', 'cosmos^7', 'sf2');
// Create your database query
$query = "SELECT distinct f.id as f_id, name, f.size as size, units ,address,district,province,phone,c.contractor_id as cid,u.email as em from farms f 
			join addresses ad on f.address_id = ad.id 
			join users u on u.id = f.id 
			join users_metadata um on um.id = u.id
			join contractapplications ca on ca.farm_id = f.id 
			join contracts c on c.contractapplication_id = ca.id
			where c.contractor_id = '{$district}' ";  

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
	$customTitle = array ('Farmer ID','Name','Size','Units','Address','District','Province','Phone','Contract ID','Email');
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
$rowCount++;
if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
while($row = mysqli_fetch_array($result)){ 
    // Set cell An to the "name" column from the database (assuming you have a column called name)
    //    where n is the Excel row number (ie cell A1 in the first row)
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['f_id']); 
				 
    // Set cell Bn to the "age" column from the database (assuming you have a column called age)
    //    where n is the Excel row number (ie cell A1 in the first row)
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['name']); 
	 $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['size']); 
	 
	  $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['units']); 
	  
	   $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['address']); 
	   
	    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['district']); 
		
		 $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['province']); 
		  $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['phone']); 
		  $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['cid']); 
		  $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['em']); 
    // Increment the Excel row counter
    $rowCount++; 
} 

// Instantiate a Writer to create an OfficeOpenXML Excel .xlsx file
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
// Write the Excel file to filename some_excel_file.xlsx in the current directory
$objWriter->save('../../../product_by_district.xlsx'); 

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
<?php else: ?>

<div class="row-fluid">
	<div class="col-md-12 col-xs-12">
		<div class="alert alert-danger">
			<p>There are no products to display. Try another search.</p>
		</div>
	</div>
</div>
<?php endif; ?>