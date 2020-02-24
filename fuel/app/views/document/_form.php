<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
	<h2><?php echo $form_label; ?></h2>
	<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<?php echo Form::open(array("class"=>"form-horizontal", 'enctype' => 'multipart/form-data')); ?>
		<?php 
				list(, $userid) = Auth::get_user_id();
				echo Form::hidden('user_id', Input::post('user_id', $userid), array('id'=>'skillLaborerId')); 
		?>
		<div class="form-group">
				<?php echo Form::label('Document name', 'doc_name', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-7 col-sm-7 col-xs-12">
				<?php echo Form::input('doc_name', Input::post('doc_name', isset($document) ? $document->doc_name : ''), array('class' => 'form-control', 'placeholder'=>'')); ?>
			</div>
		</div>
		<div class="form-group">
				<?php echo Form::label('Document description', 'description', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-7 col-sm-7 col-xs-12">
				<?php echo Form::textarea('description', Input::post('description', isset($document) ? $document->description : ''), array('class' => 'form-control', 'rows' => 2, 'placeholder'=>'What is this document about?')); ?>
			</div>
		</div>
		<div class="form-group">
				<?php echo Form::label('Locate the document', 'name', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-7 col-sm-7 col-xs-12">
			<!--input name='file' type="file" id="skillFileName" required="true"/-->	
			<?php echo Form::file('file', array('required','id'=>'documentFileName', 'class' => 'form-control')); ?>
			</div>
		</div>
		<div class="ln_solid"></div>
		<div class="form-group">
			<div class="col-md-7 col-md-offset-3 col-sm-7 col-xs-12">
				<button class="btn-round btn btn-primary" type="submit"><?php echo $btn_label; ?> </button>
				<a href="<?php echo Uri::create('document'); ?>" style="text-decoration: none">
					<button class="btn-round btn btn-warning" type="button">Cancel</button>
				</a>
			</div>
		</div>
<?php echo Form::close(); ?>
	</div>
</div>
</div>

