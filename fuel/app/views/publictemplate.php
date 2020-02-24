<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css(array(
		'bootstrap.css',
		'custom.css'
	)); ?>
	<?php echo Asset::js('country.js'); ?>
	<style>
		.container {
			background: none;
			border: none;
		}
		
		
		html{
			background-image: url(<?php echo Asset::get_file('landing_page.png','img'); ?>);
			background-repeat: no-repeat;
			background-size: 100% ;
		}
		
	</style>
</head>
<body>
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
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
					<strong>Error</strong>
					<p>
					<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
					</p>
				</div>
			<?php endif; ?>
		</div>
			
			<div class="col-md-12">
				<?php echo $content; ?>
			</div>
	</div>
	<!-- lets stick the footer to page bottom -->
	<footer>
			<p style="line-height: 45px;">
				<b>Created by Eccensys Technologies 2019.</b>
			</p>
	</footer>
	<!-- /footer -->
</body>
</html>
