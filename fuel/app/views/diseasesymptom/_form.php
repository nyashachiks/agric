<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2><?php echo $form_label; ?></h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<?php echo Form::open(array("class"=>"form-horizontal")); ?>
		
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12">Disease Name</label>
			<div class="col-md-7 col-sm-7 col-xs-12">
				<?php 
					$arr=array(0=>'--Please Select a Disease--');
					$diseases = Model_Disease::find('all');
					foreach($diseases as $disease)
						$arr[$disease->id]=$disease->name;
					echo Form::select('disease_id', Input::post('disease_id', isset($diseasesymptom) ? $diseasesymptom->disease_id : ''),
					$arr,			
					 array('class' => 'form-control')); 
				?>
			</div>
		</div>
		<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Symptom description</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php 
					$arr=array(0=>'--Please Select a Symptom--');
					$symptoms = Model_Symptom::find('all');
					foreach($symptoms as $symptom)
						$arr[$symptom->id]=$symptom->description;
					echo Form::select('symptom_id', Input::post('symptom_id', isset($diseasesymptom) ? $diseasesymptom->symptom_id : ''),
					$arr,			
					 array('class' => 'form-control')); 
				?>
				
	</div>
</div>
		
		<div class="form-group">
	<div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-3">
		<button class="btn btn-md btn-success btn-round" type="submit">Submit</button>
		<a href="<?php echo Uri::create('diseasesymptom'); ?>" style="text-decoration: none;">
			<button class="btn btn-md btn-warning btn-round" type="button">Cancel</button>
		</a>
	</div>
</div>
<?php echo Form::close(); ?>
		
	</div>
</div>
</div>