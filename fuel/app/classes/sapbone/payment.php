<?php
class Sapbone_payment{
	public function payInvoice($docentry,$sessionId,$cardcode,$docdate,$sumapplied,$doccurrency)
 {
 	$wsdl="http://localhost:2943/test.asmx?WSDL";
 	 $client = new SoapClient($wsdl,array(
                            "trace"=>1,
                            "exceptions"=>0));
    
    $parameters=array(
    "msSessionID"=>$sessionId,
    "docentry"=>$docentry,
   "cardcode"=>$cardcode,
   "SumApplied"=>$sumapplied,
   "CheckSum"=>0,
   "docDate"=>$docdate,
    "doccurrency"=>$doccurrency,
    "DocRate"=>"1",
    "CashSum"=>$sumapplied,
    "CheckAccount"=>"",
    "CountryCode"=>"",
    "BankCode"=>"",
    "Branch"=>"",
    "AccounttNum"=>"",
    "TransferAccount"=>"",
    "TransferSum"=>0,
    "TransferReference"=>"",
    "CashAccount"=>"_SYS00000000345",
    );
   
    
   $value= $client->InvoicePayment($parameters);
  // $xml=$value->InvoiceResult;
     print "<pre>\n";
    
        print "<br />\n Request : ".htmlspecialchars($client->__getLastRequest());
    
       print "<br />\n Response: ".htmlspecialchars($client->__getLastResponse());
   //print($xml);
        print "</pre>";
 	
 }
	
}