@extends('admin.home')
@section('page')

<div class="row">
	<div class="col-md-7">
		<div class="panel panel-default">
			<div class="panel-heading">
				Product Catalog
			</div>
			<form>
	            <div class="panel-body" style="overflow: scroll; overflow-x: hidden; height:100vh;">
	                <input id="search" type="text" class="form-control" name="search" placeholder="Type the name or reference code of the product." required autofocus>
	                @include('retailer.data')
				</div>
	        </form>
		</div>
	</div>

		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row clearix">
						<form class="col-md-12">
							<p class="pull-left">Cart</p>
							<button type="button" class="btn btn-danger btn-xs pull-right clear"><i class="fa fa-eraser" aria-hidden="true"></i> Clear</button>
						</form>
					</div>
				</div>
				<div class="panel-body">
					@include('retailer.cart')
				</div>	
					<div class="panel-footer clearfix">
					<div class="accordion">
						<div class="accordion-section">
<<<<<<< HEAD
							<a class="accordion-section-title" data-accordion="#accordion-1" id="show" data-value="{{$setting->show_receipt}}"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Receipt Information </a>
=======
							<a class="accordion-section-title" href="#accordion-1" id="show" data-value="{{$setting->show_receipt}}"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Receipt Information </a>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
			            	<div id="accordion-1" class="accordion-section-content">
			            	@include('retailer.receipt')
			            	</div>
		            	</div>
		            </div>	
	            	<br/>
					<label>&nbsp;&nbsp;Amount Due: </label>
					<div class="input-group input-group-lg">
<<<<<<< HEAD
						<input style="background-color:#ffffff;" type="text" class="form-control" id="cashier-amount_due" name="amount_due" value="" readonly> <span class="input-group-btn"><button class="btn btn-md btn-success" id="cashier-modal"><i class="fa fa-money" aria-hidden="true"></i> Cashier</button></span> 
=======
						<input style="background-color:#ffffff;" type="text" class="form-control" id="receipt-amount_due" name="receipt-amount_due" value="" readonly> <span class="input-group-btn"><button class="btn btn-md btn-success" id="cashier-modal"><i class="fa fa-money" aria-hidden="true"></i> Cashier</button></span> 
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
					</div>
				</div>
			</div>
		</div>
</div>
@include('retailer.cashier')
@include('dialogs.info')
@include('dialogs.warning')
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/accordion.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/cashier-modal.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/retailer-script.js') }}" type="text/javascript"></script>
<<<<<<< HEAD
<script src="{{ asset('js/receipt-script.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/numpad-script.js') }}" type="text/javascript"></script>
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
@endsection

