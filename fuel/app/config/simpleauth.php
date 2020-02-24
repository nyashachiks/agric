<?php

return array(
	
	'db_connection' => null,
		
	'table_name' => 'users',
		
	'table_columns' => array(
		'id',
		'username',
		'password',
		'email',
		'last_login',
		'login_hash',
		//'group_id',
		'group',
		//'profile_fields',
	),
	
	'guest_login' => false,
	
		1 	=> 'Student',
		50 	=> 'Lecturer',
		100 => 'Admin',
		500 => 'Employer',
	
	'groups' => array(
		 
		  50   	=> array('name' 	=> 'Lecturer', 'roles' => array('lecturer')),
		  100  	=> array('name' 	=> 'Administrator', 'roles' => array('admin')),
		  1 	=>   array('name'	=> 'Student', 'roles' => array('student')),
		  500 	=>   array('name'	=> 'Employer', 'roles' => array('employer')),
		
	),
	
	'roles' => array(
			
		'#' => array(
	    		'users' 	=> array('login', 'logout', 'changepass'),
	    		'faculties' => array('index','view'),
	    		'departments' => array('index','view'),
	    		'cvs' => array('view'),
		 		'courses' => array('index','view'),
	    	),
		 
		 'admin' => array(
		 	'users'		=> array('create', 'edit', 'delete', 'index', 'view', 'block', 'resetpass', 'changepass','activate'),
		 	'backup' 	=> array('create'),
			'settings' => array('index'),
			'courses' => array('index','create','edit','view'),
			'departments' => array('index','create','edit','view','delete'),
			'credits' => array('create','edit','view','setrate','delete','index'),
			'faculties' => array('index','create','edit','delete','view'),
		 ),
		 
		 'student' => array(
		 	'cvs' => array('view','create','edit'),
		 ),
		 
		 'lecturer' => array(
		 	
		 	'cvs' => array('index'),
		 ),
		 
		 'employer' => array(
			'cvs' => array('index'),
		 	
		 ),		
	),
	
	'login_hash_salt' => 'fUc&k9ingGR8',
);
