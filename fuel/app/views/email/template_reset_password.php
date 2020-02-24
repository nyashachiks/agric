<!DOCTYPE html">
<html>
<head>
<title>Password reset</title>
<meta name="" content="">

<style>
	body{
		font-family: verdana, sans-serif;
		font-size: 14px;
		line-height: 18px;
	}
</style>
</head>
<body>

<p>Dear <strong><?php echo $full_name; ?></strong>, </p>

<p>
You have requested a password reset for the <?php echo strtoupper(\Config::get('app.app_name')); ?>  system, here are the new credentials generated for you: </p>

<p>
******************************** <br/>
Username =  <strong><?php echo $username; ?></strong> <br/>
Password =  <strong><?php echo $new_password; ?></strong> <br/>
******************************** <br/>
</p>

<p>
Best regards <br/> 
<br/>
	
	The <?php echo \Config::get('app.app_name'); ?> Team
</p>

</body>
</html>