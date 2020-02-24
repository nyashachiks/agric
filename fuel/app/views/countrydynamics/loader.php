<?php
	$base = Uri::base();
?>

<script>
	
	// we will use AJAX and REST service to populate city names. 
	//Surburbs will populate depending on the selected city
	// ids = country, state, and district
	
	var base_uri = "<?php echo $base; ?>";
	
	$(document).ready(function(){
	  
	  //load provinces for the selected country
	  $('#country').change(function(){
	  	var selCountryId = $(this).find(':selected').val();
	    
	    //load provinces drop down
	    loadProvinces(selCountryId);
	    clearDistricts();
	    	
	  });
	  
	   $('#state').change(function(){
	  	var selProvinceId = $(this).find(':selected').val();
	    
	    //load provinces drop down
	    loadDistricts(selProvinceId);
	    	
	  });

	})
	
//reset districts
function clearDistricts()
{
	var distr = $("#district");
	distr.empty();
	distr.append($("<option></option>").attr("value", 0).text('- Select a district -'));
}

//reset provinces
 function clearProvinces()
{
	var distr = $("#state");
	distr.empty();
	distr.append($("<option></option>").attr("value", 0).text('- Select a province -'));
}
	
function loadProvinces(selCountryId){
    $("#state").children().remove();
    $.ajax({
        type: "GET",
        url: base_uri + "/rest/countrydynamics/provinces.json",
        data: "countryid=" + selCountryId,
        success: function(json) {

        var $el = $("#state");
        $el.empty(); // remove old options

        $.each(json, function(value, key) {
            $el.append($("<option></option>")
                    .attr("value", value).text(key));
        });														
    }
     
    });
}

function loadDistricts(selProvinceId){
    $("#district").children().remove();
    $.ajax({
        type: "GET",
        url: base_uri + "/rest/countrydynamics/districts.json",
        data: "provinceid=" + selProvinceId,
        success: function(json) {

        var $el = $("#district");
        $el.empty();
        
        $.each(json, function(value, key) {
            $el.append($("<option></option>")
                    .attr("value", value).text(key));
        });														
    }
     
    });
}
	
</script>