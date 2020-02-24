<style>
.hero .hero-content {
	padding-top: 15%;
}

.hero h1 {
	font-size: 40px;
}

.control-label {
	color: #fff;
}

</style>

<?php echo Asset::js('country.js'); ?>
<script>
	populateCountries("country", "state","district");
</script>

<div class="container">
<div class="row" style="margin-top: 60px;">
	<div class="col-md-8 col-md-offset-2">
		<div class="hero-content text-center">
		<h1 style="text-transform: uppercase;">Login to SmartFarmer</h1>
		</div>
	</div>
</div>

<!-- alerts -->

<style>
	.libs-input {
		margin-bottom: 30px;
		height: 60px;
		border: none;
		color: green;
	}
</style>
<div class="row">
<?php if (Session::get_flash('success')): ?>
	<div class="alert alert-success">
		<strong>Success</strong>
		<p>
		<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
		</p>
	</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
	<div class="alert alert-danger">
		<strong>Error(s) encountered:</strong>
		<p>
		<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
		</p>
	</div>
<?php endif; ?>
</div>
<!-- /alerts -->

	<form class="form-vertical" method="post">
<div class="row" style="background: none; opacity: 0.9; min-height: 200px; padding: 20px 0;">
	<div class="col-md-8 col-md-offset-2">
		
	
				    <input class="form-control input-lg libs-input" placeholder="E-mail or phone number" name="username" type="text">
				    <input class="form-control input-lg libs-input" placeholder="Password" name="password" type="password" value="">

	</div>
</div>

<div class="row form-actions text-center" style="margin-top: 20px;">
	<button type="submit" class="btn btn-primary btn-large">Log in</button>
	<a href="<?php echo Uri::create('/'); ?>">
		<button type="button" class="btn btn-fill btn-large">Cancel</button>
	</a>
</div>
	</form>

</div>