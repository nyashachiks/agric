
<table class="collaptable table table-striped">
 <thead>
		<tr>
				<th>Stage</th>
				<th>Task</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Cost</th>
				<th>Qty</th>
				<th>Units</th>
				<th>Unit Price</th>
				
				<th>Total</th>
				<th>Per Tonne</th>
				<th>Notes</th>
			</tr>
  </thead>
  <tbody>
  <?php 
  $stageArr=[];//creating an array to track stages
  $stageTracker=0;
  $taskArr=[];
  $taskTracker=999;
  $count=0;
  foreach($project->costs as $item):?>
  <!--stage-->
 <?php 
 if(Arr::search($stageArr, $item->stage_id,-1)==-1):
 	$stageArr[]=$item->stage_id;
 	  $stageTracker++;
 ?>
  <tr data-id="<?php echo $stageTracker;?>" data-parent="">
    <td colspan="11"><?php echo (isset($item->stage->name)?$item->stage->name:'No Stage');?></td>
    
  </tr>
<?php endif;?>
<!--end of stage-->
<!--start of task-->
  <?php 
 if(Arr::search($taskArr, $item->task_id,-1)==-1):
 	$taskArr[]=$item->task_id;
 	  $taskTracker++;
 ?>
  <tr data-id="<?php echo $count;$count++;?>" data-parent="<?php echo $stageTracker;?>">
    <td colspan="11"><?php echo (isset($item->task->name)?$item->task->name:'No Task');?>	</td>
    
  </tr>
<?php endif;?>
<!--end of task-->
<!--start of resources-->
  <tr data-id="6" data-parent="3">
    <td>1.2.1</td>
    <td>Element 6</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>
 <!--end of resources--> 
 <?php endforeach;?>
	</tbody>	
</table>
<?php echo Asset::js('collapsabletable/jquery.aCollapTable.js');?>
<script>
$(document).ready(function(){
  $('.collaptable').aCollapTable({ 
    startCollapsed: true,
    addColumn: false, 
    plusButton: '<span class="i">+</span>', 
    minusButton: '<span class="i">-</span>' 
  });
});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

