<?php echo Asset::css('_styles.css');?>
<div class=row>
<div class="col-md-4">
<label>Task </label>
	<div class="input-group">
	
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal">Select</button>
      </span>
       <input id="taskid" type="hidden" class="form-control" placeholder="Task">
      <input id="task" type="text" class="form-control" placeholder="Task">
    </div><!-- /input-group -->
</div>
<div class="col-md-2">
<label>Duration in days </label>
	<div class="input-group">
	<div class="col-md-6">
      <input type="text" id="duration" class="form-control" placeholder="0">
      </div>
    </div><!-- /input-group -->
</div>
<div class="col-md-2">
<label>&nbsp;</label>
	<div class="input-group">
	<button class="btn btn-default" data-toggle="modal" data-target="#modalCost">Select Input</button>
    </div><!-- /input-group -->
</div>
<div class="col-md-2">
<label>&nbsp;</label>
	<div class="input-group">
	<button class="btn btn-default" type="button" onclick="AddCollapsableDiv()"> Add</button>
    </div><!-- /input-group -->
</div>
</div>

 <!-- Modal task -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
      <?php echo render('project/wizard/datatable.php',['task'=>$task]);?>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div><!--end task modal-->
 <!-- Modal costs -->
<div class="modal fade"  id="modalCost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width: 800px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
      <?php //echo render('project/wizard/datatable.php',['task'=>$task]);?>
      <?php echo render('project/_cost',array('collection'=>$costs));
//echo render('project/_form'); ?>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div><!--end modal-->
<div class="panel panel-default">
<div class="panel-body">
<p id="tate"> </p>
</div>
<div class="panel-footer">
	
		<strong> Total:</strong><span id="cumulative">0.0</span>
	
</div>
</div>
<?php echo Asset::js('CollapsibleLists.js');?>
<script>
var queryArr = [];
var countTest=0;
var cumulativeTotal=0;
var taskid='';
var stage= '';
var duration='';
function AddCollapsableDiv(){
var checkID=false;
var stageID=$('#stage option:selected').val();
//doing a check
 $.each(queryArr, function( key, value ) {
 if(value==stageID)
 {
 	checkID=true;
 	//alert('exists');
 }
});
	
queryArr.push($('#stage option:selected').val());
var appTo='#tate';
taskid=$('#taskid').val();
var taskName=$('#task').val();
stage= $('#stage option:selected').text();
duration=$('#duration').val();
var yield=['No','Yes'];
var inputs= '';
var hiddenfields='';
 $('input[type=checkbox]').each(function () {
           if (this.checked) {
           		id=$(this).val();
           		var unitprice=parseFloat($('#unitprice'+id).val());
				var qty=parseFloat($('#qty'+id).val());
				var total= unitprice *qty;
				cumulativeTotal+=total;
				hiddenfields='<input type="hidden" name="stage[]" value="'+stageID+'"/>'+
				'<input type="hidden" name="duration[]" value="'+duration+'"/>'+
				'<input type="hidden" name="variable_id[]" value="'+id+'"/>'+
				'<input type="hidden" name="qty[]" value="'+qty+'"/>'+
				'<input type="hidden" name="pertonne[]" value="'+yield+'"/>'+
				'<input type="hidden" name="notes[]" value="'+$('#notes'+id).val()+'"/>'+
				'<input type="hidden" name="task[]" value="'+taskid+'"/>'+
				'<input type="hidden" name="unitprice[]" value="'+unitprice+'"/>';
              inputs+=hiddenfields+'<li>'+$('#name'+id).html()+' in '+ $('#unit'+id).html()+
              ' <strong> Qty :</strong> '+$('#qty'+id).val()+ ' <strong> Unit price :</strong>'+
              $('#unitprice'+id).val()+
              ' <strong> Total: </strong>'+ total+
              '<strong> Affected By Yield :</strong>'+ yield[$('#yield'+id).val()]+
              '<strong> Notes: </strong>'+$('#notes'+id).val()+ '</li>';
              
           }
		});

if(checkID==false)
	{
		var btn='<ul class="collapsibleList" id="newList'+stageID+'">'+
            '<li class=" collapsibleListOpen">'+
              stage+
              '<ul class=" collapsibleList" style="display: block;" id="innTask'+stageID+'">'+
                '<li class=" collapsibleListOpen" >'+
                     taskName+'&nbsp;<strong> Duration</strong>&nbsp;&nbsp;'+duration+'<small> days</small>'+
                  
                  '<ul class=" collapsibleList collapsibleList"'+
                  ' style="display: block;" >'+
                    inputs+
                  '</ul>'+
                '</li>'+
              '</ul>'+
            '</li>'+
          '</ul>';
		
		  $(btn).appendTo(appTo);
	CollapsibleLists.applyTo(document.getElementById('newList'+stageID,true));	
	//CollapsibleLists.apply();
	}
	else
	{// $('#newList').removeClass('collapsibleList');
	appTo='#innTask'+stageID;
	btn='<div id="test'+countTest+'"><li class=" collapsibleListOpen">'+
                  taskName+'&nbsp;<strong> Duration</strong>&nbsp;&nbsp;'+duration+'<small> days</small>'+
                  '<ul class=" collapsibleList collapsibleList"'+
                  ' style="display: block;">'+
                   inputs+
                  '</ul>'+
                '</li></div>';
	  $(btn).appendTo(appTo);
	   //$('#newList').addClass('collapsibleList');
	   //CollapsibleLists.apply();	
	  CollapsibleLists.applyTo(document.getElementById('test'+countTest),true);	
	  countTest++;
	}
	$('#cumulative').html(cumulativeTotal);
		
}
</script>
<!-- // END table -->

	<?php// echo Asset::js('dashboard/libs/jquery/jquery-1.8.2.js');?>
	<!-- attach JS -->
	<?php echo Asset::js("datatables.net/js/jquery.dataTables.min.js"); ?>
    <?php echo Asset::js("datatables.net-bs/js/dataTables.bootstrap.min.js"); ?>
    <?php echo Asset::js("datatables.net-buttons/js/dataTables.buttons.min.js"); ?>
    <?php echo Asset::js("datatables.net-buttons-bs/js/buttons.bootstrap.min.js"); ?>
    <?php echo Asset::js("datatables.net-buttons/js/buttons.flash.min.js"); ?>
    <?php echo Asset::js("datatables.net-buttons/js/buttons.html5.min.js"); ?>
    <?php echo Asset::js("datatables.net-buttons/js/buttons.print.min.js"); ?>
    <?php echo Asset::js("datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"); ?>
    <?php echo Asset::js("datatables.net-keytable/js/dataTables.keyTable.min.js"); ?>
    <?php echo Asset::js("datatables.net-responsive/js/dataTables.responsive.min.js"); ?>
    <?php echo Asset::js("datatables.net-responsive-bs/js/responsive.bootstrap.js"); ?>
    <?php echo Asset::js("datatables.net-scroller/js/datatables.scroller.min.js"); ?>


    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
          $('#datatable1').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });
		
        TableManageButtons.init();
        //picking selected values
     
      });
     $('#inputs').click(function(){
	       $('input[type=checkbox]').each(function () {
           if (this.checked) {
               console.log($(this).val()); 
           }
		});
	});	
     // CollapsibleLists.applyTo(document.getElementById('newList')); // responsible for collapsing inputs
        function GetRecord(row) {
        var val= $('#row'+row).text();	
        var taskid=$('#taskid'+row).val();
        $('#task').val(val);
        $('#taskid').val(taskid);
        $('#myModal').modal('hide');
		}
    </script>
    <!-- /Datatables -->