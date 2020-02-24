 <!--table-->
          <table class="table table-bordered table-striped table-condensed cpFrom">
            <thead>
			<tr>
				<?php if($show_update_disburse_text_field): ?>
					<th>Disburse</th>
				<?php endif; ?>
				<th>Cost</th>
				<th>Units</th>
				<th>Approved Qty</th>
				<th>Disbursed</th>
				<?php if($show_update_disburse_text_field): ?>
					<th>Disburse</th>
				<?php endif; ?>
				<th>Unit Price</th>
				<th>Total</th>
				<th>Per Tonne</th>
				<th>Notes</th>
				
			</tr>
		</thead>
		<tbody id="resourceTBody">
		<?php 
		$subtotal=0;
		
		$target = Uri::segment(3);
		//file name
		$fname 		 = '/tmp/load_'.$target.'.txt';

		foreach($task->project_stages_tasks_variablecosts as $cost):
		$checkContractQuantity=Model_Contractquantity::query()
				->select('quantities','id')
				->where('contractapplication_id',Session::get_flash('contactApplicationId'))
				->where('projectStagesTasksVariableCost_id',$cost->id)
				->get_one();
				$costQty = is_null($checkContractQuantity) ? $cost->qty:$checkContractQuantity->quantities;

		?>
			<tr>
			<?php $line_str 	= $target.',';  ?>
			
				<?php if($show_update_disburse_text_field): ?>
					<td><?php 
					//$arr=['0'=>'No','1'=>'Yes'];
					echo Form::checkbox('disburse[]',$cost->id.'_'.$checkContractQuantity->id) ;?></td>
				<?php endif; ?>		
				<td><?php echo $cost->variablecost->name;
				$line_str .= $cost->variablecost->name.',';
				
				?></td>
				
				<td><?php echo $cost->variablecost->units->name;
				$line_str .= $cost->variablecost->units->name.',';
				?></td>
				<td><?php echo $costQty;
				$line_str .= $costQty.',';
				?></td>
				<td>
				<?php 
				$disbursedQty=0;
				$disburse=Model_Contract_Disburse::query()->select('quantities')
				->where('contractquantities_id',$checkContractQuantity->id)->get();
				
				//Kuti zvisanetse mune ramangwana!!
				$approved_quantity = $costQty;
				
				foreach($disburse as $itemDisbursed)
				{
					$disbursedQty+=$itemDisbursed->quantities;
				}
				$costQty -= $disbursedQty;
				echo  $disbursedQty;
				
				$line_str .=  $disbursedQty.',';
				?>
				</td>
				<?php if($show_update_disburse_text_field): ?>
					<td><?php 
					if($costQty>0):
					echo Form::input('qty'.$cost->id,$costQty,['class'=>'resourceQty']);
					else:
					?>
					<?php echo $costQty;?>	
					<?php endif;?>	
					</td>
				<?php endif; ?>
				
				<td><span class="resourceUnitPrice"><?php echo number_format($cost->unitprice, 2,"."," ");
				
				$line_str .=  $cost->unitprice.',';
				?></span></td>
			
				<td><span class="resourseLineTotal"> <?php 
					//UNIT price x approved qty!!
					//---------------------------
					$line_total = $cost->unitprice*$approved_quantity ;
					echo number_format($line_total, 2,"."," ");

					$line_str .= $line_total;
					

				 ?></span></td>
				<td><?php $arr=['No','Yes'];
					echo $arr[$cost->pertonner];?>
				</td>
				<td style="word-wrap: break-word"><?php echo $cost->notes;
					
					
				?></td>
				
				<?php file_put_contents($fname,$line_str.PHP_EOL,FILE_APPEND);  ?>
			</tr>
		<?php
					//LETS WRITE to File
					file_put_contents($fname,$line_str.PHP_EOL);
					$sql =  "
						LOAD DATA LOCAL  INFILE '". $fname ."' INTO TABLE nasty_tricks
						FIELDS TERMINATED BY ',' 
						;";
					\DB::query($sql)->execute();
		 endforeach;?>
		
			<!--tr>
				<th colspan="4">Total</th>
				<th colspan="4"><?php 
				//$cumulativeTotal+=$subtotal;
				//echo $subtotal;?></th>
			</tr-->
		</tbody>
          </table>
         <!--end of table-->
