$(document).ready(function() {
<<<<<<< HEAD
    $(document).on('click', '.btn_delete', function(e) {
        var id = $(this).attr('id');
        $('#dialog-info').modal({
                backdrop: 'static',
                keyboard: false,
        });
        $('#text_info').html("Admin Authentication<br><input type='password' class='form-control' id = 'auth-code'></input><input type = 'hidden' id = 'entry_id'>");
        $('#entry_id').val(id);
    });

    $(document).on('input', '#auth-code', function(e) {
        $.ajax({
            type: 'POST',
            url: '/restaurant/confirm',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                password: $(this).val(),
            },
            success: function(response) {
                if(response.success) $('#btn_yes').addClass('btndeleteentry');
            },
            error: function() {
                console.log('error!');
            }
        })
    });

    $(document).on('click', '.btndeleteentry', function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var id = $('#entry_id').val();
        $.ajax({
            type: 'POST',
            url: '/inventory/deleteentry',
            data: {
                id: id,
            },
            dataType: 'json',
            success: function(response) {
                console.log('success!'); 
                $('#btn_yes').removeClass('btndeleteentry');
                location.reload(); 
            },
            error: function() {
                console.log('error!');
            }
        })
    });

	$(document).on('click', '#currentInventory', function(e) {
        $('#inventorylist').empty();
        $('#currentInventory').addClass('active');
        $('#inactiveInventory').removeClass('active');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var id = $('#updatePricetxtid').val();
        var price = $('#updatePricenewPrice').val();
        $.ajax({
            type: 'POST',
            url: '/inventory/currentinventory',
            dataType: 'json',
            success: function(response) {
                console.log('success!');
                console.log(response.inventories);
                $("#updatereorderpoint").attr("disabled","disabled");
                $("#updatecost").attr("disabled","disabled");
                $("#updateprice").attr("disabled","disabled");
                $("#updatetax").attr("disabled","disabled");
                $("#updatestocks").attr("disabled","disabled");
                $("#addstocks").attr("disabled","disabled");
                $("#pullstocks").attr("disabled","disabled");
                $("#updateexpdate").attr("disabled","disabled");
                $("#setactin").attr("disabled","disabled");
                $('#inventorylist').html(
                    "<table id='myTable' class='table table-hover rowClick sort'>"+
                        "<thead>"+
                            "<tr>"+
                                "<th style='display:none;'>ID</th>"+
                                "<th>Reference Code</th>"+
                                "<th>Name</th>"+
                                "<th>Supplier</th>"+
                                "<th>Cost</th>"+
                                "<th>Price</th>"+
                                "<th>Tax</th>"+
                                "<th>Quantity</th>"+
                                "<th>Re-order Point</th>"+
                                "<th>Expiration Date</th>"+
                                "<th></th>"+
                            "</tr>"+
                        "</thead>"+
                        "<tbody>"+
                        "</tbody>"+
                    "<table>"
                );
                for (var i = response.inventories.length - 1; i >= 0; i--) {
                    $('.rowClick  > tbody:last-child').append(
                        "<tr>"+
                            "<td style='display:none;'>"+response.inventories[i].id+"</td>"+
                            "<td>"+response.inventories[i].ref_code+"</td>"+
                            "<td>"+response.inventories[i].name+"</td>"+
                            "<td>"+response.inventories[i].supplier+"</td>"+
                            "<td>"+response.inventories[i].cost+"</td>"+
                            "<td>"+response.inventories[i].price+"</td>"+
                            "<td>"+response.inventories[i].tax+"%</td>"+
                            "<td>"+response.inventories[i].quantity+"</td>"+
                            "<td>"+response.inventories[i].reorder_point+"</td>"+
                            "<td>"+response.inventories[i].expiration_date+"</td>"+
                            "<td><button class='btn btn-xs btn-danger btn_delete' id = "+response.inventories[i].id+" style='border-radius: 50%;'><i class='fa fa-trash' aria-hidden='true'></i></button></td>"+
                        "</tr>"
                     );
                }
            },
            error: function() {
                console.log('error!');
            }
        })
    });

    $(document).on('click', '#inactiveInventory', function(e) {
        $('#inventorylist').empty(); 
        $('#inactiveInventory').addClass('active');
        $('#currentInventory').removeClass('active');


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var id = $('#updatePricetxtid').val();
        var price = $('#updatePricenewPrice').val();
        $.ajax({
            type: 'POST',
            url: '/inventory/inactiveinventory',
            dataType: 'json',
            success: function(response) {
                console.log('success!');
                console.log(response.inventories);
                $("#updatereorderpoint").attr("disabled","disabled");
                $("#updatecost").attr("disabled","disabled");
                $("#updateprice").attr("disabled","disabled");
                $("#updatetax").attr("disabled","disabled");
                $("#updatestocks").attr("disabled","disabled");
                $("#addstocks").attr("disabled","disabled");
                $("#pullstocks").attr("disabled","disabled");
                $("#updateexpdate").attr("disabled","disabled");
                $("#setactin").attr("disabled","disabled");
                $('#inventorylist').html(
                    "<table id='myTable' class='table table-hover rowClick sort'>"+
                        "<thead>"+
                            "<tr>"+
                                "<th style='display:none;'>ID</th>"+
                                "<th>Reference Code</th>"+
                                "<th>Name</th>"+
                                "<th>Supplier</th>"+
                                "<th>Cost</th>"+
                                "<th>Price</th>"+
                                "<th>Tax</th>"+
                                "<th>Quantity</th>"+
                                "<th>Re-order Point</th>"+
                                "<th>Expiration Date</th>"+
                                "<th></th>"+
                            "</tr>"+
                        "</thead>"+
                        "<tbody>"+
                        "</tbody>"+
                    "<table>"
                );
                for (var i = response.inventories.length - 1; i >= 0; i--) {
                    $('.rowClick  > tbody:last-child').append(
                        "<tr>"+
                            "<td style='display:none;'>"+response.inventories[i].id+"</td>"+
                            "<td>"+response.inventories[i].ref_code+"</td>"+
                            "<td>"+response.inventories[i].name+"</td>"+
                            "<td>"+response.inventories[i].supplier+"</td>"+
                            "<td>"+response.inventories[i].cost+"</td>"+
                            "<td>"+response.inventories[i].price+"</td>"+
                            "<td>"+response.inventories[i].tax+"</td>"+
                            "<td>"+response.inventories[i].quantity+"</td>"+
                            "<td>"+response.inventories[i].reorder_point+"</td>"+
                            "<td>"+response.inventories[i].expiration_date+"</td>"+
                            "<td><button class='btn btn-xs btn-danger btn_delete' id = "+response.inventories[i].id+" style='border-radius: 50%;'><i class='fa fa-trash' aria-hidden='true'></i></button></td>"+
                        "</tr>"
                     );
                }
            },
            error: function() {
                console.log('error!');
            }
        })
    });

    $(document).on('click', '.btnupdatetax', function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var id = $('#updateTaxtxtid').val();
        var tax = $('#updateTaxnewTax').val();
        var ref_code = $('#updateTaxtxtref_code').val();
        var comment = $('#updateTaxtComment').val();
        $.ajax({
            type: 'POST',
            url: '/inventory/updatetax',
            data: {
                id: id,
                ref_code: ref_code,
                comment: comment,
                tax: tax,
            },
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    console.log('success!');  
                    $('#btn_yes').removeClass('btnupdatetax');
                    location.reload();
                }
                else {
                    console.log('error!');
                    $('#dialog-info').modal('toggle');
                    $('#dialog-danger').modal('toggle');
                    $('#text_danger').text('The tax cannot be a negative number.');
                    $('#btn_yes').removeClass('btnupdatetax');
                }
            },
            error: function() {
                console.log('error!');
            }
        })
    });

    $(document).on('click', '#btnUpdateTax', function(e) {
        $('#dialog-info').modal('show');
        $('#text_info').text('Are you sure you want to update tax?');
        $('#btn_yes').addClass('btnupdatetax');
    });

    $(document).on('click', '.btnupdatestatus', function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var id = $('#updateStatustxtid').val();
        var status = $('#updateStatusnewStatus').val();
        // alert(status);
        $.ajax({
            type: 'POST',
            url: '/inventory/setstatus',
            data: {
                id: id
,                active: status,
            },
            dataType: 'json',
            success: function(response) {
                console.log('success!'); 
                $('#btn_yes').removeClass('btnupdatestatus');
                location.reload(); 
            },
            error: function() {
                console.log('error!');
            }
        })
    });

    $(document).on('click', '#btnUpdateStatus', function(e) {
        $('#dialog-info').modal('show');
        $('#text_info').text('Are you sure you want to update status?');
        $('#btn_yes').addClass('btnupdatestatus');
    });

    $(document).on('click', '.btnupdateprice', function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var id = $('#updatePricetxtid').val();
        var price = $('#updatePricenewPrice').val();
        var ref_code = $('#updatePricetxtref_code').val();
        var comment = $('#updatePricetComment').val();
        $.ajax({
            type: 'POST',
            url: '/inventory/updateprice',
            data: {
                id: id,
                ref_code: ref_code,
                comment: comment,
                price: price,
            },
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    console.log('success!');  
                    $('#btn_yes').removeClass('btnupdateprice');
                    location.reload();
                }
                else {
                    console.log('error!');
                    $('#dialog-info').modal('toggle');
                    $('#dialog-danger').modal('toggle');
                    $('#text_danger').text('The price cannot be a negative number.');
                    $('#btn_yes').removeClass('btnupdateprice');
                }
            },
            error: function() {
                console.log('error!');
            }
        })
    });
    $(document).on('click', '#btnUpdatePrice', function(e) {
        $('#dialog-info').modal('show');
        $('#text_info').text('Are you sure you want to update price?');
        $('#btn_yes').addClass('btnupdateprice');
    });


    $(document).on('click', '.btnupdatecost', function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var id = $('#updateCosttxtid').val();
        var cost = $('#updateCostnewCost').val();
        var ref_code = $('#updateCosttxtref_code').val();
        var comment = $('#updateCostComment').val();
        $.ajax({
            type: 'POST',
            url: '/inventory/updatecost',
            data: {
                id: id,
                ref_code: ref_code,
                comment: comment,
                cost: cost,
            },
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    console.log('success!');  
                    $('#btn_yes').removeClass('btnupdatecost');
                    location.reload();
                }
                else {
                    console.log('error!');
                    $('#dialog-info').modal('toggle');
                    $('#dialog-danger').modal('toggle');
                    $('#text_danger').text('The cost cannot be a negative number.');
                    $('#btn_yes').removeClass('btnupdatecost');
                }
            },
            error: function() {
                console.log('error!');
            }
        })
    });
    $(document).on('click', '#btnUpdateCost', function(e) {
        $('#dialog-info').modal('show');
        $('#text_info').text('Are you sure you want to update cost?');
        $('#btn_yes').addClass('btnupdatecost');
    });




    $(document).on('click', '.btnupdatereorderpoint', function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        var id = $('#updateReorderPointtxtid').val();
        var reorder_point = $('#updateReorderPointnewReorderPoint').val();
        var ref_code = $('#updateReordertxtref_code').val();
        var comment = $('#updateReorderPointComment').val();

        $.ajax({
            type: 'POST',
            url: '/inventory/updatereorderpoint',
            data: {
                id: id,
                reorder_point: reorder_point,
                ref_code: ref_code,
                comment: comment,
            },
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    console.log('success!');  
                    $('#btn_yes').removeClass('btnupdatereorderpoint');
                    location.reload();
                }
                else {
                    console.log('error!');
                    $('#dialog-info').modal('toggle');
                    $('#dialog-danger').modal('toggle');
                    $('#text_danger').text('The re-order point cannot be a negative number.');
                    $('#btn_yes').removeClass('btnupdatereorderpoint');
                }
            },
            error: function() {
                console.log('error!');
            }
        })
    });
    $(document).on('click', '#btnUpdateReorderPoint', function(e) {
        $('#dialog-info').modal('show');
        $('#text_info').text('Are you sure you want to update reorder point?');
        $('#btn_yes').addClass('btnupdatereorderpoint');
    });

    $(document).on('click', '.btnupdateexpdate', function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var id = $('#updateExpDatetxtid').val();
        var date = $('#updateExpDatenewExpDate').val();
        var ref_code = $('#updateExpDatetxtref_code').val();
        var comment = $('#updateExpDateComment').val();
        $.ajax({
            type: 'POST',
            url: '/inventory/updateexpdate',
            data: {
                id: id,
                date: date,
                ref_code: ref_code,
                comment: comment,
            },
            dataType: 'json',
            success: function(response) {
                console.log('success!');  
                $('#btn_yes').removeClass('btnupdateexpdate');
                location.reload();
            },
            error: function() {
                console.log('error!');
            }
        })
    });
    $(document).on('click', '#btnUpdateExpDate', function(e) {
        $('#dialog-info').modal('show');
        $('#text_info').text('Are you sure you want to update expiration date?');
        $('#btn_yes').addClass('btnupdateexpdate');
    });



    $(document).on('click', '.btnupdatestocks', function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var id = $('#updateStockstxtid').val();
        var quantity = $('#updateStocksnewStocks').val();
        var ref_code = $('#updateStockstxtref_code').val();
        var comment = $('#updateStocksComment').val();
        $.ajax({
            type: 'POST',
            url: '/inventory/updatestocks',
            data: {
                id: id,
                quantity: quantity,
                ref_code: ref_code,
                comment: comment,
            },
            dataType: 'json',
            success: function(response) {
                console.log('success!');  
                $('#btn_yes').removeClass('btnupdatestocks');
                location.reload();
            },
            error: function() {
                console.log('error!');
            }
        })
    });
    $(document).on('click', '#btnUpdateStocks', function(e) {
        $('#dialog-info').modal('show');
        $('#text_info').text('Are you sure you want to update stocks?');
        $('#btn_yes').addClass('btnupdatestocks');
    });



    $(document).on('click', '.btnaddstocks', function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var id = $('#addStockstxtid').val();
        var ref_code = $('#addStockstxtref_code').val();
        var additional = $('#addStocksnewStocks').val();
        var comment = $('#addComment').val();
        $.ajax({
            type: 'POST',
            url: '/inventory/addstocks',
            data: {
                id: id,
                ref_code: ref_code,
                comment: comment,
                additional: additional,
            },
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    console.log('success!');  
                    $('#btn_yes').removeClass('btnaddstocks');
                    location.reload();
                }
                else {
                    console.log('error!');
                    $('#dialog-info').modal('toggle');
                    $('#dialog-danger').modal('toggle');
                    $('#text_danger').text('The requested quantity to be added cannot be in a negative number.');
                    $('#btn_yes').removeClass('btnaddstocks');
                }
            },
            error: function() {
                console.log('error!');
            }
        })
    });
    

    $(document).on('click', '#btnAddStocks', function(e) {
        $('#dialog-info').modal('show');
        $('#text_info').text('Are you sure you want to add stocks?');
        $('#btn_yes').addClass('btnaddstocks');
    });


    $(document).on('click', '.btnpullstocks', function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var id = $('#pullStockstxtid').val();
        var ref_code = $('#pullStockstxtref_code').val();
        var pulled = $('#pullStocksnewStocks').val();
        var comment = $('#pullComment').val();
        $.ajax({
            type: 'POST',
            url: '/inventory/pullstocks',
            data: {
                id: id,
                ref_code: ref_code,
                comment: comment,
                pulled: pulled,
            },
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    console.log('success!');  
                    $('#btn_yes').removeClass('btnpullstocks');
                    location.reload();
                }
                else {
                    console.log('error!');
                    $('#dialog-info').modal('toggle');
                    $('#dialog-danger').modal('toggle');
                    $('#text_danger').text('The stocks requested to be pulled is more than the current stock count of the item.');
                    $('#btn_yes').removeClass('btnpullstocks');
                }
                
            },
            error: function() {
                console.log('error!');
            }
        })
    });
    $(document).on('click', '#btnPullStocks', function(e) {
        $('#dialog-info').modal('show');
        $('#text_info').text('Are you sure you want to pull stocks?');
        $('#btn_yes').addClass('btnpullstocks');
    });




    $(document).on('click', '#addToInventory', function(e) {
        $('#dialog-info').modal('show');
        $('#text_info').text('Are you sure you want to add this item?');
        $('#btn_yes').addClass('addtoinventory');
    });





    $(document).on('click', '#updatetax', function(e) {
        $('#updateTax').modal('show');
        var id = $('#inventoryID').val(); 
        var ref_code = $('#inventoryRef_code').val();

        $('#updateTaxtxtid').val(id); 
        $('#updateTaxtxtref_code').val(ref_code); 
        $('#updateTaxLblRefCode').html('REFERENCE CODE: ' + ref_code); 
    });
    $(document).on('click', '#updateprice', function(e) {
        $('#updatePrice').modal('show');
        var id = $('#inventoryID').val(); 
        var ref_code = $('#inventoryRef_code').val();

        $('#updatePricetxtid').val(id); 
        $('#updatePricetxtref_code').val(ref_code); 
        $('#updatePriceLblRefCode').html('REFERENCE CODE: ' + ref_code); 
    });

    $(document).on('click', '#updatecost', function(e) {
        $('#updateCost').modal('show'); 
        var id = $('#inventoryID').val();
        var ref_code = $('#inventoryRef_code').val();

        $('#updateCosttxtid').val(id); 
        $('#updateCosttxtref_code').val(ref_code); 
        $('#updateCostLblRefCode').html('REFERENCE CODE: ' + ref_code); 
    });

    $(document).on('click', '#updatereorderpoint', function(e) {
        $('#updateReorderPoint').modal('show'); 
        var id = $('#inventoryID').val();
        var ref_code = $('#inventoryRef_code').val();

        $('#updateReorderPointtxtid').val(id); 
        $('#updateReordertxtref_code').val(ref_code); 
        $('#updateReorderLblRefCode').html('REFERENCE CODE: ' + ref_code); 
    });

    $(document).on('click', '#updatestocks', function(e) {
        $('#updateStocks').modal('show'); 
        var id = $('#inventoryID').val();
        var ref_code = $('#inventoryRef_code').val();
        $('#updateStockstxtid').val(id); 
        $('#updateStockstxtref_code').val(ref_code); 
        $('#updateStocksLblRefCode').html('REFERENCE CODE: ' + ref_code); 
    });

    $(document).on('click', '#updateexpdate', function(e) {
        $('#updateExpDate').modal('show'); 
        var id = $('#inventoryID').val();
        var ref_code = $('#inventoryRef_code').val();
        $('#updateExpDatetxtid').val(id); 
        $('#updateExpDatetxtref_code').val(ref_code); 
        $('#updateExpDateLblRefCode').html('REFERENCE CODE: ' + ref_code); 
    });

    $(document).on('click', '#addstocks', function(e) {
        $('#addStocks').modal('show'); 
        var id = $('#inventoryID').val();
        var ref_code = $('#inventoryRef_code').val();
        $('#addStockstxtid').val(id); 
        $('#addStockstxtref_code').val(ref_code); 
        $('#addLblRefCode').html('REFERENCE CODE: ' + ref_code); 
    });

    $(document).on('click', '#pullstocks', function(e) {
        $('#pullStocks').modal('show');
        var id = $('#inventoryID').val();
        var ref_code = $('#inventoryRef_code').val();
        $('#pullStockstxtid').val(id); 
        $('#pullStockstxtref_code').val(ref_code); 
        $('#pullLblRefCode').html('REFERENCE CODE: ' + ref_code); 
    });

    $(document).on('click', '#setactin', function(e) {
        $('#updateStatus').modal('show');
        var id = $('#inventoryID').val();
        $('#updateStatustxtid').val(id); 
    });

    if( $('#inventoryID').val()=='')
    {
        $("#updatereorderpoint").attr("disabled","disabled");
        $("#updatecost").attr("disabled","disabled");
        $("#updateprice").attr("disabled","disabled");
        $("#updatetax").attr("disabled","disabled");
        $("#updatestocks").attr("disabled","disabled");
        $("#addstocks").attr("disabled","disabled");
        $("#pullstocks").attr("disabled","disabled");
        $("#setactin").attr("disabled","disabled");
        $("#updateexpdate").attr("disabled","disabled");
    }

            
    

