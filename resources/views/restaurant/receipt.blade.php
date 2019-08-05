<form class="form-horizontal">
	<div class="form-group{{ $errors->has('receipt_id') ? ' has-error' : '' }}">
        <label for="receipt_id" class="col-md-3 control-label">Receipt #: </label>
        <div class="col-md-8">
            <input id="receipt-id" type="text" class="form-control" name="receipt_id" readonly style="background-color:#ffffff;">
        </div>
    </div>

	    <div class="form-group{{ $errors->has('count') ? ' has-error' : '' }}">
        <label for="count" class="col-md-3 control-label">Item Count: </label>
        <div class="col-md-8">
            <input id="receipt-count" type="text" class="form-control" name="count" required readonly style="background-color:#ffffff;">
        </div>
    </div>

    <div class="form-group{{ $errors->has('subtotal') ? ' has-error' : '' }}">
        <label for="subtotal" class="col-md-3 control-label">Subtotal: </label>
        <div class="col-md-8">
            <input id="receipt-subtotal" type="text" class="form-control" name="subtotal" required readonly style="background-color:#ffffff;">
        </div>
    </div>

    <div class="form-group{{ $errors->has('vatable') ? ' has-error' : '' }}">
        <label for="vatable" class="col-md-3 control-label">VATable: </label>
        <div class="col-md-8">
            <input id="receipt-vatable" type="text" class="form-control" name="vatable"
            required readonly style="background-color:#ffffff;"> 
        </div>
    </div>

    <div class="form-group{{ $errors->has('vat') ? ' has-error' : '' }}">
        <label for="vat" class="col-md-3 control-label">VAT: </label>
        <div class="col-md-8">
            <input id="receipt-vat" type="text" class="form-control" name="vat" required readonly style="background-color:#ffffff;">
        </div>
    </div>

    <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
        <label for="discount" class="col-md-3 control-label">Discount: </label>
        <div class="col-md-8">
           	<div class="input-group">
                <input id="receipt-discount" type="text" class="form-control" name="discount" required style="background-color:#ffffff;">
               <div class = "input-group-btn">
                    <!-- <input id="btn_discount" type="text" class="form-control" name="customer_name" required autofocus list="discounts"  style="width: 100px">
                        <datalist id="discounts">
                            @foreach($discounts as $discount)
                            <option value="{{$discount->rate}}" class="compute_discount" >{{ $discount->ref_code }}</option>
                            @endforeach
                        </datalist> -->
                  	<button type="button" class="btn btn-primary dropdown-toggle" style="width: 100px" data-toggle="dropdown" id="btn_discount">0% <span class="caret"></span></button>
                  	<ul class = "dropdown-menu pull-right">
	                    <li><a data-value="0" class="compute_discount">No Discount</a></li>
                        @foreach($discounts as $discount)
                        <li><a data-value="{{$discount->rate}}" class="compute_discount">{{ $discount->name }}</a></li>
                        @endforeach
                  	</ul>
            	</div>
            </div>
        </div>
    </div>

    <div class="form-group{{ $errors->has('vat_exempt') ? ' has-error' : '' }}">
        <label for="vatexempted" class="col-md-3 control-label">VAT Exempt: </label>
        <div class="col-md-8">
            <input id="receipt-exempted" type="text" class="form-control" name="vat_exempt" required readonly style="background-color:#ffffff;">
        </div>
    </div>

  	<div class="form-group{{ $errors->has('vat_sales') ? ' has-error' : '' }}">
        <label for="vat_sales" class="col-md-3 control-label">VAT Sales: </label>
        <div class="col-md-8">
            <input id="receipt-vat_sales" type="text" class="form-control" name="vat_sales" required readonly style="background-color:#ffffff;">
        </div>
    </div>

    <div class="form-group{{ $errors->has('service_charge') ? ' has-error' : '' }}">
        <label for="service_charge" class="col-md-3 control-label">Service Charge: </label>
        <div class="col-md-8">
            <input id="receipt-service_charge" type="text" class="form-control" name="service_charge" required readonly style="background-color:#ffffff;">
        </div>
    </div>
	<!-- end panel body -->  
</form>
