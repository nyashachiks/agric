<?php if ($product): ?>

<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
                <div class="x_title">
                                <h2>All Products</h2>
                                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                            
<table class="table table-striped table-bordered" id="datatable">
	<thead>
		<tr>
			<th>Name</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($product as $item):?>
		<tr>
			<td>
			<?php echo $item->name;?>
			</td>
			
			<td>
			<a href="<?php echo Uri::base().'project/create/'.$item->id.'/'.$item->name;?>" 
			class="btn btn-default">Select</a> </td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
                                
                </div>
</div>
</div>


<?php endif;?>
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
