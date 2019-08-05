<table id="tray" class="table borderless table-responsive" style="font-size: 12px;">
    <thead>
        <tr>
	        <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Total</th>
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
      	  <input class="txt_quantity" type="number" min="1" value="{{$cart->quantity}}" id="count{{$cart->id}}" style="width:40px;">
        <button type="button" class="btn btn-xs btn-primary minus" style="border-radius: 50%;" id="{{$cart->id}}"><i class="fa fa-minus" aria-hidden="true"></i></button>
        </td>
        <td><label id="subtotal{{$cart->id}}">{{ number_format((float)$cart->price * $cart->quantity, 2, '.', '')}}</label></td>
			  <td align="center">
					<input type="hidden" name="deleteid" value="{{$cart->id}}">
					<button type="button" class="btn btn-xs btn-danger removeToTray" style="border-radius: 50%;" id="{{$cart->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
			  </td>
		  </tr>
   		@empty
   		@endforelse
    </tbody>
</table>