$(document).ready(function() {
	$(document).on('click','#batch-submit', function(e) {
		e.preventDefault();
		$('#batch-file_message').text('');
		$.ajax({
			type: 'POST',
			url: method_url + '/batch',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       	},
			data: new FormData($('#batch-form')[0]),
			processData: false,
			contentType: false,
			success: function(response) {
				console.log(response);
				if(response.success) {
					console.log('success!');
					$('#text_success').text(response.records + ' records were uccesfully uploaded.');
					$('#dialog-success').modal('toggle');
					$('#batch').modal('toggle');
					fillTable('','');
				} else {
					console.log('validation error!');
					$('#batch-file_message').text(response.errors);
				}
			},
			error: function() {
				console.log('error!');
			}
		})
	});
});