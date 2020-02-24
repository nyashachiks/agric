<?php

if(Custom_Permissionutility::HasUriAccess(isset($view)?$view:'add'))
	{ 
	
echo Html::anchor((isset($link)?$link:'#'),
"<span class='".(isset($gly)?$gly:'')."'></span>" .(isset($label)?$label:'') , 
array('class' => (isset($class)?$class:'btn btn-default btn-sm'),
'onclick'=>(isset($onclick)?$onclick:'') )); 
}

?>