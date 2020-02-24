<div class="panel panel-default">
<div class="panel-body">
  <?php echo render('shared/_stage.php',['project'=>$project]);?>
</div>
<div class="panel-footer">
	<strong>Total</strong>
	<div class="pull-right"><?php echo Session::get_flash('cumulativeTotal');?></div>
</div>
</div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    