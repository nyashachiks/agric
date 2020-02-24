<h3>Viewing Disease</h3>

<div class="row-fluid">
	<div class="col-md-12 col-xs-12">
		<div class="panel panel-default">
			
			<div class="panel-body">
				<div class="row">
				<div class="col-md-6">
					<strong>Disease Name:</strong>
					<?php echo $disease->name; ?>
				</div>
				<div class="col-md-6">
					<strong>Description:</strong>
					<?php echo $disease->description; ?>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="col-md-6 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">Symptoms</h4>
			</div>
			<div class="panel-body">
				<?php $dsymps=$disease->diseasesymptoms;
					foreach($dsymps as $dsymptom)
					{
						echo "<li>".$dsymptom->symptom->description.'</li>';
					}
				?>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xs-12">
	<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">Corrective measure</h4>
			</div>
			<div class="panel-body">
				<?php $cmeasures=$disease->correctivemeasures;
					echo "<ul>";
					foreach($cmeasures as $cmeasure)
					{
						echo "<li>".$cmeasure->description.'</li>';
					}
					echo "</ul>";
				?>
			</div>
		</div>
		
	</div>
</div>
</div>
<div class="col-md-5">
	<?php
	$file = Asset::get_file('disease/'.$disease->image_name,'img');
	if($file == false){
		$file = Uri::base(false)."/assets/img/disease/default.jpg";
	}
	?>
		<img width="320px" class="thumbnail" src="<?php echo $file; ?>" />
	</div>
</div>
<div style="clear: both"></div>
	
<div class="row-fluid">
	<a href="<?php echo Uri::create('disease/search'); ?>" style="text-decoration: none">
		<button style="margin-left: 30px; margin-botoom: 20px;" class="btn btn-md btn-warning">Back</button>
	</a>
</div>
