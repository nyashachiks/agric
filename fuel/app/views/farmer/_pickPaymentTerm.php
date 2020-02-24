<div class="modal fade" id="viewPayments" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       		 <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Pick Payment Term</h4>
      </div>
      <div class="modal-body">
	      	<div class="form-group">
				<?php echo Form::input('search','',
					array('class' => 'col-md-4 form-control', 'placeholder'=>'Search...' ,'onkeyup'=>'myFunction3()', 'id'=>'myInput3'));
			    ?>

			</div>
	       <?php 
	       		$terms = Model_Paymentterm::find('all');
	       		if ($terms): 
	       	?>
			<table class="table table-striped" id="myTable3">
				<thead>
					<tr>
						
						<th>Payment Term</th>
						<th>Description</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($terms as $item): ?>		
						<tr>
							<td><?php echo $item->code; ?></td>
							<td><?php echo $item->description; ?></td>
							<td>
								<div class="btn-toolbar">
									<div class="btn-group">
										<button type="button" class="btn btn-info btn-small" onclick="pickPayment('<?php echo $item->code; ?>')"> Pick
										</button>
									</div>
								</div>

							</td>
						</tr>
				<?php endforeach; ?>	
			</tbody>
			</table>

		<?php else: ?>
		<p>No Payment Terms.</p>

		<?php endif; ?>
      </div>
            
    </div>
  </div>
</div>
<script>
	function pickPayment(code)
	{
		document.getElementById('payment').value=code;
		document.getElementById('payment_term').value=code;
		
		

		
		
		$('#viewPayments').modal('hide');
		
	}
	
	function myFunction3() 
	{
	  // Declare variables 
	  var input, filter, table, tr, td, td1, td2,td3, i;
	  input = document.getElementById("myInput3");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTable3");
	  tr = table.getElementsByTagName("tr");

	  // Loop through all table rows, and hide those who don't match the search query
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[0];
	    td1 = tr[i].getElementsByTagName("td")[1];
	   // td2 = tr[i].getElementsByTagName("td")[2];
	   // td3 = tr[i].getElementsByTagName("td")[3];
	    if (td||td1) {
	      if (td.innerHTML.toUpperCase().indexOf(filter) > -1||td1.innerHTML.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    } 
	  }
	}
</script>
	
	

