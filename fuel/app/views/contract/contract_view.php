<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<?php 
				
						$contractor= Auth\Model\Auth_User::find($contractor_id);
						
						$firstname='';
					  	$lastname='';
					  	
					  	//getting metadata
						  foreach($contractor->metadata as $meta)
						  {
						  	//Debug::dump($meta);die;
						  	if($meta->key=='first_name')
						  		$firstname=$meta->value;
						  	
						  	if($meta->key=='last_name')
						  		$lastname=$meta->value;
						  }
						
					
				?>
		
		<h2>Listing Agent <?php echo $firstname." ".$lastname; ?>'s  current contracts</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		
<?php 
 if ($contracts):
	
	$seasons=array();
	foreach($contracts as $contract):
	{
		$name = $contract->contractapplication->product->name.'-'.$contract->contractapplication->season->name.'-'.$contract->contractapplication->year;
		if (in_array($name, $seasons))
		  {
		 	array_push(${"" . $name}, $contract);
		  }
		else
		  {
		  	array_push($seasons, $name);
		  	${"" . $name}=array();
		  	array_push(${"" . $name}, $contract);
		  }
	}
	endforeach;
	foreach($seasons as $season)
	{
		$total_yield=0;
		$total_amount=0;
		$pieces = explode("-", $season);

		echo "<h4>Product =>". $pieces[0]."</h4>";
		echo "Season ".$pieces[1]." " . $pieces[2];
		echo "<table class='table table-striped'>";
		echo "<thead>";
		echo "<tr>";
			
			
			echo "<th>Farmer Name</th>";
			echo "<th>Farm Name</th>";
			echo "<th>Size</th>";
			echo "<th>Product</th>";
			echo "<th>Season </th>";
			echo "<th>Year </th>";
			echo "<th>Loan amount</th>";
			echo "<th>Expected Yield</th>";
			
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		
		foreach (${''.$season} as $item)
		{
			echo "<tr>";
				echo "<td>";
					$farmer_id= $item->contractapplication->farmer_id;
						$farmer= Auth\Model\Auth_User::find($farmer_id);
						
						$ffirstname='';
					  	$flastname='';
					  	
					  	//getting metadata
						  foreach($farmer->metadata as $meta)
						  {
						  	//Debug::dump($meta);die;
						  	if($meta->key=='first_name')
						  		$ffirstname=$meta->value;
						  	
						  	if($meta->key=='last_name')
						  		$flastname=$meta->value;
						  }
						
					echo $ffirstname." ".$flastname;
				echo "</td>";
				echo "<td>";
						echo $item->contractapplication->farm->name; 
				echo "</td>";
				echo "<td>";
						echo $item->contractapplication->farm->size.' '.$item->contractapplication->farm->units;
				echo "</td>";
				echo "<td>";
						echo $item->contractapplication->product->name;
				echo "</td>";
				echo "<td>";
						echo $item->contractapplication->season->name;
				echo "</td>";
				
				echo "<td>";
						echo $item->contractapplication->year;
				echo "</td>";
				echo "<td>";
						echo '$'.$item->loan_amount; 
						$total_amount=$total_amount+$item->loan_amount;
				echo "</td>";
				echo "<td>";
					 echo $item->contractapplication->project->expected_yield.' Tonnes'; 
					 $total_yield=$total_yield+$item->contractapplication->project->expected_yield;		
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
			
			
		}
		echo "<td><strong>Total</strong></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td><strong>$".$total_amount."</strong></td>";
			echo "<td><strong>". $total_yield .' Tonnes'. "</strong></td>";

			echo "</tr>	";
		echo "</tbody>";
			echo "</table>";
	}
	
 
	?>			
			

<?php else: ?>
<div class="alert alert-danger">
	<p>There are no pending contracts.</p>
</div>

<?php endif; ?>
		
	</div>
</div>
</div>