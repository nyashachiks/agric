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
<div class="modal fade" id="viewPlant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       		 <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Select Depot</h4>
      </div>
      <div class="modal-body">
	      	<div class="form-group">
				<?php echo Form::input('search','',
					array('class' => 'col-md-4 form-control', 'placeholder'=>'Search...' ,'onkeyup'=>'myFunction6()', 'id'=>'myInput6'));
			    ?>

			</div>
	       <?php 
	       		$plant = Model_Depot::find('all');
	       		if ($plant): 
	       	?>
			<table class="table table-striped" id="myTable6">
				<thead>
					<tr>
						
						<th>Plant</th>
						<th>Short Name</th>
						<th>Name</th>
						<th>City</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($plant as $item): ?>		
						<tr>
							<td><?php echo $item->plant; ?></td>
							<td><?php echo $item->short_name; ?></td>
							<td><?php echo $item->name; ?></td>
							<td><?php echo $item->city; ?></td>
							<td>
							<div class="btn-toolbar">
								<div class="btn-group">
								<button type="button" class="btn btn-info btn-small" onclick="pickPlant( '<?php echo $item->plant; ?>')"> Pick
									</button>
								</div>
								</div>

							</td>
						</tr>
				<?php endforeach; ?>	
			</tbody>
			</table>

		<?php else: ?>
		<p>No Plant Name.</p>

		<?php endif; ?>
      </div>
            
    </div>
  </div>
</div>
<script>
	function pickPlant(plantid)
	{
		document.getElementById('depot').value=plantid;
		document.getElementById('inputplant').value=plantid;
			
		$('#viewPlant').modal('hide');
		
	}
	
	function myFunction6() 
	{
		
		
	  // Declare variables 
	  var input, filter, table, tr, td, td1, td2,td3, i;
	  input = document.getElementById("myInput6");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTable6");
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
	
	

