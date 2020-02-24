<?php

class Controller_Reports_ContractTracker_Bycontracttracker extends Controller_Template
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
			// join contracttrackers ct on ca.id = ct.id 
			// join project_stages ps on ct.project_stage_task_id = ps.id 
			// join project_stage_tasks pst on ps.stage_id = pst.id 
			// join stages ss on pst.project_stage_id = ss.id
			$sql = "SELECT distinct c.id,c.contractor_id,c.loan_amount,c.balance_brought_forward,c.amount_paid,tsk.name,ct.notes,ct.project_stage_task_id
			from farms f join users u on u.id = f.user_id 
			join users_metadata um on um.id = u.id 
			join contractapplications ca on ca.farmer_id = f.user_id 
			join contracts c on c.contractapplication_id = ca.id 
			join projects pj on ca.project_id = pj.id 
			join project_stages pjs on pj.id = pjs.project_id 
			join project_stage_tasks pjst on pjs.stage_id = pjst.project_stage_id 
			join contracttrackers ct on pjst.id = ct.project_stage_task_id 
			join tasks tsk on pjst.task_id = tsk.id 
				
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
		$this->template->content =  View::forge('reports/contracttracker_document', $data);
		$this->template->title = "Contract Tracker report";
	}
	
	public function action_excel($district)
    {
		//$district =  Input::post('id');
		
Package::load('PHPExcel');
$connection = mysqli_connect('localhost', 'root', 'cosmos^7', 'sfbfp');
// Create your database query
$query = "SELECT distinct c.id  as ct,c.contractor_id as cct ,c.loan_amount as lm ,c.balance_brought_forward as bbf,c.amount_paid as ap,tsk.name as tn,ct.notes as nt,ct.project_stage_task_id as psti
			from farms f join users u on u.id = f.user_id 
			join users_metadata um on um.id = u.id 
			join contractapplications ca on ca.farmer_id = f.user_id 
			join contracts c on c.contractapplication_id = ca.id 
			join projects pj on ca.project_id = pj.id 
			join project_stages pjs on pj.id = pjs.project_id 
			join project_stage_tasks pjst on pjs.stage_id = pjst.project_stage_id 
			join contracttrackers ct on pjst.id = ct.project_stage_task_id 
			join tasks tsk on pjst.task_id = tsk.id 
				
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
	
$customTitle = array ('Contract Number','Contractor','Loan Amount','Balance Brought Forward','Amount Paid','Task Name','Task Notes','Task Id');
$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $customTitle[0]);
$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $customTitle[1]);
$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $customTitle[2]);
$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $customTitle[3]);
$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $customTitle[4]);
$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $customTitle[5]);
$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $customTitle[6]);
$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $customTitle[7]);
//$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $customTitle[8]);
//$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $customTitle[9]);
$rowCount++;
if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
//$query = "SELECT distinct c.id  as ct,c.contractor_id as cct ,c.loan_amount as lm ,c.balance_brought_forward as bbf,c.amount_paid as ap,tsk.name as tn,ct.notes as nt,ct.project_stage_task_id as psti

while($row = mysqli_fetch_array($result)){ 
    // Set cell An to the "name" column from the database (assuming you have a column called name)
    //    where n is the Excel row number (ie cell A1 in the first row)
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['ct']); 
				 
    // Set cell Bn to the "age" column from the database (assuming you have a column called age)
    //    where n is the Excel row number (ie cell A1 in the first row)
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['cct']); 
	 $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['lm']); 
	 
	  $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['bbf']); 
	  
	   $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['ap']); 
	   
	    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['tn']); 
		
		 $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['nt']); 
		  $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['psti']); 
		  //$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['cid']); 
		  //$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['em']); 
    // Increment the Excel row counter
    $rowCount++; 
} 

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

//ob_end_clean();
//$objWriter->save('php://output');
$objWriter->save('/tmp/by_contracttracker.xls');
File::download('/tmp/by_contracttracker.xls', 'by_contracttracker.xls');

}
	
}