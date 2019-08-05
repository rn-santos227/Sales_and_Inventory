$(document).ready(function(){
	$(document).on('click','.numpad', function() {
		var number = $('#cashier-cash').val();
		var value = $(this).val();
		if(number.substring(0, 1) == '0') number = '';
		$('#cashier-cash').val(number + value);
		compute($('#cashier-cash').val());
	});

	$(document).on('click', '.dzero', function() {
		var number = $('#cashier-cash').val();
		if(number <= 0) return;
		$('#cashier-cash').val(number + '00');
		compute($('#cashier-cash').val());
	});

	$(document).on('click', '.clearzero', function() {
		$('#cashier-cash').val('0');
		compute($('#cashier-cash').val());
	});

	$(document).on('click','.decimal', function() {
		var number = $('#cashier-cash').val();
		if(number.includes('.')) return;

		$('#cashier-cash').val(String(number) + '.');
		compute($('#cashier-cash').val());
	});

	$(document).on('click', '.increase', function() {
		var number = $('#cashier-cash').val();
		$('#cashier-cash').val(Number($('#cashier-cash').val()) + 1);
		compute($('#cashier-cash').val());
	});

	$(document).on('click', '.decrease', function() {
		var number = $('#cashier-cash').val();
		if(number <= 0) return;
		$('#cashier-cash').val(Number($('#cashier-cash').val()) - 1);
		compute($('#cashier-cash').val());
	});

	$(document).on('click', '.erase', function() {
		var number = $('#cashier-cash').val();
		if(number.length <= 1) {
			$('#cashier-cash').val(0);
			return;
		}
		$('#cashier-cash').val(number.substring(0, number.length - 1));
		compute($('#cashier-cash').val());
	});
});