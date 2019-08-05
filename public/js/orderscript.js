$(document).ready(function() {

var thIndex = 0,
     order = 'asc',
    curThIndex = null;



$(function(){
  $('.OrdersTable thead tr th').click(function(){
    thIndex = $(this).index();
    // if(thIndex != curThIndex){
      curThIndex = thIndex;
      sorting = [];
      tbodyHtml = null;
      $('.OrdersTable tbody tr').each(function(){
        sorting.push($(this).children('td').eq(curThIndex).html() + ', ' + $(this).index());
      });
      if(order == 'asc')
      {
        sorting = sorting.sort();
        sortIt(); 
        order = 'dsc';
      }
      else
      {
        sorting = sorting.reverse();
        sortIt(); 
        order = 'asc';
      } 
    // }
  });
})



function sortIt(){
  for(var sortingIndex = 0; sortingIndex < sorting.length; sortingIndex++){
    rowId = parseInt(sorting[sortingIndex].split(', ')[1]);
    tbodyHtml = tbodyHtml + $('.OrdersTable tbody tr').eq(rowId)[0].outerHTML;
  }
  $('.OrdersTable tbody').html(tbodyHtml);
}

<<<<<<< HEAD

var mode = $("#mode").val();

// function getMode() {
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         })
//         $.ajax({
//             type: 'POST',
//             url: '/orders/getmode',
//             success: function(response) {
//                 console.log('success!');
//                 mode = response.mode; 
//                 // $(".voidmodal").attr("disabled", "disabled");

//             },
//             error: function(response) {
//                 console.log('error!');
//             }
//         })
//     }

// getMode();
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
//search by ID
$(document).on('input', '#search', function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var search_str = $(this).val();
        $.ajax({
            type: 'POST',
            url: '/orders/searchid',
            data: {
                id: search_str,
            },
            dataType: 'json',
            success: function(response) {
                console.log('success!');  
                console.log(response.receipts);
                $('.OrdersTable tbody').html(' ');
                for (var i = response.receipts.length - 1; i >= 0; i--) {
<<<<<<< HEAD
                    $('.OrdersTable  > tbody:last-child').append("<tr><td><a class='orderid' id = '"+response.receipts[i].id+"'>"+response.receipts[i].id+"</a></td><td>"+response.receipts[i].total+"</td><td style='text-transform: capitalize;'>"+response.receipts[i].status+"</td><td>"+response.receipts[i].created_at+"</td></tr>");
=======
                    $('.OrdersTable  > tbody:last-child').append("<tr><td><a class='orderid' id = '"+response.receipts[i].id+"'>"+response.receipts[i].id+"</a></td><td>"+response.receipts[i].total+"</td><td>"+response.receipts[i].status+"</td><td>"+response.receipts[i].created_at+"</td></tr>");
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                }
            },
            error: function() {
                console.log('error!');
            }
        })

    });

//void order
$(document).on('click', '.void', function(e) {
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    })
    var receipt_id = $(this).attr('id');
    var admin_pass = $('#void_pass').val();
    $.ajax({
        type: 'POST',
        url: '/orders/confirmpassword',
        data: {
            password: admin_pass,
        },
        dataType: 'json',
        success: function(response) {
            console.log('match');  
            $.ajax({
                type: 'POST',
                url: '/orders/void',
                data: {
                    id: receipt_id,
                },
                dataType: 'json',
                success: function(response) {
                    console.log('void success!'); 
                    $('#void_modal').modal('toggle');
                    $('#void_pass').val('');
                    $('#address_message').html('');
<<<<<<< HEAD
                    location.reload();
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                },
                error: function() {
                    console.log('void error!');
                }
            })
        },
        error: function() {
            console.log('error!');
            $('#void_pass').val('');
            $('#address_message').html('password did not match');
        }
    })


    // alert(receipt_id);
    // var pass = $("#void_pass").val();
    // alert(pass);
    // var receipt_id = $(this).attr('id');
    // $.ajax({
    //     type: 'POST',
    //     url: '/orders/void',
    //     data: {
    //         id: receipt_id,
    //     },
    //     dataType: 'json',
    //     success: function(response) {
    //         console.log('success!');  
    //     },
    //     error: function() {
    //         console.log('error!');
    //     }
    // })
});

