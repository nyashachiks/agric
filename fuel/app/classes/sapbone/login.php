<?php
class Sapbone_login
{
 
 
 public function getSessionId()
   { 
   $wsdl="http://localhost/webservice/test.asmx?WSDL";
   $client = new SoapClient($wsdl,array(
                            "trace"=>1,
                            "exceptions"=>0));
    $parameters=array(
    "DataBaseServer"=>"USER",
    "DataBaseName"=>"SBODEMOUS",
    "DataBaseType"=>"dst_MSSQL2014",
   "DataBaseUserName"=>"sa",
   "DataBasePassword"=>"Password123",
   "CompanyUserName"=>"manager",
    "CompanyPassword"=>"Innovation",
    "Language"=>"ln_English",
    "LicenseServer"=>"localhost:30000");
   
    
   $value= $client->Login($parameters);
   $xml=$value->LoginResult;
   
	return $xml;
    //print "<pre>\n";
  
//  print($xml);
  //  print "</pre>";
    }
 }