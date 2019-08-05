$(document).ready(function() {
	
	var getOrders = function() {
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       		}
       	})
		$.ajax({
			type: 'POST',
			url: '/fastfood/monitor/gettray',
			success: function(response) {
				console.log('success!');
				$('.borderless  > tbody').empty();
				var total = 0;
				for (var i in response.carts) {
					var subtotal = response.carts[i].price * response.carts[i].quantity;
					$('.borderless  > tbody:last-child').append('<tr><td class="text-center">'+response.carts[i].name+'</td><td class="text-center">'+response.carts[i].quantity+'</td><td class="text-center">'+subtotal+'</td></tr>');
					total+=subtotal;
				}
				$('.borderless  > tbody:last-child').append('<tr><td></td><td></td><td class="text-left"><br><br>TOTAL:   '+total+'<br>CASH<br>CHANGE<br></td></tr>');
				//$("#total").html("TOTAL:"+ total + "<br>CASH:"+"<br>CHANGE:" );
				setTimeout(getOrders, 2000);
			},
			error: function(response) {
				console.log('error!');
			}
		})
	} 

	getOrders();

   $('#slider ul li:last-child').prependTo('#slider ul');
   $('#slider ul li:first-child').appendTo('#slider ul');

   setInterval(function () {
   		$('#slider ul li:first-child').appendTo('#slider ul');
    }, 5000);

});