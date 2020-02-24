<table id="datatable" class="table table-bordered table-compressed " style="width: 100% !important">
	<thead>
		<tr>
			<th>&nbsp;</th>
			<th>Cost</th>
			<th>Quantity</th>
			<th>Unit(s) Required</th>
			<th>Unit Price</th>
			<th>Affected by Yield</th>
			<td>Notes</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($collection as $item):?>
		<tr>
			<td><?php //echo Form::checkbox('test',$item->id);
			echo Form::checkbox('check[]',$item->id);?></td>
			<td><span id="name<?php echo $item->id;?>">
			<?php echo $item->name. Form::hidden('variable_i',$item->id) ;?>
			</span>	
			</td>
			<td><span id="unit<?php echo $item->id;?>">
			<?php echo (count($item->units)>0?$item->units->name:'');?>
			</span>	
			</td>
			<td><?php echo Form::input('qt'.$item->id,'',['class'=>"col-md-2 form-control",
			'id'=>'qty'.$item->id]);?></td>
			<td>
			<?php echo Form::input('unitpric'.$item->id,'',
			['class'=>"col-md-2 form-control",
			'id'=>'unitprice'.$item->id]);?>
			</td>
			
			
			<td><?php echo Form::select('pertonn'.$item->id,'',[0=>'No',1=>'Yes'],
			['class'=>"col-md-4 form-control",
			'id'=>'yield'.$item->id]) ;?></td>
			<td><textarea cols="20" rows="2" name="note<?php echo $item->id;?>"
			 class="col-md-4 form-control"
			id="notes<?php echo $item->id;?>">
				
			</textarea> </td>
			
		</tr>
		<?php endforeach;?>
	</tbody>
</table>