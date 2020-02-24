<h3>Viewing Contract application for <span class='muted'><?php echo $contractapplication->farm->name; ?>  </span></h3>

<p>
	<strong>Farm Name:</strong>
	<?php echo $contractapplication->farm->name; ?></p>
<p>
	<strong>Farmer Name:</strong>
	<?php 
		$farmer_id = $contractapplication->farmer_id;
		$farmer= Auth\Model\Auth_User::find($farmer_id);
					  	
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

			?>
</p>

<p>
	<strong>Season :</strong>
	<?php echo $contractapplication->season->name; ?></p>
<p>
	<strong>Year:</strong>
	<?php echo $contractapplication->year; ?></p>
<p>
	<strong>Product:</strong>
	<?php echo $contractapplication->product->name; ?></p>
<p>
	<strong>Size:</strong>
	<?php echo $contractapplication->size .' ' .$contractapplication->measure_unit; ?></p>

<p>
	<strong>Status:</strong>
	<?php echo $contractapplication->status; ?></p>
	
	<p>
<p>
	<?php 
			$bags = 0.5;
			$bagamount=2.50;
			
			$laborers = 0.1;
			$laborersamount = 3;
			
			$fertiliserbags = 0.25;
			$fertiliserbagsamount=2;
			
			$harvesting = 1.25 ;
			$size =$contractapplication->size;
		if($contractapplication->measure_unit==='Square Kilometers'):
		
			$seedbags= $bags*$size;
			$seedcost=$seedbags*$bagamount;
			$totlaborers=$laborers*$size;
			$laborerescost=$totlaborers*$laborersamount;
			$fertbags=$fertiliserbags*$size;
			$totfert=$fertbags*$fertiliserbagsamount;
			$totharveting = $harvesting*$size;
			$total=$seedbags+$laborerescost+$totfert+$totharveting;
			$expectedyield=$seedbags*$size*10;

			echo "Seed bags needed are " .$seedbags ." bags";
			echo "<br/>Total cost of seed is $" .$seedcost;
			echo "<br/>The number of laborers needed " .$totlaborers;
			echo "<br/>Total cost of laborers is $" .$laborerescost;
			echo "<br/>Fertliser bags needed are " .$fertbags." bags";
			echo "<br/>Total cost of fertilizer is $" .$totfert;
			echo "<br/>Total cost of harvesting  is $" .$totharveting;
			echo "<br/><b>Total cost of everything is $" .$total."<b/>";
			echo "<br/><b>Expected yield is " .$expectedyield." kgs <b/>";

	
		elseif($contractapplication->measure_unit==='Acres'):
			$seedbags= $bags*$size*10;
			$seedcost=$seedbags*$bagamount;
			$totlaborers=$laborers*$size*10;
			$laborerescost=$totlaborers*$laborersamount;
			$fertbags=$fertiliserbags*$size*10;
			$totfert=$fertbags*$fertiliserbagsamount;
			$totharveting = $harvesting*$size * 10;
			$total=$seedbags+$laborerescost+$totfert+$totharveting;
			$expectedyield=$seedbags*$size*10;

			echo "Seed bags needed are " .$seedbags ." bags";
			echo "<br/>Total cost of seed is $" .$seedcost;
			echo "<br/>The number of laborers needed " .$totlaborers;
			echo "<br/>Total cost of laborers is $" .$laborerescost;
			echo "<br/>Fertliser bags needed are " .$fertbags." bags";
			echo "<br/>Total cost of fertilizer is $" .$totfert;
			echo "<br/>Total cost of harvesting  is $" .$totharveting;
			echo "<br/><b>Total cost of everything is $" .$total."<b/>";
			echo "<br/><b>Expected yield is " .$expectedyield." kgs <b/>";

	
		
		elseif ($contractapplication->measure_unit==='Hectares'):
			$seedbags= $bags*$size*100;
			$seedcost=$seedbags*$bagamount;
			$totlaborers=$laborers*$size*100;
			$laborerescost=$totlaborers*$laborersamount;
			$fertbags=$fertiliserbags*$size*100;
			$totfert=$fertbags*$fertiliserbagsamount;
			$totharveting = $harvesting*$size * 100;
			$total=$seedbags+$laborerescost+$totfert+$totharveting;
			$expectedyield=$seedbags*$size*10;

			echo "Seed bags needed are " .$seedbags ." bags";
			echo "<br/>Total cost of seed is $" .$seedcost;
			echo "<br/>The number of laborers needed " .$totlaborers;
			echo "<br/>Total cost of laborers is $" .$laborerescost;
			echo "<br/>Fertliser bags needed are " .$fertbags." bags";
			echo "<br/>Total cost of fertilizer is $" .$totfert;
			echo "<br/>Total cost of harvesting  is $" .$totharveting;
			echo "<br/><b>Total cost of everything is $" .$total."<b/>";
			echo "<br/><b>Expected yield is " .$expectedyield." kgs <b/>";

		endif;
		
	?>
</p>
		<?php echo Html::anchor('contract/createcontract/'.$contractapplication->id, 
		'Create Contract', array('class' => 'btn btn-success')); ?>
	</p>
	
<br/>
<?php echo Html::anchor('contractapplication/index_open', 'Back'); ?>