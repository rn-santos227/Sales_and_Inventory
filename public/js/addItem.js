$(document).ready(function() {
    $("#add").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').attr('content')
            }
        })

        var formData = {
            id: 9,
            ref_code: $('#ref_code').val(),
            name: $('#name').val(),
            image: $('#image').val(),
            category_id: $('#category_id').val(),
            supplier_id: $('#supplier_id').val(),
            description: $('#description').val(),
            quantity: $('#quantity').val(),
            price: $('#price').val(),
            active: $('#active').val(),
        }

        $.ajax({
            type: 'POST',
            url: '/items',
            data: formData,
            dataType: 'json',
            success: function(data) {
                //$('#table').append('<td class="col_hide">'+ data.ref_code + '</td><td>'+ data.name + '</td><td>'+ data.quantity + '</td><td>'+ data.price + '</td><td class="col_hide">' + data.active + '</td><td class="action"><button class="btn btn-primary action" data-toggle="modal" data-target="#view'+ data.id +'"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button><button class="btn btn-warning action" data-toggle="modal" data-target="#update'+ data.id +'"><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button></td>');
                $('#create').modal('hide');                
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});