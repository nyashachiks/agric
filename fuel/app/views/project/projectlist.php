
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
                <div class="x_title">
                                <h2>
	<a class="btn btn-success btn-lg" href="<?php echo Uri::base().'project/listallproducts';?>" >
Create New</a>
</h2>


                                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                                <br/>
<?php if(isset($project)):?>
<table id="datatable" class="table table-table-bordered table-bordered table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Product</th>
			<th>
				Expected Yield<br/>
				Per Hectare
			</th>

			<th>Description</th>
			<th>Date Created</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($project as $item):?>
		<tr>
			<td><?php echo $item->name;?></td>
			<td><?php echo $item->product->name;?></td>
			<td><?php echo $item->expected_yield?> Tonnes</td>
			<td><?php foreach($item->regions as $regions)
			{
				echo $regions->name.' , ';
			}
			foreach($item->soiltypes as $soiltypes)
			{
				echo $soiltypes->name.' , ';
			}
			foreach($item->conditions as $conditions)
			{
				echo $conditions->name.' ';
			}
			;?></td>
			<td><?php echo Custom_Helper::UnixToTimeStamp($item->created_at);?></td>
			<td><a class="btn btn-default" 
			href="<?php echo Uri::base().'project/report/'.$item->id;?>">Select</a></td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
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
