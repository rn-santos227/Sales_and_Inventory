@extends('admin.home')

@section('page')
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
<<<<<<< HEAD
            <div class="panel-heading"><h4>Company Profile</h4></div>
            <div class="container-fluid">
	            <div class="panel-body">
                    <label>Company Logo</label><br>
                    <img src="{{$companies->getLogoAttribute()}}" style=" width: 30%;"><br>
                    <label>Company Name</label><br>
	            	{{$companies->name}}<br>
                    <label>Company Description</label>
	                <p align="justify">
                        {{$companies->description}}
					</p>
                    <label>Address</label><br>
                    {{$companies->address}}<br>
                    <label>Contact</label><br>
                    {{$companies->contact}}<br>
                    <label>Email</label><br>
                    {{$companies->email}}<br>
                    <label>TIN</label><br>
                    {{$companies->TIN}}<br>

=======
            <div class="panel-heading"><center><h3><img src="http://svantecorp.com/images/svante-logo.png" style="width: 50%;"></h3></center></div>
            <div class="container-fluid">
	            <div class="panel-body text-center">
	            	<h3>{{$companies->name}}</h3>
	                <p align="justify">
                        {{$companies->description}}
					</p>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
					<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#update">
                        <i class="fa fa-pencil" aria-hidden="true"></i></span> <span class="hidden-xs hidden-sm"></span>
                    </button>
	            </div>
            </div>
        </div>
    </div>
</div>
@include('company.update')
@endsection
