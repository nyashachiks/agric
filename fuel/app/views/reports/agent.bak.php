
<?php echo Asset::js('jspdf/jspdf.js');?>
<?php echo Asset::js('jspdf/addhtml.js');?>
<?php echo Asset::js('jspdf/addimage.js');?>
<?php echo Asset::js('jspdf/canvas.js');?>
<?php echo Asset::js('jspdf/deflate.js');?>
<?php echo Asset::js('jspdf/FileSaver.js');?>
<?php echo Asset::js('jspdf/from_html.js');?>
<?php echo Asset::js('jspdf/html2pdf.js');?>
<?php echo Asset::js('jspdf/split_text_to_size.js');?>
<?php echo Asset::js('jspdf/standard_fonts_metrics.js');?>
<?php echo Asset::js('jspdf/svg.js');?>
<?php echo Asset::js('jspdf/cell.js');?>

  <head>
    <meta charset="utf-8">
    <title>Agents </title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <!-- Latest compiled and minified Jquery library -->
        <script src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
 
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>

<div class="row-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1>Agents report</h1>
		</div>
		<div class="panel-body">
			<div class="row">
				<form method="post">
					<div class="col-md-2">
						<p class="text-left">Select an Agent</p>
					</div>
					<div class="col-md-6">
					<?php
						echo Form::select('id', 'none',Model_User::get_userid('-- Select an Agent --'),array('class' => 'form-control input-sm', 'onchange'=>'agentid()','id'=>'selectedagent')

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
									 echo Html::anchor('reports/agent/byagent/excel/'.$dist,"Excel",array('class'=>'btn btn-success btn-md'));
				echo Form::hidden('agent', $dist, array('id'=>'agent_id')); 
				}
				
		?>	
		
<div id="printAgent">

<?php if(isset($farms) && count($farms)): ?>
<div class="row-fluid">
<div class="col-md-8">
	<table class="table table-striped table-bordered">
		<tbody>
		<tr>
			<td>** AGENT REPORT **</td>
		</tr>
		</tbody>
	</table>
</div>
	<div class="col-md-4">
		<table class="table table-striped table-bordered">
		<tbody>
			<tr>
				<td class="report-stat-label">Selected Agent:</td>
				<td class="text-center">
					<?php 
				
				$user = Auth\Model\Auth_User::find($district);

		$full_name = array();
		foreach($user->metadata as $meta)
	  {
		if($meta->key=='first_name')
			$cfirstname=$meta->value;
		
		if($meta->key=='last_name')
			$clastname=$meta->value;
			
	 }	
			
	 
		$full_name = $cfirstname." ".$clastname;
		 
		
				echo $full_name;
?>
				</td>
			</tr>
			<tr>
				<td class="report-stat-label">Generated at:</td>
				<td class="text-center">
					<?php echo Date::forge(time())->format("%H:%M %d-%m-%Y");
 ?>
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
			<th class="col-xs-2">Farm Name</th>
			
			<th class="col-xs-2">Farm size</th>
			<th class="col-xs-2">Address</th>
			<th class="col-xs-2">Phone</th>
			<th class="col-xs-1">District</th>
		</thead>
		<tbody>
			<?php foreach($farms as $f): ?>
			<tr>
				<td><?php echo Model_Farm::get_farm_name($f['f_id']); ?></td>
				
				<td><?php echo $f['size'].' '. $f['units']; ?></td>
				<td><?php echo nl2br($f['address']); ?></td>
				<td><?php echo $f['phone']; ?></td>
				<td><?php echo $f['district']; ?></td>
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
		<?php 
	function base_url($uri = '', $protocol = NULL)
	{
		$base_url  = '/smart_farmerA/reports/Agent/';
		//$base_url = 'http://localhost:8072/';
		//$base_url = $this->slash_item($base_url);

		if (isset($protocol))
		{
			// For protocol-relative links
			if ($protocol === '')
			{
				$base_url = substr($base_url, strpos($base_url, '//'));
			}
			else
			{
				$base_url = $protocol.substr($base_url, strpos($base_url, '://'));
			}
		}

		return $base_url._uri_string($uri);
	}

	// -------------------------------------------------------------

	/**
	 * Build URI string
	 *
	 * @used-by	CI_Config::site_url()
	 * @used-by	CI_Config::base_url()
	 *
	 * @param	string|string[]	$uri	URI string or an array of segments
	 * @return	string
	 */
	function _uri_string($uri)
	{
		/* if ($this->item('enable_query_strings') === FALSE)
		{
			is_array($uri) && $uri = implode('/', $uri);
			return ltrim($uri, '/');
		}
		elseif (is_array($uri))
		{
			return http_build_query($uri);
		} */

		return $uri;
	}
?>




 
<?php elseif (isset($farms) && count($farms)==0): ?>
<div class="row-fluid">
<div class="col-md-8">
	<table class="table table-striped table-bordered">
		<tbody>
		<tr>
			<td>** AGENT REPORT **</td>
		</tr>
		</tbody>
	</table>
</div>
<div class="col-md-4">

		<table class="table table-striped table-bordered">
		<tbody>
			<tr>
				<td class="report-stat-label">Selected Agent:</td>
				<td class="text-center">
					<?php 
				
				$user = Auth\Model\Auth_User::find($district);

		$full_name = array();
		foreach($user->metadata as $meta)
	  {
		if($meta->key=='first_name')
			$cfirstname=$meta->value;
		
		if($meta->key=='last_name')
			$clastname=$meta->value;
			
	 }	
			
	 
		$full_name = $cfirstname." ".$clastname;
		 
		
				echo $full_name;
?>
				</td>
			</tr>
			<tr>
				<td class="report-stat-label">Generated at:</td>
				<td class="text-center">
					<?php echo Date::forge(time())->format("%H:%M %d-%m-%Y");
 ?>
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


<div class="row-fluid">
	<table class="table table-striped table-bordered">
		<thead>
			<th class="col-xs-2">Farm Name</th>
			
			<th class="col-xs-2">Farm size</th>
			<th class="col-xs-2">Address</th>
			<th class="col-xs-2">Phone</th>
			<th class="col-xs-1">District</th>
		</thead>
		<tbody>
			
			<tr>
				<td colspan="5"><p class="text-center">No Records</td>
				
				
			</tr>
			
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
</div>
</div>
</div>
<?php else:?>
** SELECT A CONTRACTOR **
<?php endif; ?>
	
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
		   html+= document.getElementById('printAgent').innerHTML;

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
    doc.fromHTML($('#printAgent').html(), 15, 15, {
        'width': 300, 
            'elementHandlers': specialElementHandlers
    });
    var filename=document.getElementById('agent').value;
    doc.save(filename+'.pdf');
});

</script>
