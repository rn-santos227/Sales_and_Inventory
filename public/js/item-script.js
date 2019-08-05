//Overriding Variables
<<<<<<< HEAD
var fields = ['name', 'ref_code', 'image', 'category_id', 'supplier_id', 'description', 'active'];
=======
var fields = ['name', 'ref_code', 'image', 'category_id', 'supplier_id', 'description', 'quantity', 'cost', 'price', 'active'];
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
var method_url = '/items';

//Overriding Functions
function getRecords(method) {
	var formData = {
		name: $(method + fields[0]).val(),
		ref_code: $(method + fields[1]).val(),
<<<<<<< HEAD
		image: $(method + fields[2]).val(),
		category_id: $(method + fields[3]).val(),
		supplier_id: $(method + fields[4]).val(),
		description: $(method + fields[5]).val(),
		active: $(method + fields[6]).val(),	
=======
		image: $(method + fields[2])[0].files[0],
		category_id: $(method + fields[3]).val(),
		supplier_id: $(method + fields[4]).val(),
		description: $(method + fields[5]).val(),
		quantity: $(method + fields[6]).val(),
		cost: $(method + fields[7]).val(),
		price: $(method + fields[8]).val(),
		active: $(method + fields[9]).val(),	
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	}
	return formData;
}

function add(response, formData) {
<<<<<<< HEAD
	if(response.success) {
=======
	if(response.success && !checkPrice(formData.cost, formData.price, '#add-')) {
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
		console.log('success!');
		$('#dialog-success').modal('toggle');
		$('#create').modal('toggle');
		setFieldsToBlank('#add-');
		fillTable('', '');
	}
	else {
		console.log('error validation!');
		confirmValidation(response.errors, '#add-');
<<<<<<< HEAD
=======
		console.log(formData.image);
		if(formData.price != '' && formData.cost != '') 
			if(checkPrice(formData.cost, formData.price, '#add-')) return;			
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	}
}

function update(response, formData) {
<<<<<<< HEAD
	if(response.success) {
		console.log('success!');
		$('#item_' + response.item.id).replaceWith(RowBuilder(response.item.id, formData.name, formData.ref_code, formData.active));
=======
	if(response.success && !checkPrice(formData.cost, formData.price, '#update-')) {
		console.log('success!');
		$('#item_' + response.item.id).replaceWith(RowBuilder(response.item.id, formData.name, formData.ref_code, formData.quantity, formData.price, formData.active));
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
		$('#dialog-success').modal('toggle');
		$('#update').modal('toggle');
		setFieldsToBlank('#udpate-');
	}
	else {
		console.log('error validation!');
<<<<<<< HEAD
		confirmValidation(response.errors, '#update-');		
=======
		confirmValidation(response.errors, '#update-');
		if(formData.price != '' && formData.cost != '') 
			if(checkPrice(formData.cost, formData.price, '#update-')) return;			
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	}
}

function fetch(response) {
	$('#update-name').val(response.item.name);
	$('#update-ref_code').val(response.item.ref_code);
	$('#update-category_id').val(response.item.category_id).change();
<<<<<<< HEAD
	$('#update-supplier_id').val(response.item.supplier_id).change();
	$('#update-description').val(response.item.description);
=======
	$('#update-supplier_id').val(response.item.supplier_id).change(); 
	$('#update-description').val(response.item.description);
	$('#update-quantity').val(response.item.quantity);
	$('#update-cost').val(Number(response.item.cost).toFixed(2));
	$('#update-price').val(Number(response.item.price).toFixed(2));
	$('#update-profit').val(Number(response.profit).toFixed(2));
	$('#update-active').val(response.item.active).change;
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	$('#update-submit').val(response.item.id);
}

function view(response) {
	$('#view-name').val(response.item.name);
	$('#view-ref_code').val(response.item.ref_code);
	$('#view-category').val(response.item.category.name);
	$('#view-supplier').val(response.item.supplier.name);
	$('#view-description').val(response.item.description);
<<<<<<< HEAD
=======
	$('#view-quantity').val(response.item.quantity);
	$('#view-cost').val(Number(response.item.cost).toFixed(2));
	$('#view-price').val(Number(response.item.price).toFixed(2));
	$('#view-profit').val(Number(response.profit).toFixed(2));
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	$('#view-active').val(response.item.active);
	$('#view-created_at').val(response.item.created_at);
	$('#view-updated_at').val(response.item.updated_at);
}

<<<<<<< HEAD
//Overriding Builders
function RowBuilder(id, name, ref_code, active) {
	var str = '<tr id="item_' + id +'">';
	str += '<td class="col_hide">' + ref_code + '</td>';
	str += '<td>' + name + '</td>';
	str += '<td>' + active + '</td>';
=======
//Overriding Validators
function checkPrice(cost, price, method) {
	if(cost > price) {
		$(method + '-price').css('border-color', '#FF0000');
		$(method + '-price_message').text('price is lower than cost.');
		return true;
	} else return false;
}

function confirmValidation(errors, method) {
	$.each(errors, function( key, value) {
		$(method + key).css('border-color', '#FF0000');
		$(method + key + '_message').text(value);
	});
}

//Overriding Builders
function RowBuilder(id, name, ref_code, quantity, price, active) {
	var str = '<tr id="item_' + id +'">';
	str += '<td class="col_hide">' + ref_code + '</td>';
	str += '<td>' + name + '</td>';
	str += '<td>' + quantity + '</td>';
	str += '<td>' + price + '</td>';
	str += '<td class="col_hide">' + active + '</td>';
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	str += '<td class="action">'
	str += '<button class="btn btn-primary action btn_view" data-toggle="modal" data-target="#view" value="' + id + '""><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>';
	str += ' <button class="btn btn-warning action btn_fetch" data-toggle="modal" data-target="#update" value="' + id + '""><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>';
	str += '</td></tr>';
	return str;
}

<<<<<<< HEAD
function tableBuilder(response) {
	$('#data').find('tbody').empty();
	if(response.items.total > 0) {
		for(var i in response.items.data) {
			$('#data > tbody:last-child').append(RowBuilder(response.items.data[i].id, response.items.data[i].name, response.items.data[i].ref_code, response.items.data[i].active));
		}
	} else {
		$('#data > tbody:last-child').append('<tr><td colspan="4"><p>No Product Available</p></td></tr>');
=======
function tableBuilder(items) {
	$('#data').find('tbody').empty();
	for(var i in items) {
		$('#data > tbody:last-child').append(RowBuilder(items[i].id, items[i].name, items[i].ref_code, items[i].quantity, items[i].price, items[i].active));
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	}
}
