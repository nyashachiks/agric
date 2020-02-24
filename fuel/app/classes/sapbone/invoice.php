<?php
class Sapbone_invoice
{
 public function postInvoice($itemcode,$comment,$price,$cardcode,$docdate,$currency,$rate,$sessionId)
 {
 	$wsdl="http://localhost:2943/test.asmx?WSDL";
 	 $client = new SoapClient($wsdl,array(
                            "trace"=>1,
                            "exceptions"=>0));
     $inv=array(
     "ItemCode"=>$itemcode,
    "Comment"=>$comment,
    "Price"=>$price);
    $parameters=array(
    "invoice"=>array("Inv"=>$inv),
   "cardcode"=>$cardcode,
   "docDate"=>$docdate,
    "SessionId"=>$sessionId,
    "currency"=>$currency,
    "rate"=>$rate);
   
    
   $value= $client->Invoice($parameters);
  try{
  	   $docentry=$value->InvoiceResult;
   $pay= new Sapbone_payment();
   $pay->payInvoice($docentry,$sessionId,$cardcode,$docdate,$price,$currency);
  //print($xml);
  }catch(Exception $e){
  	     print "<pre>\n";
    
        print "<br />\n Request : ".htmlspecialchars($client->__getLastRequest());
    
       print "<br />\n Response: ".htmlspecialchars($client->__getLastResponse());
   
        print "</pre>";
 	}
 }
 

 }