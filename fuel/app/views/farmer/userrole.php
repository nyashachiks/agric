
<br />
<div class="row">
<div class="col-md-4">&nbsp;</div>
<div class="col-md-4">
<div class="alert alert-info">
	<span class="glyphicon glyphicon-info-sign glyphicon glyphicon-white"></span>
	Last step!
</div>
<br>
<div class="panel panel-primary">
<div class="panel-heading">
	Please Pick Job post
</div>
<div class="panel-body">
<div class="row-fluid">
<div class="col-md-2">
	Role
</div>
<?php echo render('utilities/openform');?>
<div class="col-md-10">
	<?php echo render('utilities/_userplacement',array('roles'=>$roles));?>
</div>
</div>
<div class=row-fluid">
	<div class="col-md-2">
		<!--submit button-->
		<?php echo render('utilities/_genericbutton',array(
		'type'=>'submit',
		'img'=>'famfam/disk.png',
		'label'=>' Save',
		'view'=>'edit',
		));
		?>
	</div>
</div>

</div>
<div class="panel-footer">
	<button type="submit">Finish</button>
</div>
</div>
<?php echo render('utilities/closeform');?>
</div>
<div class="col-md-4">&nbsp;</div>
</div>