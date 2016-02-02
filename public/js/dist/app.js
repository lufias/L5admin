$(document).ready(function(){


	// confirm button on delete function
	$('.delete').click(function(e){
		e.preventDefault();
		bootbox.confirm("Are you sure?", function(result) {
			if(result) {				
				window.location = $(e.target).parent('.delete').attr('href');
			}
		});
	});

	$('.select-multi').chosen();

	
});