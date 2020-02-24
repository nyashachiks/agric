<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Contract application : negotiate</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<div class="row-fluid" style="">
<div class="col-md-6">
	<div class="thumbnail">
		<img class="img-round" src="<?php echo Model_User::get_user_profile_pic_url($contractapplication->farmer_id); ?>" width="320" height="320" />
	</div>
</div>	
<div class="col-md-6">
	<table class="table table-striped table-bordered">
		<tbody>
		<tr>
				<td><strong>Application status:</strong></td>
				<td> 
					<?php if(strtolower($contractapplication->status) == 'open'): ?>
					<span class="label label-info">
						<?php echo $contractapplication->status; ?>
					</span>
					<?php endif; ?>
					<?php if(strtolower($contractapplication->status) == 'closed'): ?>
					<span class="label label-success">
						<?php echo $contractapplication->status; ?>
					</span>
					<?php endif; ?>
				 </td>
			</tr>
			<tr>
				<td><strong>Farmer name:</strong></td>
				<td>
				<?php 
					 $farmer_id = $contractapplication->farmer_id;
					 $farmer= Auth\Model\Auth_User::find($farmer_id);
				  	 echo $farmer->first_name." ".$farmer->last_name;
				?>
				</td>
			</tr>
			<tr>
				<td><strong>Farm name:</strong></td>
				<td><?php  echo $contractapplication->farm->name; ?></td>
			</tr>
			<tr>
				<td><strong>Application date:</strong></td>
				<td><?php 
				echo Date::forge($contractapplication->created_at)
				->format("%d-%m-%Y @ %H:%M").' hrs'; ?></td>
			</tr>
			<tr>
				<td><strong>Farming year:</strong></td>
				<td><?php echo $contractapplication->year;  ?></td>
			</tr>
			<tr>
				<td><strong>Season:</strong></td>
				<td><?php echo $contractapplication->season->name;   ?></td>
			</tr>
			<tr>
				<td><strong>Farm size:</strong></td>
				<td><?php 
				Session::set_flash('farmSize',
				Custom_Unitsconvertor::AcresToHectars($contractapplication->size,
				$contractapplication->measure_unit));
				echo $contractapplication->size." ".$contractapplication->measure_unit; ?></td>
			</tr>
			<tr>
				<td><strong>Product</strong></td>
				<td><?php echo $contractapplication->product->name; ?></td>
			</tr>
		</tbody>
	</table>
</div>
</div>
<div class="clearfix" style="margin-bottom: 20px"></div>

<?php echo Form::open(Uri::base().'Contractquantities/create');
echo Form::hidden('contractapplication_id',$contractapplication->id);?>

<?php
if(isset($contractapplication->project)){
	 echo render('contractapplication/_projectsubreport.php',
	 ['project'=>$contractapplication->project]);
	 }
	 else
	 {
	 	echo "No project template was used!";
	 }
	 ?>

<div class="row-fluid">
	<table class="table table-striped table-bordered">
		<tbody>
			<tr>
				<td>
						
						<button type="submit" class="btn btn-md 
						btn-success">Create contract</button>
						
						<a href="<?php echo Uri::create('contractapplication/index_open'); ?>" 
						style="text-decoration: none" class="btn btn-md btn-warning">
							Back
						</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?php Form::close();?>
		
	</div>
</div>
</div>
<script>

TotalBudget(); 
$('.resourceQty').on('input',function(e){
     TotalBudget();
    });
function TotalBudget()
{
	var total=0;
	$('#resourceTBody tr').each(function () {
    var $this = $(this);
    sum = parseFloat($this.find('.resourceQty').val()) *
         parseFloat($this.find('.resourceUnitPrice').html());
     $this.find('.resourseLineTotal').html(sum);   
    total+=sum;
    $('.panel-footer .pull-right').html(total);
	});
}
</script>