<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
                <div class="x_title">
                                <h2>Viewing #<?php echo $contracttracker->id; ?></h2>
                                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                                <br/>



	<strong>Date:</strong>
	<?php 
	echo Date::forge(1294176140)->format("%m/%d/%Y");
	//echo $contracttracker->enddate; ?></p>
<p>
	<strong>Notes:</strong>
	<?php echo $contracttracker->notes; ?></p>
<p>
	
	<?php echo Asset::img('profilepics/'.$contracttracker->picture_saved_as,['class'=>"img-rounded"]); ?></p>


                                
                </div>
</div>
</div>

<!--modal-->
<!-- Large modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" 
data-target=".bs-example-modal-sm">Update Status</button>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" 
aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
     <div class="modal-header"> 
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> 
     <h4 class="modal-title" id="myLargeModalLabel">Update Status</h4> </div> 
     <div class="modal-body"> 
     <form id="testform">
     <?php echo Form::hidden('contracttracker_id',$contracttracker->id,
     ['id'=>'contracttracker_id']);?>
  <div class="form-group">
    <label for="exampleInputEmail1">Date</label>
    <input type="date" class="form-control" id="date" placeholder="Date">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Notes</label>
    <textarea placeholder="Notes" class="form-control" id="notes">  	
    </textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Status</label>
    <?php echo Form::select('status','',['--Please Select--','Complete'=>'Complete',
    'UnComplete'=>'UnComplete'],
    ['class'=>"form-control",'id'=>'status']);?> </div>

  <button type="submit" class="btn btn-default" id="submit" onclick="event.preventDefault();Post();">Submit</button>
</form>
     </div>
    </div>
  </div>
</div>
<!--end of modal-->
<div class="panel panel-info">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Contractor Notes
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
     <table class="table table-bordered table-striped"  id="myTable">
	<thead>
		<tr>
			<th>Dates</th>
			<th>Notes</th>
			<th>Status</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php $contractorNotes=Model_Contractortracker::query()
		->where('contracttracker_id',$contracttracker->id)
		->get();
		foreach($contractorNotes as $item):?>
		<tr>
			<td><?php echo $item->date;?></td>
			<td><?php echo $item->notes;?></td>
			<td><?php echo $item->status;?></td>
			<td><button class="btn btn-sm btn-danger" 
			onclick="DeleteNotes(<?php echo $item->id;?>)"><i class="glyphicon glyphicon-trash"></i></button></td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
      </div>
    </div>
  </div>

<?php echo Html::anchor('contracttracker/edit/'.$contracttracker->id, 'Edit'); ?> |
<?php echo Html::anchor('contracttracker', 'Back'); ?>
<?php echo Form::hidden('formdata',Uri::base(),['id'=>
'uri']);?>
<script>
	var uri=$('#uri').val();
	function Post(){
			$.post( uri+'ajax/contractortracker/create', 
				 {
		'contracttracker_id':$('#contracttracker_id').val(),
		'notes':$('#notes').val(),
		'date':$('#date').val(),
		'status':$('#status').val()
    },function(data, status){
        $('#myTable').find('tbody:last').append('<tr><td>'+$('#date').val()
        +'</td><td>'+$('#notes').val()+'</td>'
        +'<td>tate</td></tr>');
    });
		}
	function DeleteNotes(id)
	{
		$(this).parent().parent().remove();
		 $.ajax({
            url: uri+'ajax/contractortracker/note/'+id, // Pass empNo
            type: "DELETE", // Use DELETE
               }).done(function() {
 alert('tate');
});
	}
</script>