 <table class="table table-bordered table-striped table-condensed cpFrom">
            <thead>
			<tr>
				<th>Cost</th>
				<th>Units</th>
				<th>Recommended Qty</th>
				<th>Disbursed Qty</th>
				<th>Approved Qty</th>
				<th>Unit Price</th>
				<th>Total</th>
				<th>Per Tonne</th>
				<th>Notes</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		$subtotal=0;
		
		$target = Uri::segment(3);
		//file name
		$fname 		 = '/tmp/load_'.$target.'.txt';
		
		foreach($task->project_stages_tasks_variablecosts as $cost):
		$checkContractQuantity=Model_Contractquantity::query()
				->select('quantities')
				->where('contractapplication_id',$contactApplicationId)
				->where('projectStagesTasksVariableCost_id',$cost->id)
				->get_one();
				$costQty=(is_null($checkContractQuantity)?$cost->qty:
				$checkContractQuantity->quantities);
		$disbursed=Model_Contract_Disburse::query()
		->where('contractquantities_id',$checkContractQuantity->id)
		->get_one();
		$disbursedQty=count($disbursed);
		
		// now we have id of the disbursement record id. init to 0 otherwise
		$disbursedQty = 0;
		if(count($disbursedQty)){
			if(is_object($disbursed)){
				$disbursedQty =  $disbursed->quantities;
			}
		}
		?>
			<tr>
				<?php $line_str 	= $target.',';  ?>
						
				<td><?php echo $cost->variablecost->name;
				$line_str .= $cost->variablecost->name.',';
				?></td>
				
				<td><?php echo $cost->variablecost->units->name;
				$line_str .= $cost->variablecost->units->name.',';
				?></td>
				<td><?php echo $cost->qty;
				$line_str .= $costQty.',';
				?></td>
				<td><?php 
					//Kuti zvisanetse mune ramangwana!!
					$approved_quantity = $costQty;
					//$costQty -= $disbursedQty;
					echo  $disbursedQty;
					$line_str .=  $disbursedQty.',';
				
				?></td>
				<td><?php 
				echo Form::hidden('variablecost_id[]',$cost->id);
				echo $costQty;?></td>
				<td><?php echo $cost->unitprice;
				$line_str .=  $cost->unitprice.',';
				
				?></td>
				
				
				<td><span class="resourseLineTotal"> <?php 
					//UNIT price x approved qty!!
					//---------------------------
					$line_total = $cost->unitprice*$approved_quantity ;
					echo number_format($line_total, 2,"."," ");

					$line_str .= $line_total;
					

				 ?></span></td>
				
				
				
			
				<td><?php $subtotal+=($costQty * $cost->unitprice);
				 echo ($costQty * $cost->unitprice);?></td>
				<td><?php $arr=['No','Yes'];
					echo $arr[$cost->pertonner];?>
				</td>
				<td style="word-wrap: break-word"><?php echo $cost->notes;?></td>
				<?php file_put_contents($fname,$line_str.PHP_EOL,FILE_APPEND);  ?>
			</tr>
		<?php 
		
		
		
		
		//LETS WRITE to File
					file_put_contents($fname,$line_str.PHP_EOL);
					$sql =  "
						LOAD DATA LOCAL INFILE '". $fname ."' INTO TABLE nasty_tricks
						FIELDS TERMINATED BY ',' 
						;";
					\DB::query($sql)->execute();
		endforeach;?>
			<tr>
				<th colspan="5">Total</th>
				<th colspan="4"><?php 
				Session::set_flash('cumulativeTotal',
			Session::get_flash('cumulativeTotal')+$subtotal);//	$ cumulativeTotal+=$subtotal;
				echo $subtotal;?></th>
			</tr>
		</tbody>
          </table>