
<?php
	if(Custom_Permissionutility::HasUriAccess(isset($view)?$view:'add'))
	{?>
		<button type="<?php echo isset($type)?$type:'button';?>" class="btn <?php 
			//set class for my button
			echo (isset($class)?$class:' btn-primary');?>"><?php 
			//set image for my button
			echo (isset($img)?Asset::img($img):'') ;
			//set label for my button
			echo "<span class='".(isset($gly)?$gly:'')."'></span>" .(isset($label)?$label:'');
			?>
			   </button>
	<?php }?>