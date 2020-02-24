<?php 

class Controller_Reports_Agent_Byagent extends Controller_Template 
{
	public function before()
	{
		parent::before();
		View::set_global('view_legend','Reports');
		$this->template->title = "Agent";
	}
	/*    public function index()
    {
               // $data['rs'] =  $this->db->get('countries');
                $this->load->view('agent' );
    } */
	 
	public function action_index()
	{
		$data = array();
		
		if(Input::method() == 'POST'){
			
			$district =  Input::post('id');
			
			//lets get the farms that belong to this district
			$sql = "SELECT distinct f.id as f_id, name, f.size as size, units ,address,district,province,phone,c.contractor_id,u.email from farms f 
			join addresses ad on f.address_id = ad.id 
			join users u on u.id = f.id 
			join users_metadata um on um.id = u.id
			join contractapplications ca on ca.farm_id = f.id 
			join contracts c on c.contractapplication_id = ca.id
			where c.contractor_id = '{$district}'
                     ";//where u.email like '{$district}'
// Debug::dump($sql);
			$data['farms'] 	  = DB::query($sql)->execute();
			$data['district'] =  $district;
			$data['report_generated'] = true;
			$data['sel_product_id'] =  $district;
			
			 // Debug::dump($data['farmers']);
			 // Debug::dump($data['users']);
			// exit;
		}
		//name, size, units
				//	,address,district,province,phone
				//	from users u join contracts ad on u.id = ad.contractor_id
				//	where u.district = '{$district}' order by product_id asc ";
		$this->template->content =  View::forge('reports/agent', $data);
		$this->template->title = "Agent report";
		//echo excel();
	}
	
	public function action_excel($district)
    {
		//$district =  Input::post('id');
		
Package::load('PHPExcel');
$connection = mysqli_connect('localhost', 'root', 'cosmos^7', 'sfbfp');
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
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');


$objWriter->save('/tmp/by_agronomist.xls');
File::download('/tmp/by_agronomist.xls', 'by_agronomist.xls');

}
	
	
	////
	
			 
	
}