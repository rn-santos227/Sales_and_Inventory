$(document).ready(function(){
	//Auto-Launch Functions
<<<<<<< HEAD
	fillTable('','');
	
=======

>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	//Event Functions
	$(document).on('click', '.dismiss', function(e) {
		resetFields('#add-');
		resetFields('#update-');
<<<<<<< HEAD
		setFieldsToBlank('#add-');
		setFieldsToBlank('#update-');
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	});

	$(document).on('click','.btn_search', function(e) {
		var search = $('#txt_search').val();
		var tags = $('#cbo_tag').val();
		console.log(tags);
		fillTable(search, tags);
	});

	$(document).on('click', '.btn_view', function(e) {
		setsCSRFToken(e);
		var id = $(this).val();
		console.log(id);
		var formData = getRecords('#view-');
		$.ajax({
			type: 'POST',
			url: method_url + '/view',
			data: {
				id: id
			},
			success: function(response) {
				view(response);
			},
			error: function() {
				console.log('error!');
			}
		})

	})

	$(document).on('click', '.btn_fetch', function(e) {
		setsCSRFToken(e);
		var id = $(this).val();
		$.ajax({
			type: 'POST',
			url: method_url + '/view',
			data: {
				id: id
			},
			success: function(response) {
				fetch(response);
			},
			error: function() {
				console.log('error!');
			}
		})
	});

	$(document).on('click','.add', function(e) {
		setsCSRFToken(e);
		var formData = getRecords('#add-');
		resetFields('#add-');
		$.ajax({
			type: 'POST',
			url: method_url,
<<<<<<< HEAD
			data: new FormData($('#add-form')[0]),
			processData: false,
			contentType: false,
=======
			data: formData,
			dataType: 'json',
			processData: false,
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
			success: function(response) {
				add(response, formData);
			},
			error: function() {
				console.log('error!');
			}
		})
	});

	$(document).on('click','.update', function(e) {
		setsCSRFToken(e);
		var formData = getRecords('#update-');
		var data_id = $(this).val();
		formData._method = "PUT";
		resetFields('#update-');
		$.ajax({
			type: 'POST',
			url: method_url + '/' + data_id,
<<<<<<< HEAD
			data: new FormData($('#update-form')[0]),
			dataType: 'json',
			processData: false,
			contentType: false,
=======
			data: formData,
			dataType: 'json',
			processData: false,
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
			success: function(response) {
				update(response, formData);
			},
			error: function() {
				console.log('error!');
			}
		})		
	});

	//Local Functions
	function setsCSRFToken(e) {
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       		}
       	})
       	e.preventDefault();
	}

	function resetFields(method) {
		for(var i in fields) {
			$(method + fields[i]).css('border-color', '#DDDDDD');
			$(method + fields[i] + '_message').text('');
		}
	}
<<<<<<< HEAD
=======

	function setFieldsToBlank(method) {
		for(var i in fields) {
			$(method + fields[i]).val('');
		}
	}
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
});

//Globals
function setFieldsToBlank(method) {
	for(var i in fields) {
<<<<<<< HEAD
		if(fields[i] == 'category_id' || fields[i] == 'supplier_id' || fields[i] == 'active') continue;
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
		$(method + fields[i]).val('');
	}
}

function fillTable(search, tags) {
	$.ajax({
		type: 'POST',
		url: method_url + '/search',
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       	},
		data: {
			search: search,
			tags: tags
		},
		success: function(response) {
			console.log('success!');
<<<<<<< HEAD
			tableBuilder(response);
			if(response.lastPage < 1) {
				paginationBuilder(response);
			}
=======
			console.log(response.items.data);
			tableBuilder(response.items.data);
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
		},
		error: function(response) {
			console.log('error!');				
		}
	})		
<<<<<<< HEAD
}

//Global Validators

function confirmValidation(errors, method) {
	$.each(errors, function( key, value) {
		$(method + key).css('border-color', '#FF0000');
		$(method + key + '_message').text(value);
	});
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
}