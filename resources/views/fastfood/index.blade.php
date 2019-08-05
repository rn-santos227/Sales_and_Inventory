@extends('admin.home')

@section('page')
<div>
	<div class="row">
		<div class="col-md-7">
			<div class="panel panel-default">
				<div class="panel-heading">
					Menu	
				</div>
				<div class="panel-body" style="overflow: scroll; overflow-x: hidden; height:80vh;">
<<<<<<< HEAD
					<form style="margin-bottom: 10%;">
						<div class="col-md-8">
							<input id="searchstr" class="form-control" type="text" placeholder="Search">
						</div>

						<div class="col-md-4">
							<select id="category" class="form-control">
								<option value="0">All</option>
								@forelse($categories as $category)
                            	<option value="{{$category->id}}">{{ $category->name }}</option>
                            	@empty
	                            @endforelse
							</select>
						</div>
					</form>

=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
					<div id="tray">	
						@include('fastfood.data');	
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="panel panel-default">
<<<<<<< HEAD
				<div class="panel-heading" style="margin-bottom: 0px; padding-bottom: 0px;">
=======
				<div class="panel-heading">
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
					<div class="row clearix">
						<form class="col-md-12">
							<p class="pull-left">Tray</p>
							<button type="button" class="btn btn-danger btn-xs pull-right clear"><i class="fa fa-eraser" aria-hidden="true"></i> Clear</button>
						</form>
					</div>
				</div>
				<div class="panel-body">
					@include('fastfood.tray')
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
			            	@include('fastfood.receipt')
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
</div>
@include('fastfood.cashier')
<<<<<<< HEAD

<!-- Dialogs -->
@include('dialogs.info')
@include('dialogs.warning')
@include('dialogs.success')

<!-- Scripts -->
=======
@include('dialogs.info')
@include('dialogs.warning')
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/accordion.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/cashier-modal.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/fastfood-script.js') }}" type="text/javascript"></script>
<<<<<<< HEAD
<script src="{{ asset('js/receipt-script.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/numpad-script.js') }}" type="text/javascript"></script>
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
@endsection


