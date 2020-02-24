
<div class="modal fade" id="viewVendor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       		 <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Select Vendor</h4>
      </div>
      <div class="modal-body">
	      	<div class="form-group">
				<?php echo Form::input('search','',
					array('class' => 'col-md-4 form-control', 'placeholder'=>'Search...' ,'onkeyup'=>'myFunction()', 'id'=>'myInput'));
			    ?>

			</div>
            
	       <?php 
               //$farmer_num = Model_User_Profile::query()->where('id', 112)->or_where('vendor_number', 1590028);

	           //$farmer_num = Model_User_Profile::query()->where('vendor_number', 1590028)->where('id', '=', 112);

            $farmer_num = Model_User_Profile::find('all', array('where' => array('vendor_number' => 2707271)));
            
            function getVendor(){

                
                return 1590028;
            }
	       		if ($farmer_num):



	       	?>
			<table class="table table-striped" id="myTable">
				<thead>
					<tr>
						
						<th>Name</th>
						<th>National Id</th>
						<th>Gender</th>
						<th>Vendor Number</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($farmer_num as $item): ?>		
						<tr>
							<td><?php echo Model_User::get_full_name($item->user_id); ?></td>
							<td><?php echo $item->national_id; ?></td>
							<td><?php echo $item->gender; ?></td>
							<td><?php echo $item->vendor_number; ?></td>
							<td>
							<div class="btn-toolbar">
								<div class="btn-group">
								<button type="button" class="btn btn-info btn-small" onclick="pickVendor('<?php echo $item->vendor_number; ?>', '<?php echo $item->national_id; ?>' ,'<?php echo Model_User::get_full_name($item->user_id); ?>')"> Pick
									</button>
								</div>
								</div>

							</td>
						</tr>
				<?php endforeach; ?>	
			</tbody>
			</table>

		<?php else: ?>
		<p>No Vendor Name.</p>

		<?php endif; ?>
      </div>
            
    </div>
  </div>
</div>

<script>


	function pickVendor(farmer_number_code,farmer_id_code ,farmer_name_code)
	{
		document.getElementById('farmer_number').value=farmer_number;
		document.getElementById('farmer_number_code').value=farmer_number_code;
		document.getElementById('farmer_id').value=farmer_id_code;
		document.getElementById('farmer_id_code').value=farmer_id_code;
		document.getElementById('farmer_name').value=farmer_name_code;
		document.getElementById('farmer_name_code').value=farmer_name_code;


		
		
		$('#viewVendor').modal('hide');
		
	}
	
	function myFunction() 
	{
	  // Declare variables 
	  var input, filter, table, tr, td, td1, td2,td3, i;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTable");
	  tr = table.getElementsByTagName("tr");

	  // Loop through all table rows, and hide those who don't match the search query
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[0];
	    td1 = tr[i].getElementsByTagName("td")[1];
	    td2 = tr[i].getElementsByTagName("td")[2];
	    td3 = tr[i].getElementsByTagName("td")[3];
	    if (td||td1||td2||td3) {
	      if (td.innerHTML.toUpperCase().indexOf(filter) > -1||td1.innerHTML.toUpperCase().indexOf(filter) > -1||td2.innerHTML.toUpperCase().indexOf(filter) > -1||td3.innerHTML.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    } 
	  }
	}
</script>
	
	

