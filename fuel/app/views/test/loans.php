
<div class="row-fluid">
	<h4>
		<strong>Loan management</strong>
	</h4>
</div>

<!-- filters -->
<div class="row-fluid">
	<div class="panel panel-default">
		<div class="panel-body">
			<form role="form" class="form-horizontal" method="get">
				<div class="row">
				<div class="col-md-4">
				<div class="row">
					<div class="col-md-3">
						<a style="text-decoration: none" href="<?php echo Uri::create('productoffer/index_mine'); ?>">
							<button type="button" class="btn btn-warning">Reset</button>
						</a>
					</div>
					
			    <div class="col-md-9">
			     <input type="text" name="name" class="form-control btn-block" placeholder="Search by farmer name" />
			    </div>
				</div>
				</div>
				
				<div class="col-md-4">
				<div class="row">
					<div class="col-md-3">
					By creditor
				</div>
			    <div class="col-md-7">
			     
			     <?php 
$arr=array(0=>'--select a creditor --');
$market = Model_Market::find('all');
foreach($market as $item)
	$arr[$item->id]=$item->name;
echo Form::select('market_id', Input::post('market_id', isset($productoffer) ? $productoffer->market_id : ''),
$arr,			
 array('class' => 'col-md-4 form-control')); 
?>
			     
			    </div>
				</div>
				</div>
				
				<div class="col-md-4">
					<div class="row">
					
				<div class="col-md-3">
					By status
				</div>
			    <div class="col-md-5">
			    <?php 
				$arr=array(0=>'--Select--');
				$product = Model_Product::find('all');
				foreach($product as $item)
					$arr[$item->id]=$item->name;
				echo Form::select('product_id', Input::post('product_id', isset($productoffer) ? $productoffer->product_id : ''),
				$arr,			
				 array('class' => 'col-md-4 form-control')); 
			?>
				</div>
				
				<div class="col-md-4">
			    <button type="submit" class="btn btn-primary btn-block">Search</button>
				</div>
				
					</div>
				</div>
				</div> <!-- //row -->
			</form>
		</div>
	</div>
</div>

<!-- // filters -->

<div class="row">
	<table class="table table-striped">
	<thead>
		<th>LoanID </th>
		<th>Creditor name</th>
		<th>Farmer name</th>
		<th>Loan amount</th>
		<th>Status</th>
		<th>Actions</th>
	</thead>
	
	<tbody>
		<tr>
			<td>7012</td>
			<td>Classic Leaf Tobacco</td>
			<td>Jilian Gore</td>
			<td>$3 500.00</td>
			<td><span class="label label-success">Paid up</span></td>
			<td><button class="btn btn-xs btn-primary">View</button></td>
		</tr>
		<tr>
			<td>7013</td>
			<td>Chidziva Tobacco</td>
			<td>Miriam Runesu</td>
			<td>$12 000.00</td>
			<td><span class="label label-danger">In legal action</span></td>
			<td><button class="btn btn-xs btn-primary">View</button></td>
		</tr>
		<tr>
			<td>7014</td>
			<td>CBZ Bank</td>
			<td>Thomson Magaa</td>
			<td>$4 350.00</td>
			<td><span class="label label-success">Paid up</span></td>
			<td><button class="btn btn-xs btn-primary">View</button></td>
		</tr>
		<tr>
			<td>7015</td>
			<td>Leon Africa</td>
			<td>Nobert Nyamwenda</td>
			<td>$3 500.00</td>
			<td><span class="label label-warning">In arrears</span></td>
			<td><button class="btn btn-xs btn-primary">View</button></td>
		</tr>
	</tbody>
	</table>
</div>
