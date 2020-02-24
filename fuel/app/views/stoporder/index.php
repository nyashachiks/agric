<h2>Listing Stoporders</h2>
<br/>
<p>
	<?php echo Html::anchor('stoporder/create', 'Add new Stoporder', array('class' => 'btn btn-success')); ?>

</p>

<div class="form-group">
	<?php echo Form::input('search','',
		array('class' => 'col-md-4 form-control', 'placeholder'=>'Find by Farmer name or number...' ,'onkeyup'=>'findSO()', 'id'=>'mySO'));
    ?>
</div>

<?php if ($stoporders): ?>
<table class="table table-striped" id="SOTable">
	<thead>
		<tr>
			<th>Company code</th>
			<th>Stop order number</th>
			<th>Code</th>
			<th>Farmer name</th>
			<th>Farmer number</th>
			<th>Farmer id</th>
			<th>Material number</th>
			<th>Max amount</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($stoporders as $item): ?>		<tr>

			<td><?php echo $item->company_code; ?></td>
			<td><?php echo $item->stop_order_number; ?></td>
			<td><?php echo $item->code; ?></td>
			<td><?php echo $item->farmer_name; ?></td>
			<td><?php echo $item->farmer_number; ?></td>
			<td><?php echo $item->farmer_id; ?></td>
			<td><?php echo $item->material_number; ?></td>
			<td><?php echo $item->max_amount; ?></td>
			<td>
			
				<?php echo Html::anchor('stoporder/view/'.$item->id, ' View', array('class' => 'btn btn-info btn-sm')); ?>
				<?php echo Html::anchor('stoporder/edit/'.$item->id, 'Edit' , array('class' => 'btn btn-default btn-sm')); ?> 
				<?php echo Html::anchor('stoporder/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>	
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Stoporders.</p>

<?php endif; ?>

<script>
	
	function findSO() 
	{
	  // Declare variables 
	  var input, filter, table, tr, td, td1, td2, i;
	  input = document.getElementById("mySO");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("SOTable");
	  tr = table.getElementsByTagName("tr");

	  // Loop through all table rows, and hide those who don't match the search query
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[3];
	    td1 = tr[i].getElementsByTagName("td")[4];
		td2 = tr[i].getElementsByTagName("td")[5];
	   
	    if (td||td1) {
	      if (td.innerHTML.toUpperCase().indexOf(filter) > -1||td1.innerHTML.toUpperCase().indexOf(filter) > -1||td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    } 
	  }
	}
</script>