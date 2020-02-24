<?php

class Controller_Reports_Product_Byproduct extends Controller_Template
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
			
			//lets get the farms that belong to this district
			$sql = "SELECT f.product_id as pd,f.id as f_id,
					name, size, units
					,address,district,province,phone
					from farms f join addresses ad on f.address_id = ad.id
					where f.product_id = '{$district}' order by f.product_id asc ";
			//Debug::Dump($sql);
			$data['farms'] 	  = DB::query($sql)->execute();
			$data['district'] =  $district;
			
			$data['report_generated'] = true;
			$data['sel_product_id'] =  $district;
			$data['report_generated'] = true;
			$data['sel_product_id'] =  $district;
		}
		
		$this->template->content =  View::forge('reports/farm_by_product', $data);
		$this->template->title = "Farm by Product report";
	}
	
	public function action_excel($district)
    {
		//$district =  Input::post('id');
		
Package::load('PHPExcel');
$connection = mysqli_connect('localhost', 'root', 'cosmos^7', 'sfbfp');
// Create your database query
$query = "SELECT f.product_id as pd,f.id as f_id,
					name, size, units
					,address,district,province,phone
					from farms f join addresses ad on f.address_id = ad.id
					where f.product_id = '{$district}' order by f.product_id asc ";  

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
	$customTitle = array ('Product','Farmer ID','Name','Size','Units','Address','District','Province','Phone');
$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $customTitle[0]);
$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $customTitle[1]);
$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $customTitle[2]);
$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $customTitle[3]);
$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $customTitle[4]);
$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $customTitle[5]);
$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $customTitle[6]);
$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $customTitle[7]);
$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $customTitle[8]);
//$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $customTitle[9]);
$rowCount++;
if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
while($row = mysqli_fetch_array($result)){ 
    // Set cell An to the "name" column from the database (assuming you have a column called name)
    //    where n is the Excel row number (ie cell A1 in the first row)
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, Model_Product::get_product_name($row['pd']));//$row['pd']); 
	 $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['f_id']); 			 
    // Set cell Bn to the "age" column from the database (assuming you have a column called age)
    //    where n is the Excel row number (ie cell A1 in the first row)
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['name']); 
	 $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['size']); 
	 
	  $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['units']); 
	  
	   $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['address']); 
	   
	    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['district']); 
		
		 $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['province']); 
		  $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['phone']); 
		//  $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['cid']); 
		//  $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['em']); 
    // Increment the Excel row counter
    $rowCount++; 
} 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

//ob_end_clean();
//$objWriter->save('php://output');
$objWriter->save('/tmp/by_product.xls');
File::download('/tmp/by_product.xls', 'by_product.xls');

}
	
}