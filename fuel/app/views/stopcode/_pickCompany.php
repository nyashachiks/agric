<style type="text/css">
	.libspicker {
	cursor: pointer;
	background: #c200ff;
    color: #fff;
    border: none;
    width: 15%;
    height: 33px; 
    float: left;
    border-radius: 25px;

}
</style>
<div class="modal fade" id="viewCompany" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       		 <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Select Company</h4>
      </div>
      <div class="modal-body">
	      	<div class="form-group">
				<?php echo Form::input('search','',
					array('class' => 'col-md-4 form-control', 'placeholder'=>'Search...' ,'onkeyup'=>'myFunction1()', 'id'=>'myInput1'));
			    ?>

			</div>
	       <?php 
	       		$companies = Model_Cocode::find('all');
	       		if ($companies): 
	       	?>
			<table class="table table-striped" id="myTable2">
				<thead>
					<tr>
						
						<th>Company Code</th>
						<th>Company Name</th>
						<th>City</th>
						<th>Curreny</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($companies as $item): ?>		
						<tr>
							<td><?php echo $item->co_code; ?></td>
							<td><?php echo $item->co_name; ?></td>
							<td><?php echo $item->city; ?></td>
							<td><?php echo $item->currency; ?></td>
							<td>
							<div class="btn-toolbar">
								<div class="btn-group">
								<button type="button" class="btn btn-info btn-small" onclick="pickCompany( '<?php echo $item->co_code; ?>')"> Pick
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
	function pickCompany(company_number)
	{
		document.getElementById('company_code').value=company_number;
		document.getElementById('company_code_i').value=company_number;

			
		$('#viewCompany').modal('hide');
		
	}
	
	function myFunction1() 
	{
	  // Declare variables 
	  var input, filter, table, tr, td, td1, td2,td3, i;
	  input = document.getElementById("myInput1");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTable2");
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
	
	

