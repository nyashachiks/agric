<?php
class Controller_Rest_Contract extends Controller_Rest
{
	public function get_list()
    {
		//get params
		$target = isset($_GET['target'])  ? $_GET['target'] : "";
		
       $sql = "select item , measure, sum(approved) as approv, sum(disbursed) as disb,
				sum(linetotal) as linetotal from nasty_tricks where target = $target
				group by item
				order by item";

	//we want a multiD array
     $res =  \DB::query($sql)->execute()->as_array();
     
     // loop and buid an array
     $result = array();
     foreach($res as $rs){
	 	$result[] = array(
	 		'item' => $rs['item'],
	 		'units' => $rs['measure'],
	 		'approv' => $rs['approv'],
	 		'disb' => $rs['disb'],
	 		'linetotal' => $rs['linetotal']
	 	);
	 }
	// Debug::dump($result); exit;
	 
     return $this->response($result);
	} 
	
	public function get_grand()
    {
		//get params
		$target = isset($_GET['target'])  ? $_GET['target'] : "";
		
       $sql = "select  sum(linetotal) as disb
				 from nasty_tricks where target = $target
				";

	//we want a multiD array
     $res =  \DB::query($sql)->execute()->as_array();
     
     // loop and buid an array
     $result = array();
     foreach($res as $rs){
	 	$result[] = array(
	 		'grand' => $rs['disb'],
	 	);
	 }
	 
	 //todo , catch ZERO
	 
     return $this->response($result);
	} 
}
