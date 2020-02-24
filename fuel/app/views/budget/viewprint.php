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


<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Viewing <?php echo $budget->name; ?></h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<div style="float: right">
	<?php 
				echo Form::button('print', '<i class="glyphicon glyphicon-print"></i> Print Budget', 
									array('class' => 'btn btn-success btn-md', 'type'=>'button', 
									'onclick'=>"printPage()", 'style'=>'float:right')); 
				echo Form::button('pdf', '<i class="glyphicon glyphicon-file"></i> Generate PDF', 
									array('id'=>'cmd','class' => 'btn btn-success btn-md', 'type'=>'button', 
									 'style'=>'float:right')); 
				echo Form::hidden('budget_name', $budget->name, array('id'=>'budget_name')); 
		?>	
</div>
<div id="printBudget">
	<h3></h3>
	
	
		
	<p>
		<strong>Name:</strong>
		<?php echo $budget->name; ?>
	</p>
	<p>
		<strong>Product:</strong>
		<?php $product = Model_Product::find('all');
						foreach($product as $item)
							$arr[]=$item->name;
		echo $arr[$budget->product-1]; ?>
	</p>
	<p>
		<strong>Region:</strong>
		<?php echo Custom_UserUtility::$getRegions[$budget->region]; ?>
	</p>
		
	<p>
		<strong>Soil Type:</strong>
		<?php echo Custom_UserUtility::$getSoilType[$budget->soiltype]; ?>
	</p>

	<div id='activity'>
		<h4><strong>Listing <span class='muted'>Activities for budget</span></strong></h4>
		
		
		<?php if ($activities): ?>
			
				<?php foreach ($activities as $item): ?>
				<div style="border-style: solid; border-color: #01320c; border-width: thin; padding: 5px;">
				<div class="row">
					<div class="col-md-3">		
						<h4><strong><?php echo $item->name; ?></strong>	</h4>					
					</div>		
					<div class="col-md-9">			
						<div class="btn-toolbar">
								
						</div>
					</div>
					
				</div>	
					<br/>
				<div class="row-fluid" style="padding-left: 10px;">
					<?php  
						$activity_id=$item->id;
						$inputs=Model_Input::query()->where('activity_id',$activity_id)->get();
						//echo Session::set('inputs', $inputs);
						
					echo render('input/indexview', array('inputs'=>$inputs, 'activity'=>$item->name));
					?>	
				</div>	
				<div class="row-fluid" style="padding-left: 10px;">
					<?php  
						$activity_id=$item->id;
						$farmguides=Model_Farmguide::query()->where('activity_id',$activity_id)->get();
						echo render('farmguide/indexview', array('farmguides'=>$farmguides, 'activity'=>$item->name));
					?>	
				</div>	
					
			</div>		
				<?php endforeach; ?>	
			

		<?php else: ?>
		<p>No Activities.</p>

		<?php endif; ?>
	</div>
	<div id="editor"></div>
</div> 
		
		
	</div>
</div>
</div>




<script>
	function printPage()
	{
		   var html="<html>";
		   html+= document.getElementById('printBudget').innerHTML;

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
    doc.fromHTML($('#printBudget').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    var filename=document.getElementById('budget_name').value;
    doc.save(filename+'.pdf');
});

</script>