//show modal
$(document).on('click', '.voidmodal', function(e) {    
    var receiptid = $(this).attr('id');
    $("#voidButton").html("<button type='button' class='btn btn-primary pull-right void' id = '"+receiptid+"'><i class='fa fa-check-circle' aria-hidden='true'></i> Submit</button>");
});


//search
$(document).on('click', '#ordersearch', function(e) {
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    })
    var date_from = $('#datefrom').val();
    var date_to = $('#dateto').val();
    $.ajax({
        type: 'POST',
        url: '/orders/search',
        data: {
            datefrom: date_from,
            dateto: date_to,
        },
        dataType: 'json',
        success: function(response) {
            console.log(response.receipts);
            $('.OrdersTable tbody').html(' ');
            for (var i = response.receipts.length - 1; i >= 0; i--) {
                $('.OrdersTable  > tbody:last-child').append("<tr><td><a class='orderid' id = '"+response.receipts[i].id+"'>"+response.receipts[i].id+"</a></td><td>"+response.receipts[i].total+"</td><td>"+response.receipts[i].status+"</td><td>"+response.receipts[i].created_at+"</td></tr>");
            }
        },
        error: function() {
            console.log('error!');
        }

    })
});

// get order info
$(document).on('click', '.orderid', function(e) {
	$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       		}
    })
	var receipt_id = $(this).attr('id');
    $('#receiptid').html('ID: '+receipt_id);
	// alert(receipt_id);
	$.ajax({
    	type: 'POST',
    	url: '/orders/vieworder',
    	data: {
    		id: receipt_id,
    	},
    	dataType: 'json',
    	success: function(response) {
    		console.log(response.orders);
            $('.ItemsTable  > tbody').html(' ');
            for (var i = response.orders.length - 1; i >= 0; i--) {
                $('.ItemsTable  > tbody:last-child').append('<tr><td>'+response.orders[i].name+'</td><td>'+response.orders[i].qty+'</td><td>'+response.orders[i].price+'</td><td>'+response.orders[i].subtotal+'</td></tr>');
            }

            $('#footer').html(
                "<button id='"+receipt_id+"' class='btn btn-danger pull-right voidmodal' data-toggle = 'modal' data-target = '#void_modal'>VOID</button>"
            ); 

    		$('#receipt').html
                (
                "<div class='col-md-8' style='float: left;'>"+
                    "<div>"+
                        "<div class='panel panel-default'>"+
                            "<div class='panel-footer'>"+
                                "<div class = 'row'>"+
                                    "<div class = 'col-md-6' style='float: left;'>"+

                                        "<strong>Subtotal:</strong>"+
                                        "<br>"+
                                        "<strong>VAT:</strong>"+
                                        "<br>"+
                                        "<strong>VAT Exempt:</strong>"+
                                        "<br>"+
                                        "<strong>VAT Sales:</strong>"+
                                        "<br>"+
                                        "<strong>Amount Due:</strong>"+
                                        "<br>"+
                                        "<strong>Cash:</strong>"+
                                        "<br>"+
                                        "<strong>Change Due:</strong>"+
                                        "<br>"+
<<<<<<< HEAD
=======

>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                                    "</div>"+
                                    "<div class = 'col-md-6' style='float: right;'>"+

                                         response.receipts["0"].total+
                                        "<br>"+
                                         response.receipts["0"].vat+
                                        "<br>"+
                                         response.receipts["0"].vat_exempt+
                                        "<br>"+
                                         response.receipts["0"].vat_sales+
                                        "<br>"+
                                         response.receipts["0"].amount_due+
                                        "<br>"+
                                         response.receipts["0"].cash+
                                        "<br>"+
                                         response.receipts["0"].amount_due+
                                        "<br>"+

                                    "</div>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+
                    "</div>"+
                "</div>"+
                "<div class='col-md-4'>"+
                    "<strong>Total Items: "+response.receipts["0"].count+"</strong>"+
                "</div>"
                );

<<<<<<< HEAD
            if(response.receipts["0"].status == 'voided' || response.receipts["0"].status == 'paid')
            {
                $(".voidmodal").attr("disabled", "disabled");
            }
            if(mode == 'Restaurant')
            {
                $(".voidmodal").hide();
            }
=======
            if(response.receipts["0"].status == 'voided')
            {
                $(".voidmodal").attr("disabled", "disabled");
            }
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    	},
    	error: function() {
    		console.log('error!');
    	}

    })
	});
});