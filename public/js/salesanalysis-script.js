$(document).ready(function() {
	$(document).on('input', '.periodOption', function(e) {

		var period = $(this).val()

		if(period == '')
		{
			$("#datefrom").attr("disabled","disabled");
			$("#dateto").attr("disabled","disabled");
			$("#btnSearchRange").attr("disabled","disabled");
		}

		else
		{
			$("#datefrom").removeAttr("disabled");
			$("#dateto").removeAttr("disabled");

			var datefromSelect = document.getElementById('datefrom');
			var datetoSelect = document.getElementById('dateto');
		}
	});

	$(document).on('input', '#datefrom', function(e) {
		var datefrom = $('#datefrom').val();
		var dateto = $('#dateto').val();

		if(!(datefrom == '' || dateto == ''))
		{
			$("#btnSearchRange").removeAttr("disabled");
		}
	});

	$(document).on('input', '#dateto', function(e) {
		var datefrom = $('#datefrom').val();
		var dateto = $('#dateto').val();

		if(!(datefrom == '' || dateto == ''))
		{
			$("#btnSearchRange").removeAttr("disabled");
		}
	});
});


// // Back up
// datefromSelect.options.length = 0;
// datetoSelect.options.length = 0;

// if(period == 'Months')
// {
	
// 	var options = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', ];

// 	for(var i = 0; i <= options.length-1; i += 1 )
// 	{
// 		$('#datefrom').append($('<option>', {
// 		    value: i,
// 		    text: options[i]
// 		}));

// 		$('#dateto').append($('<option>', {
// 		    value: i,
// 		    text: options[i]
// 		}));
// 	}
// }