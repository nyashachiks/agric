<?php
 $groups= Auth\Model\Auth_Permission::find('all');
 
 $arr=array();
 foreach($groups as $item)
 {
 	$arr[$item->id]= $item->description;//] .' | ' . Custom_Permissionutility::getControllerList()[$item->permission];
 }
echo Form::hidden('group','1');
echo Form::select('role','',$arr,array('class'=> 'form-control'));
?>