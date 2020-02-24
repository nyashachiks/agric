<h2>New <span class='muted'>Market</span></h2>
<br>
<?php echo render('utilities/openform');?>
<?php echo render('market/_form'); ?>
 <?php echo render('address/_form'); ?>
  
<?php echo render('utilities/submitbutton',array('img'=>'famfam/disk.png','label'=>' Save'));?>
<?php echo render('utilities/closeform');?>

<p><?php echo Html::anchor('market', 'Back'); ?></p>
