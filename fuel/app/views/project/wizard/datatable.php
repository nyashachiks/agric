<style>
label>input{
		width: 100% !important;
	}
</style>
<!-- start table -->

                    <table id="datatable1" class="table table-striped table-bordered"
                    style="width: 100% !important">
            <thead>
        	<tr>
        	<th>Name</th>
        	<th>Description</th>
        	<th>&nbsp;</th>
        	</tr>
        	</thead>
        	
        	<tbody>
        	<?php foreach($task as $item):?>
        	<tr>
        	<td><input type="hidden" value="<?php echo $item->id;?>" id="taskid<?php echo $item->id;?>"/>
        	<span id="row<?php echo $item->id;?>"><?php echo $item->name;?></span></td>	
        	<td><?php echo $item->description;?></td>
        	<td><button class="btn btn-mini select" type="button" 
        	onclick="GetRecord('<?php echo $item->id;?>')"> Select</button></td>	
        	</tr>
        	<?php endforeach;?>
        	</tbody>
                      
                    </table>
                  

