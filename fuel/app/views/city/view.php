<p>
	<strong>City:</strong>
	<?php echo $city->city; ?>
</p>
<?php  $country=$city->country;
		echo render('country/view',array('country'=>$country)); ?>