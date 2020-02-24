	<?php 
				$str='';
				foreach($collection as $item):
				$str.=$item->name. ' : ';
				endforeach;
				$str=substr($str,0,count($str)-3);
				echo $str;
	?>