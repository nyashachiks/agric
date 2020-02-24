<h2>Editing <span class='muted'>Product</span></h2>
<br>

<?php echo render('product/_form'); ?>
<p>
	<?php echo Html::anchor('product/view/'.$product->id, 'View'); ?> |
	<?php echo Html::anchor('product', 'Back'); ?></p>
