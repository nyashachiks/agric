<div class="panel panel-default">
<div class="panel-body">
  <?php echo render('shared/_stageGraph.php',['project'=>$project]);?>
</div>
<div class="panel-footer">
	<strong>Critical Path</strong>
	<div class="pull-right"><?php echo Session::get_flash('criticalDays').' day(s)';?></div>
</div>
</div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    