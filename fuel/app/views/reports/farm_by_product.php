<div class="row-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1>Farm by Product report</h1>
		</div>
		<div class="panel-body">
			<div class="row">
				<form method="post">
					<div class="col-md-2">
						<p class="text-left">Select a Product</p>
					</div>
					<div class="col-md-6">
					<?php
						echo Form::select('id', 'none',Model_Product::get_select_options('-- Select a product --'),array('class' => 'form-control input-sm', 'onchange'=>'agentid()','id'=>'selectedagent')

);
?>
					</div>
					<div class="col-md-4">
						<button type="submit" class="btn btn-block btn-md btn-primary">Generate report</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div style="float: right">

	<?php 
	
	if(isset($report_generated) and $report_generated == true)
	{
				$dist = $sel_product_id;
				echo Form::button('print', '<i class="glyphicon glyphicon-print"></i> Print Agent', 
									array('class' => 'btn btn-success btn-md', 'type'=>'button', 
									'onclick'=>"printPage()", 'style'=>'float:right')); 
				echo Form::button('pdf', '<i class="glyphicon glyphicon-file"></i> Generate PDF', 
									array('id'=>'cmd','class' => 'btn btn-success btn-md', 'type'=>'button', 
									 'style'=>'float:right')); 
		        /* echo Form::button('xls', '<i class="glyphicon glyphicon-file"></i> Generate EXCEL', 
									array('id'=>'cmd','class' => 'btn btn-success btn-md', 'type'=>'button', 
									 'style'=>'float:right')); */
									 echo Html::anchor('reports/product/byproduct/excel/'.$dist,"Excel",array('class'=>'btn btn-success btn-md'));
									echo Form::hidden('agent', $dist, array('id'=>'agent_id')); 
		}
				
		?>	
		
<div id="printFarm">
<?php if(isset($farms) && count($farms)): ?>
<div class="row-fluid">
<div class="col-md-8">
	<table class="table table-striped table-bordered">
		<tbody>
		<tr>
			<td>** FARM BY PRODUCT REPORT **</td>
		</tr>
		</tbody>
	</table>
</div>
	<div class="col-md-4">
		<table class="table table-striped table-bordered">
		<tbody>
			<tr>
				<td class="report-stat-label">Selected Product:</td>
				<td class="text-center">
					<?php
					$prod = Model_Product::find($district);
		if(empty($prod)) echo "";
		
					echo $prod->name; ?>
				</td>
			</tr>
			<tr>
				<td class="report-stat-label">Generated at:</td>
				<td class="text-center">
					<?php echo Date::forge(time())->format("%H:%M %d-%m-%Y"); ?>
				</td>
			</tr>
			<tr>
				<td class="report-stat-label">Number of records:</td>
				<td class="text-center">
					<?php echo count($farms); ?>
				</td>
			</tr>
		</tbody>
	</table>
	</div>
</div>


<div class="row-fluid">
	<table class="table table-striped table-bordered">
		<thead>
			<th class="col-xs-2">Product ID</th>
			<th class="col-xs-2">Farm ID</th>
			<th class="col-xs-3">Farm name</th>
			<th class="col-xs-2">Farm size</th>
			<th class="col-xs-2">Farm Units</th>
			<th class="col-xs-2">Address</th>
			
			<th class="col-xs-1">District</th>
			<th class="col-xs-2">Province</th>
			<th class="col-xs-2">Phone</th>
		</thead>
		<tbody>
			<?php foreach($farms as $f): ?>
			<tr>
				<td><?php echo Model_Product::get_product_name($f['pd']); ?></td>
				<td><?php echo $f['f_id']; ?></td>
				<td><?php echo $f['name']; ?></td>
				<td><?php echo $f['size']; ?></td>
				<td><?php echo $f['units']; ?></td>
				<td><?php echo nl2br($f['address']); ?></td>
				
				<td><?php echo $f['district']; ?></td>
				<td><?php echo $f['province']; ?></td>
				<td><?php echo $f['phone']; ?></td>
			</tr>
			<?php endforeach; ?>
			
		</tbody>
	</table>
	<table class="table table-striped table-bordered">
		<tbody>
			<tr>
				<td class="text-center">
					** END OF REPORT **
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?php else: ?>

<div class="row-fluid">
	<div class="col-md-12 col-xs-12">
		<div class="alert alert-danger">
			<p>There are no products to display. Try another search.</p>
		</div>
	</div>
</div>


** SELECT A CONTRACTOR **
<?php endif; ?>
</div>
	
<script>
function agentid()
	{
		//recalculate if ! first click
		var measure =document.getElementById('selectedagent').value;
		//alert(measure);
		
		document.getElementById('agent_id').value=measure;
	}
	function printPage()
	{
		   var html="<html>";
		   html+= document.getElementById('printProduct').innerHTML;

		   html+="</html>";

		   var printWin = window.open('','','left=0,top=0,toolbar=0,scrollbars=0,status  =0');
		   printWin.document.write(html);
		   printWin.document.close();
		   printWin.focus();
		   printWin.print();
		   printWin.close();
	}
	var doc = new jsPDF('p', 'pt', 'letter');
	var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.fromHTML($('#printProduct').html(), 15, 15, {
        'width': 300, 
            'elementHandlers': specialElementHandlers
    });
    var filename=document.getElementById('id').value;
    doc.save(filename+'.pdf');
});

</script>
