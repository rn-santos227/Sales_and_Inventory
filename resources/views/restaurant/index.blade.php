@extends('admin.home')

@section('page')
<<<<<<< HEAD
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading"><h4><i class="fa fa-cutlery"></i> Restaurant</h4></div>
				<div class="panel-body">
                    <!-- Search Panel -->
                    <div class="accordion">
                    	<div class="accordion-section">
                    	<a class="accordion-section-title" data-accordion="#accordion-1"><b><i class="fa fa-pencil" aria-hidden="true"></i> Add New Table</b></a>
                    	<div id="accordion-1" class="accordion-section-content">
		            	@include('restaurant.set')
                    	</div>
                    </div>
                    <div id="product_container">
                       @include('restaurant.data')	
                   </div>
				</div>
			</div>
		</div>
	</div>

<!-- Child Views -->
@include('restaurant.orders')
@include('restaurant.cashier')

<!-- Dialog Messages -->
@include('dialogs.info')
@include('dialogs.success')
@include('dialogs.warning')

<!-- JavaScript Scripts -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/accordion.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/receipt-script.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/restaurant-script.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/numpad-script.js') }}" type="text/javascript"></script>
@endsection

=======
<div>
<div class="row">
</div>
	<div class="panel panel-default">
		<div class="panel-heading"><h3><i class="fa fa-cutlery" aria-hidden="true"></i> Restaurant</h3></div>
		<div class="panel-body">
			<div class="accordion">
				<div class="accordion-section">
					<a class="accordion-section-title" href="#accordion-1" id="show"><h4><i class="fa fa-pencil" aria-hidden="true"></i> Add New Table</h4></a>
	            	<div id="accordion-1" class="accordion-section-content">
	            	@include('restaurant.new')
	            	</div>
            	</div>
            </div>
            @include('restaurant.data')	
		</div>
	</div>
</div>
@include('dialogs.info')
@include('dialogs.warning')
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/accordion.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/restaurant-script.js') }}" type="text/javascript"></script>
@endsection
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
