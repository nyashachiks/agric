<!--table-->
          <table class="table table-bordered table-striped table-condensed">
            <thead>
			<tr>
				
				<th>Cost</th>
				
				<th>Units</th>
				<th>Qty</th>
				<th>Unit Price</th>
				
				<th>Total</th>
				<th>Per Tonne</th>
				<th>Notes</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		$subtotal=0;
		//$cumulativeTotal=0;
		foreach($task->project_stages_tasks_variablecosts as $cost):?>
			<tr>
						
				<td><?php echo $cost->variablecost->name;?></td>
				
				<td><?php echo $cost->variablecost->units->name;?></td>
				<td><?php echo $cost->qty;?></td>
				<td><?php echo $cost->unitprice;?></td>
			
				<td><?php $subtotal+=($cost->qty * $cost->unitprice);
				 echo ($cost->qty * $cost->unitprice);?></td>
				<td><?php $arr=['No','Yes'];
					echo $arr[$cost->pertonner];?>
				</td>
				<td style="word-wrap: break-word"><?php echo $cost->notes;?></td>
				<td><a onclick="return confirm('Are you sure?')"
				href="<?php echo Uri::base().'project/delete/'.$cost->id.'/'.
        	$projectID.'/cost';?>"
        	 class="btn btn-sm btn-danger">
        	 <i class="glyphicon glyphicon-trash"></i></a> </td>
			</tr>
		<?php endforeach;?>
			<tr>
				<th colspan="4">Total</th>
				<th colspan="4"><?php 
			//Debug::dump(Session::get_flash('cumulativeTotal'));	
			Session::set_flash('cumulativeTotal',
			Session::get_flash('cumulativeTotal')+$subtotal);//	$ cumulativeTotal+=$subtotal;
				echo $subtotal;?></th>
			</tr>
		</tbody>
          </table>

         <!--end of table-->