function get_ajx_wards(ward_id){
	
	var division_id1 = $('#division_id').val();
	var ward_id1 = ward_id;
	$.ajax({
		type: "post",
		url: base_url+"home/get_wards/",
		cache: false,				
		data:{'division_id':division_id1,'ward_id':ward_id1},
		success: function(response){
			$('#ward_id').html(response);
		},
		error: function(){						
			//alert('Error while request..');
		}
	 }); 
}