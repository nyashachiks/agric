<?php //echo Debug::dump($dataToReset->find(3));die;?>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
                <div class="x_title">
                               <span class="step_no">2</span>
 <h2>
	Project Stages
</h2>
                                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                                <br/>
<?php if(isset($stages )):?>
<?php echo Form::open();?>
<table id="datatable" class="table table-table-bordered table-bordered">
	<thead>
		<tr>
			<th>Select</th>
			<th>Name</th>
		
		</tr>
	</thead>
	<tbody>
		<?php foreach($stages as $item):
			$marked=false;
			if(isset($dataToReset))
			{
				foreach($dataToReset as $sub)
				{
					if($sub->id==$item->id)
						{
							$marked=true;
							break;
						}	
				}
			}
		?>
		<tr>
			<td><?php echo Form::checkbox('stages[]',$item->id,$marked);?></td>
			<td><?php echo $item->name;?></td>
			
			
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12" align="right">
          <a href="<?php echo Uri::create('project/addprojectName/stages');?>"
           class="btn btn-warning">Previous</a>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <button class="btn btn-primary">Next</button>
        </div>
    </div>
  <?php echo Form::close();?>  
<?php else: ?>
<div class="alert alert-warning">No record has been set!</div>
<?php endif;?>
                                
                </div>
</div>
</div>
<?php //echo Asset::js('CollapsibleLists.js');?>
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
          //$('#datatable1').dataTable();
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
    
    </script>
    <!-- /Datatables -->
