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
<div class="modal fade" id="viewMaterial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       		 <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Select Material</h4>
      </div>
      <div class="modal-body">
	      	<div class="form-group">
				<?php echo Form::input('search','',
					array('class' => 'col-md-4 form-control', 'placeholder'=>'Search...' ,'onkeyup'=>'myFunction5()', 'id'=>'myInput5'));
			    ?>

			</div>
	       <?php 
	       		$materials = Model_Material::find('all');
	       		if ($materials): 
	       	?>
			<table class="table table-striped" id="myTable5">
				<thead>
					<tr>
						
						<th>Material Code</th>
						<th>Description</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($materials as $item): ?>		
						<tr>
							<td><?php echo $item->code; ?></td>
							<td><?php echo $item->description; ?></td>
							
							<td>
							<div class="btn-toolbar">
								<div class="btn-group">
								<button type="button" class="btn btn-info btn-small" onclick="pickMaterial( '<?php echo $item->code; ?>')"> Pick
									</button>
								</div>
								</div>

							</td>
						</tr>
				<?php endforeach; ?>	
			</tbody>
			</table>

		<?php else: ?>
		<p>No Materials.</p>

		<?php endif; ?>
      </div>
            
    </div>
  </div>
</div>
<script>
	function pickMaterial(code)
	{
		document.getElementById('material').value=code;
		document.getElementById('material_number').value=code;
			
		$('#viewMaterial').modal('hide');
		
	}
	
	function myFunction5() 
	{
	  // Declare variables 
	  var input, filter, table, tr, td, i;
	  input = document.getElementById("myInput5");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTable5");
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
	
	

