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
<div class="modal fade" id="viewCode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  
  
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       		 <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Pick a Code</h4>
      </div>
      <div class="modal-body">
	      	<div class="form-group">
				<?php echo Form::input('search','',
					array('class' => 'col-md-4 form-control', 'placeholder'=>'Search...' ,'onkeyup'=>'myFunction4()', 'id'=>'myInput4'));
			    ?>

		</div>
	       <?php 
	       		$codes = Model_Stopcode::find('all');
	       		if ($codes): 
	       	?>
			<table class="table table-striped" id="myTable4">
				<thead>
					<tr>
						
						<th>Stop Order Code</th>
						<th>Descriptione</th>
						
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($codes as $item): ?>		
						<tr>
							<td><?php echo $item->code; ?></td>
							<td><?php echo $item->description; ?></td>
							
							<td>
							<div class="btn-toolbar">
								<div class="btn-group">
								<button type="button" class="btn btn-info" onclick="pickCode('<?php echo $item->code; ?>')">
									<i class="glyphicon glyphicon-ok icon-white"></i></button>
								</div>
								</div>

							</td>
						</tr>
				<?php endforeach; ?>	
			</tbody>
			</table>

<?php else: ?>
<p>No Stop Order Codes.</p>

<?php endif; ?>
      </div>
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
    </div>
  </div>
  </div>
<script>
	function pickCode(code)
	{
		document.getElementById('stop_code').value=code;
		document.getElementById('code').value=code;
		
		$('#viewCode').modal('hide');
		
	}
	
	function myFunction4() 
	{
	  // Declare variables 
	  var input, filter, table, tr, td, td1, i;
	  input = document.getElementById("myInput4");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTable4");
	  tr = table.getElementsByTagName("tr");

	  // Loop through all table rows, and hide those who don't match the search query
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[0];
	    td1 = tr[i].getElementsByTagName("td")[1];
	   
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
	
	

