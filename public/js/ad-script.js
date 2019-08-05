$(document).ready(function() {
	
	$(document).on('click', '#new_add', function(e) {
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       		}
       	})
       	e.preventDefault();
		$.ajax({
			type: 'POST',
			url: 'ads/add',
			data: new FormData($('#frm_new')[0]),
			dataType: 'json',
			processData: false,
			contentType: false,
			success: function(response) {
				console.log('success!');
                location.reload();
			},
			error: function() {
				console.log('error!');
			}
		})		
	});

	$(document).on('click', '.delete_ad', function(e) {
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       		}
       	})
       	var id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: 'ads/delete',
            data: {
                id: id,
            },
            dataType: 'json',
            success: function(response) {
                console.log('success!'); 
                location.reload();
            },
            error: function() {
                console.log('error!');
            }
        })	
	});
});