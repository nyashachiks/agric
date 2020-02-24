<?php 
//use Orm\Model;
class Model_Role extends Auth\Model\Auth_Role
{
	protected static $_many_many = array(
		'structures' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Structure',
			'key_to' => 'id',
			'table_through' => 'roles_structures',
			'key_through_from' => 'role_id',
			'key_through_to' => 'structure_id',
		),);
}