=======
	//search by ID
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	$(document).on('input', '#searchStr', function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var search_str = $(this).val();
        $.ajax({
            type: 'POST',
            url: '/inventory/search',
            data: {
                ref_code: search_str,
            },
            dataType: 'json',
            success: function(response) {
                console.log('success!');  
                console.log(response.items);
<<<<<<< HEAD
                console.log(response.inventory);
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                $('.itemsTable tbody').html(' ');
                for (var i = response.items.length - 1; i >= 0; i--) {
                    $('.itemsTable  > tbody:last-child').append("<tr><td><a class='product_ref_code' id = '"+response.items[i].refCode+"'>"+response.items[i].refCode+"</a></td><td>"+response.items[i].itemName+"</td><td>"+response.items[i].categoryName+"</td></tr>");
                }
            },
            error: function() {
                console.log('error!');
            }
        })
    });

<<<<<<< HEAD
    $(document).on('click', '.rowClick tbody tr', function(e) {
        // alert('asd');
        $(this).addClass("selected").siblings().removeClass("selected");
        var a = $(this);
        var first = a.find('td').eq(0).html();
        var second = a.find('td').eq(1).html();

        $('#inventoryID').val(first);
        $('#inventoryRef_code').val(second);
        $("#updatereorderpoint").removeAttr("disabled");
        $("#updatecost").removeAttr("disabled");
        $("#updateprice").removeAttr("disabled");
        $("#updatetax").removeAttr("disabled");
        $("#updatestocks").removeAttr("disabled");
        $("#addstocks").removeAttr("disabled");
        $("#pullstocks").removeAttr("disabled");
        $("#setactin").removeAttr("disabled");
        $("#updateexpdate").removeAttr("disabled");
    });



    $(document).on('click', '.save', function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        var id = $(this).attr('id');
        var cost = $('#inventoryCost'+id).val();
        var price = $('#inventoryPrice'+id).val();
        var qty = $('#inventoryQty'+id).val();
        var reorder_point = $('#inventoryRop'+id).val();

        $.ajax({
            type: 'POST',
            url: '/inventory/save',
            data: {
                id: id,
                cost: cost,
                price: price,
                qty: qty,
                reorder_point: reorder_point,
            },
            dataType: 'json',
            success: function(response) {
                console.log('success!');
                $('#dialog-success').modal('toggle');
                $('#text_success').html('Entry Updated.');
            },
            error: function() {
                console.log('error!');
            }
        })
    });
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

    $(document).on('click', '.product_ref_code', function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var ref_code = $(this).attr('id');
        //alert(id);
 		$.ajax({
            type: 'POST',
            url: '/inventory/view',
            data: {
                ref_code: ref_code,
            },
            dataType: 'json',
            success: function(response) {
                console.log('success!');
                console.log(response.items);
                $("#prodRefCode").html(response.items[0].ref_code);
                $("#prodRefCodeHidden").val(response.items[0].ref_code);
                $("#prodName").html(response.items[0].name);
                $("#prodNameHidden").val(response.items[0].name);
<<<<<<< HEAD
                $("#prodSupplier").html(response.items[0].supplier_id);
                $("#prodSupplierHidden").val(response.items[0].supplier_id);
                $("#prodCost").val(0);
                $("#prodPrice").val(0);
                $("#prodQty").val(0);
                $("#prodRop").val(0);
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            },
            error: function() {
                console.log('error!');
            }
        })
    });
