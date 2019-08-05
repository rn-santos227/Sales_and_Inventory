<table id="cart" class="table borderless table-responsive" style="font-size: 12px;">
    <thead>
        <tr>
	        <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
<<<<<<< HEAD
            <th>Total</th>
=======
            <th>Each</th>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
   		@forelse($carts as $cart)
   		<tr id="order{{$cart->id}}">
   			<td id="order_id{{$cart->id}}">{{$cart->id}}</td>
            <td id="order_name{{$cart->id}}">{{$cart->name}}</td>
            <td>
            	<button type="button" class="btn btn-xs btn-primary plus" style="border-radius: 50%" id="{{$cart->id}}"><i class="fa fa-plus" aria-hidden="true"></i></button>
<<<<<<< HEAD
            	<input class="txt_quantity" type="number" min="1" max="{{$cart->max}}" value="{{$cart->quantity}}" id="count{{$cart->id}}" style="width:40px;">
=======
            	<input class="txt_quantity" type="number" min="1" value="{{$cart->quantity}}" id="count{{$cart->id}}" style="width:40px;">
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
              <button type="button" class="btn btn-xs btn-primary minus" style="border-radius: 50%;" id="{{$cart->id}}"><i class="fa fa-minus" aria-hidden="true"></i></button>
            </td>
            <td><label id="subtotal{{$cart->id}}">{{ number_format((float)$cart->price * $cart->quantity, 2, '.', '')}}</label></td>
			<td align="center">
				<form>
          <input type="hidden" name="order_price{{$cart->id}}" value="{{$cart->price}}">
					<input type="hidden" name="deleteid" value="{{$cart->id}}">
					<button type="button" class="btn btn-xs btn-danger removeToTray" style="border-radius: 50%;" id="{{$cart->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
				</form>
			</td>
		</tr>
   		@empty
   		@endforelse
    </tbody>
</table>