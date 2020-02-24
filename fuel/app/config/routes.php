<?php
return array(
	'_root_'  => 'auth/landing', //landing page for the app
	'login'  => 'auth/login', 
	'logout'=>'auth/logout',
	'_404_'   => 'welcome/404',
	'register'=>'auth/register',
	'registerB'=>'auth/registerB',
	
	/*--dashboard--*/
	'dashboard'=>'dashboard/index',
	
	/*--agri_dashboard--*/
	'agridashboard'=>'dashboard/agri',

	/*--ama_dashboard--*/
	'amadashboard'=>'dashboard/index',
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);