<<<<<<< HEAD
    $(document).on('click', '.addtoinventory', function(e) {
=======

    $(document).on('click', '#addToInventory', function(e) {
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
<<<<<<< HEAD

        var ref_code = $("#prodRefCodeHidden").val();
        var prod_name = $("#prodNameHidden").val();
        var prod_supplier = $("#prodSupplierHidden").val();
        var prod_cost = $("#prodCost").val();
        var prod_price = $("#prodPrice").val();
        var prod_tax = $("#prodTax").val();
        var prod_qty = $("#prodQty").val();
        var prod_rop = $("#prodRop").val();
        var prod_expdate = $("#prodExpDate").val();
        // alert(prod_rop);
        $.ajax({
=======
        var ref_code = $("#prodRefCodeHidden").val();
        var prod_name = $("#prodNameHidden").val();
        var prod_cost = $("#prodCost").val();
        var prod_price = $("#prodPrice").val();
        var prod_qty = $("#prodQty").val();
        var prod_rop = $("#prodRop").val();
        alert(prod_rop);
 		$.ajax({
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            type: 'POST',
            url: '/inventory/addtoinventory',
            data: {
                ref_code: ref_code,
                name: prod_name,
<<<<<<< HEAD
                supplier: prod_supplier,
                cost: prod_cost,
                price: prod_price,
                tax: prod_tax,
                qty: prod_qty,
                reorder_point: prod_rop,
                expiration_date: prod_expdate,
            },
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    console.log('success!');
                    $('#dialog-success').modal('toggle');
                    $('#text_success').html('Entry Inserted.');
                    $('#btn_yes').removeClass('addtoinventory');
                    location.reload();
                }
                else {
                    console.log('error!');
                    $('#dialog-info').modal('toggle');
                    $('#dialog-danger').modal('toggle');
                    $('#text_danger').text('The following fields cannot be blank nor be a negative number.');
                    $('#btn_yes').removeClass('addtoinventory');
                }
=======
                cost: prod_cost,
                price: prod_price,
                qty: prod_qty,
                reorder_point: prod_rop,
            },
            dataType: 'json',
            success: function(response) {
                console.log('success!');
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            },
            error: function() {
                console.log('error!');
            }
        })
    });
<<<<<<< HEAD




    var thIndex = 0,
    order = 'asc',
    curThIndex = null;


    $(function(){
      $('.sort thead tr th').click(function(){
        thIndex = $(this).index();
          curThIndex = thIndex;
          sorting = [];
          tbodyHtml = null;
          $('.sort tbody tr').each(function(){
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
      });
    })

    function sortIt(){
      for(var sortingIndex = 0; sortingIndex < sorting.length; sortingIndex++){
        rowId = parseInt(sorting[sortingIndex].split(', ')[1]);
        tbodyHtml = tbodyHtml + $('.sort tbody tr').eq(rowId)[0].outerHTML;
      }
      $('.sort tbody').html(tbodyHtml);
    }

    
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
});