<?php
 $groups= Auth\Model\Auth_Role::find('all');
 $arr=array(0=>'--Please Select--');
 
 foreach($groups as $item)
 {
 	$arr[$item->id]=$item->name;
 }
$roleid='';
//$rolekey='';

	foreach($roles as $item)
	{
		$roleid=$item->id;
		//$rolekey=Arr::search($roles, $item->id);
	}
	
echo Form::hidden('rolekey', $roleid);
echo Form::select('role',$roleid,$arr,array('class'=> 'form-control'));
?>