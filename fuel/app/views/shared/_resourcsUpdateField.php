 <!--table-->
          <table class="table table-bordered table-striped table-condensed">
            <thead>
			<tr>
				
				<th>Cost</th>
				
				<th>Units</th>
				<th>Recommended Qty</th>
				<th>Qty</th>
				<th>Unit Price</th>
				
				<th>Total</th>
				<th>Per Tonne</th>
				<th>Notes</th>
				
			</tr>
		</thead>
		<tbody id="resourceTBody">
		<?php 
		$subtotal=0;
		foreach($task->project_stages_tasks_variablecosts as $cost):?>
			<tr>
						
				<td><?php echo $cost->variablecost->name;?></td>
				
				<td><?php echo $cost->variablecost->units->name;?></td>
				<td><?php echo 
				($cost->pertonner==1?$cost->qty*Session::get_flash('farmSize') :
				$cost->qty);
				?></td>
				<td><?php 
				echo Form::hidden('projectStagesTasksVariableCost_id[]',$cost->id);
				echo Form::input('qty[]',($cost->pertonner==1?
				$cost->qty*Session::get_flash('farmSize') :
				$cost->qty),['class'=>'resourceQty']);?></td>
				<td><span class="resourceUnitPrice"><?php echo $cost->unitprice;?></span></td>
			
				<td><span class="resourseLineTotal"></span></td>
				<td><?php $arr=['No','Yes'];
					echo $arr[$cost->pertonner];?>
				</td>
				<td style="word-wrap: break-word"><?php echo $cost->notes;?></td>
				
			</tr>
		<?php endforeach;?>
			<!--tr>
				<th colspan="4">Total</th>
				<th colspan="4"><?php 
				//$cumulativeTotal+=$subtotal;
				//echo $subtotal;?></th>
			</tr-->
		</tbody>
          </table>

         <!--end of table-->