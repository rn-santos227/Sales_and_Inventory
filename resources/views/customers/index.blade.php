@extends('admin.home')

@section('page')
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
<<<<<<< HEAD
            <div class="panel-heading"><h4><i class="fa fa-users" aria-hidden="true"></i>  Customers</h4></div>
=======
            <div class="panel-heading"><h3><i class="fa fa-users" aria-hidden="true"></i>  Customers</h3></div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            <div class="panel-body">
            <!-- Search Panel -->
                <div class="panel search">
                    <form method="GET" action="\customers">
                        <div class="panel-body">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search for..." value="{{ old('search')}}">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Search</span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                                        <i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span> <span class="hidden-xs hidden-sm"> New Customer</span>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="panel-footer" id="accordion" style="padding-left: 30px; padding-right: 30px; "> 
                            <div class="form-group">           
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-tags" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Search By</span></span>
                                    <select class="form-control" aria-describedby="sizing-addon2">
                                        <option value="id">ID Number</option>
                                        <option value="name">Customer Name</option>
                                        <option value="email">Customer Email</option>
                                        <option value="contact">Customer Contact</option>
                                        <option value="address">Customer Address</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">           
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-list" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Sort By</span></span>
                                    <select class="form-control" aria-describedby="sizing-addon2">
                                        <option>ID Number</option>
                                        <option>Product Name</option>
                                        <option>Product Code</option>
                                        <option>Product Category</option>
                                        <option>Product Supplier</option>
                                        <option>Date Added</option>
                                        <option>Last Update</option>
                                        <option>Quantity</option>
                                        <option>Price</option>
                                        <option>User Added</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Item Table Panel -->
                <table class="table table-bordered table-responsive">
<<<<<<< HEAD
                <a href="{{ route('pdf',['download'=>'pdf']) }}" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>&nbsp;
                        <a href="fileentry/dload/phpE8BD.tmp.xlsx"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Download Excel Template</a>
=======
                <a href="{{ route('pdf',['download'=>'pdf']) }}" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th class="col_hide">Contact</th>
                            <th class="col_hide">Status</th>
                            <th class="action">Action</th>
                        </tr>
                    </thead>
                    @forelse($customers as $customer)
                    
                    <tbody>
                        <tr>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->email}}</td>
                            <td class="col_hide">{{$customer->contact}}</td>
                            <td class="col_hide">{{$customer->active}}</td>
                            <td class="action">
                                <button class="btn btn-primary action" data-toggle="modal" data-target="#view{{$customer->id}}"><i class="fa fa-info-circle" aria-hidden="true"></i>
                <span class="hidden-xs hidden-sm"> View</span></button>
                                <button class="btn btn-warning action" data-toggle="modal" data-target="#update{{$customer->id}}"><i class="fa fa-pencil" aria-hidden="true"></i>
                <span class="hidden-xs hidden-sm"> Edit</span></button>
<!--                                    <button class="btn btn-danger" style="width: 100px;">Remove</button>-->
                            </td>
                        </tr>        
                    @empty
                          <tr><td colspan="5"><p>No customer Available</p></td></tr>
                    @endforelse
                    </tbody>
                </table>
                <center>
                    {{$customers->links()}}
                </center>
            </div>
        </div>
    </div>
</div>
@include('customers.create')
@include('customers.view')
@include('customers.update')
@endsection
