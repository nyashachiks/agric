<style>
.form-control{
	width: 80%;
	padding-left: 10px;
}
h1 small{
	color: #fff;
}
</style>
<div class="page-header">
	<h1>Registration: <small>create an account</small></h1>
</div>

<?php  echo render('utilities/openform');?>
<?php echo render('user/_form_company'); ?>
<p>
<?php echo render('utilities/submitbutton',array('label'=>'Save','class'=>' btn btn-primary')); ?>
<a href="<?php echo Uri::base().'user/companyUsers';?>" class="btn btn-warning"> Back</a>
</p>