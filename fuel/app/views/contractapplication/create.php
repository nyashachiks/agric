<?php echo render('contractapplication/_form', array('form_label'=>'Apply for contract', 'btn_label' => 'Create')); 
echo Form::hidden('uri',Uri::base().'ajax/project/list.json?productID=',
['id'=>'uri']);
echo Form::hidden('uri',Uri::base().'project/report/',
['id'=>'uriReport']);
?>

<script>
$(document).ready(function() {
$("#projectname").change(function(event){
		var selected = $(this).val();
		$("#reportview").attr("href",uriReport+selected);
		});
    $("#projectID").change(function(event){
        // You just get the value of selected input
        // You don't need to find anything because you've already selected it
        var uri=$('#uri').val();
        var uriReport=$('#uriReport').val();
        var selected = $(this).val();
        $('#projectname').empty();
       	$('#projectname').attr('disabled',true);
		$('#reportview').attr('disabled',true);
        $.ajax({ 
                type: "GET",
                url: uri+selected,
                // Your creation of the data object is incorrect
                data: { name: selected },
                success:  function(data) {
                    console.log(data);
                    // Here just append the straight data
 					$.each(data, function(key,value) {
 						if(key=="error")
 						{
							$('#projectname').append($("<option />").val(0).text("No Project Template"));
						}
						else{
							$('#projectname').append($("<option />").val(value.id).text(value.name));
							$("#reportview").attr("href",uriReport+value.id);
							$('#projectname').removeAttr('disabled');
        					$('#reportview').removeAttr('disabled');
						}
						}); 
                }
        });
    });
});
</script>
