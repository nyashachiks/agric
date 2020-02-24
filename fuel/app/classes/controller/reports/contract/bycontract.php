<?php

class Controller_Reports_Contract_Bycontract extends Controller_Template
{
	public function before()
	{
		parent::before();
		View::set_global('view_legend','Reports');
	}
	
	public function action_index()
	{
		$data = array();
		
		if(Input::method() == 'POST'){
			
			$district =  Input::post('id');
			// join addresses ad on f.address_id = ad.id 
			// join users u on u.id = f.id 
			//lets get the farms that belong to this district
			$sql = "SELECT distinct c.id,c.contractor_id,c.loan_amount,c.balance_brought_forward,c.balance_carried_forward,c.amount_paid,c.date_paid,c.status from farms f 
			join users u on u.id = f.user_id 
			join users_metadata um on um.id = u.id
			join contractapplications ca on ca.farmer_id = f.user_id 
			join contracts c on c.contractapplication_id = ca.id
			where u.id = '{$district}'";
// Debug::dump($sql);
			$data['farms'] 	  = DB::query($sql)->execute();
			$data['district'] =  $district;
			$data['report_generated'] = true;
			$data['sel_product_id'] =  $district;
			 // Debug::dump($data['farms']);
			 // Debug::dump($data['district']);
			//exit;
		}
		//name, size, units
				//	,address,district,province,phone
				//	from users u join contracts ad on u.id = ad.contractor_id
				//	where u.district = '{$district}' order by product_id asc ";
		$this->template->content =  View::forge('reports/contract_document', $data);
		$this->template->title = "Contract report";
	}
	public function action_excel($district)
    {
		//$district =  Input::post('id');
		
Package::load('PHPExcel');
$connection = mysqli_connect('localhost', 'root', 'cosmos^7', 'sfbfp');
// Create your database query
$query = "SELECT distinct c.id as ct,c.contractor_id as cct,c.loan_amount as lm,c.balance_brought_forward as bbf,c.balance_carried_forward as bcf,c.amount_paid as ap,c.date_paid as dp,c.status as st from farms f 
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
	
$customTitle = array ('Contract Number','Contractor','Loan Amount','Balance Brought Forward','Balance Carried Forward','Amount Paid','Date Paid','Status');
$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $customTitle[0]);
$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $customTitle[1]);
$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $customTitle[2]);
$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $customTitle[3]);
$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $customTitle[4]);
$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $customTitle[5]);
$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $customTitle[6]);
$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $customTitle[7]);

$rowCount++;
if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
while($row = mysqli_fetch_array($result)){ 
    // Set cell An to the "name" column from the database (assuming you have a column called name)
    //    where n is the Excel row number (ie cell A1 in the first row)
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['ct']); 
				 
    // Set cell Bn to the "age" column from the database (assuming you have a column called age)
    //    where n is the Excel row number (ie cell A1 in the first row)
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['cct']); 
	 $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['lm']); 
	 
	  $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['bbf']); 
	  
	   $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['bcf']); 
	   
	   // $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['district']); 
		
		 $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['ap']); 
		  $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['dp']); 
		  $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['st']); 
		  //$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['em']); 
    // Increment the Excel row counter
    $rowCount++; 
} 

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

//ob_end_clean();
//$objWriter->save('php://output');
$objWriter->save('/tmp/by_contract.xls');
File::download('/tmp/by_contract.xls', 'by_contract.xls');

}
	
	
}