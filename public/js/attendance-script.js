$(document).ready(function() {
	$(document).on('click', '.set-attendance', function() {
		var attendance = $(this).val() === 1 ? 0 : 1;
		$.ajax({
			type: 'POST',
			url: '/attendance/call',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       	},
			data: {
        		employee_id: $(this).attr('id'),
        		value: attendance,
        	},
			success: function(response) {
				console.log('success!');

			},
			error: function() {
        		console.log('error!');
        	}
		})
	});
});