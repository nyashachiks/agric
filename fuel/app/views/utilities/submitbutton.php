
	
			<button type="submit" class="btn <?php 
			//set class for my button
			echo (isset($class)?$class:' btn-primary');?>"><?php 
			//set image for my button
			echo (isset($img)?Asset::img($img):'') ;
			//set label for my button
			echo (isset($label)?' '.$label:'Save');
			?>
			   </button>
			<?php //echo Form::submit('submit',(isset($label)?$label:'Save'), array('class' => 'btn btn-primary')); ?>
