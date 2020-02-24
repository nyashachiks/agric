
<div class="panel panel-info">
<div class="panel-heading">
	<i class="glyphicon glyphicon-info-sign">
			</i>
		Sort according to your prefered order.	
</div>
<div class="panel-body">
<?php echo Form::hidden('menuno',count($menu),array('id'=>'menuno'));?>
<?php echo Form::hidden('url',$url,array('id'=>'url'));?>
<div id="sortable" >
<?php 
//creating an array for list items
$arr=['0'=>'--Blank--'];
foreach($menu as $item)
{
	$arr[$item['id']]=$item['name'];
}
foreach($menu as $item):?>
  <div id="test" class="ui-state-default" >
  <?php echo Form::hidden('itemValue',(is_object($item)?$item->id:$item['id']),['class'=>'itemValue']);?>
   <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
   <?php echo 
    (is_object($item)?$item->name:$item['name']);?> 
    <?php if(isset($prefix)):?>
    <span class="pull-right">
    Comes Soon After:	
    <?php 
    echo Form::select('select',$item['prefix'],$arr);
     ?></span>
    <?php endif;?>
   </div>
  <?php endforeach;?>
</div>
</div>
</div>

<button id="btnorder" type="button" class="btn btn-primary">
<?php echo Asset::img('famfam/disk.png');?> Save</button>
<?php 
echo Asset::css('themes/smoothness/jquery-ui.css');
 //echo Asset::js('jquery-3.1.1.min.js');	
 echo Asset::js('jquery-ui.min.js'); 
 //echo Asset::js('jquery.mousewheel.js') ;?>
 
  
<script>
  $(function() {
  	$('#btnorder').on("click", function(e){
  	MenuOrder($('#menuno').val()); //defined in loanproduct/create parent file
	});
    $("#sortable").sortable();
    $( "#draggable" ).draggable({
      connectToSortable: "#sortable",
      helper: "clone",
      revert: "invalid"
    });
    $( "ul, li" ).disableSelection();
  });
  </script>
  