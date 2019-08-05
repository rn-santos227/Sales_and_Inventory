$(document).ready(function() {

	$(document).on('click', '#cashier-modal', function(e) {
<<<<<<< HEAD
		if(Number($('#cashier-amount_due').val()) > 0) {
=======
		if(Number($('#receipt-amount_due').val()) > 0) {
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
			$('#cashier').modal({
				backdrop: 'static',
				keyboard: false,
			});
		} else {
			$('#dialog-warning').modal('toggle');
			$('#text_warning').text('The tray is empty.');
		}
	});
});