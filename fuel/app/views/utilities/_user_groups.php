<?php
 $groups= Auth\Model\Auth_Group::find('all');
 $arr=array();
 foreach($groups as $item)
 {
 	$arr[$item->id]=$item->name;
 }
echo Form::select('group',$id,$arr,array());
?>