@extends('admin.home')

@section('page')
	<div class="container-fluid">
	    <div class="row">
	        <div class="panel panel-default">
<<<<<<< HEAD
	            <div class="panel-heading"><h4><i class="fa fa-users" aria-hidden="true"></i> Accounts</h4></div>
=======
	            <div class="panel-heading"><h3><i class="fa fa-users" aria-hidden="true"></i> Accounts</h3></div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	            <div class="panel-body">
	            <!-- Search Panel -->
					<div class="panel search">
	                    <div class="panel-body">
	                        <div class="input-group">
	                            <input type="text" name="serch" class="form-control" placeholder="Search for..." value="{{ old('search') }}">
	                            <span class="input-group-btn">
	                                <button class="btn btn-primary" type="submit">
	                                    <i class="fa fa-search" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Search</span>
	                                </button>
	                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
	                                    <i class="fa fa-plus-square fa-lg" aria-hidden="true"></i> <span class="hidden-xs hidden-sm"> New Account</span>
	                                </button>
	                            </span>
	                        </div>
	                    </div>
	                    <div class="panel-footer" id="accordion" style="padding-left: 30px; padding-right: 30px; "> 
	                        <form class="form-horizontal">
	                            <div class="form-group">           
	                                <div class="input-group">
	                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-tags" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Search By</span></span>
	                                    <select class="form-control" aria-describedby="sizing-addon2" name="tag">
	                                        <option value="id">ID Number</option>
	                                        <option value="ref_code">Menu Code</option>
	                                        <option value="name">Menu Name</option>
	                                        <option value="category">Menu Category</option>
	                                        <option value="description">Menu Description</option>
	                                    </select>
	                                </div>
	                            </div>
	                        </form>
	                        <form class="form-horizontal">
	                            <div class="form-group">           
	                                <div class="input-group">
	                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-list" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Sort By</span></span>
	                                    <select class="form-control" aria-describedby="sizing-addon2">
	                                        <option>ID Number</option>
	                                        <option>Menu Code</option>
	                                        <option>Menu Name</option>
	                                        <option>Menu Category</option>
	                                        <option>Date Added</option>
	                                        <option>Last Update</option>
	                                        <option>Price</option>
	                                    </select>
	                                </div>
	                            </div>
	                        </form>
	                    </div>
	                </div>

	                <a href="{{ route('accounts/pdf',['download'=>'pdf']) }}" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  Download PDF</a>

	                <table class="table table-bordered table-responsive">
						<thead>
							<tr>
								<th>User Level</th>
								<th>Username</th>
								<th class="col_hide">First Name</th>
	                            <th class="col_hide">Last Name</th>
	                            <th class="col_hide">Email</th>
								<th class="col_hide">Status</th>
								<th class="action">Action</th>
							</tr>
						</thead>

						<tbody>
							@forelse($accounts as $account)
<<<<<<< HEAD
								@if(Auth::user()->id != $account->id)
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
								<tr>
									<td>{{$account->user_level}}</td>
									<td>{{$account->username}}</td>
	                                <td class="col_hide">{{$account->first_name}}</td>
	                                <td class="col_hide">{{$account->last_name}}</td>
	                                <td class="col_hide">{{$account->email}}</td>
									<td class="col_hide">{{$account->active}}</td>
									<td class="action">
									<div class="row">
										<div class="col-md-5">
											<button class="btn btn-primary action" data-toggle="modal" data-target="#view{{$account->id}}"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>
										</div>

										<div class="col-md-5">
											<!-- Checks wether if the user is active or not to decide which button to show (Block or Unblock) -->
											@if($account->active == "Active")
											<form method="POST" action="/account/block">
								                {{ method_field('PUT')  }}
								                {{ csrf_field() }}
								                <input type="hidden" value="{{$account->id}}" name="id" id="id">
								                <input type="hidden" value="{{$account->username}}" name="username" id="username">
			                                 	<button class="btn btn-danger action" type="submit"><i class="fa fa-lock" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Lock</span></button>
			                                 </form>
			                                @else
			                                <form method="POST" action="/account/unblock">
								                <input type="hidden" value="{{$account->id}}" name="id" id="id">
			                               		{{ method_field('PUT')  }}
								                {{ csrf_field() }}
								                <input type="hidden" value="{{$account->id}}" name="id" id="id">
								                <input type="hidden" value="{{$account->username}}" name="username" id="username">
			                                	<button class="btn btn-danger action" type="submit"><i class="fa fa-unlock-alt" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Unlock</span></button>
			                                </form>
			                                @endif
										</div>
									</div>
									</td>
								</tr>
<<<<<<< HEAD
								@endif
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
							@empty
	                            <tr><td colspan="4"><p>No accounts Available</p></td></tr>
	                        @endforelse
						</tbody>
					</table>
					<center>
						{{ $accounts->links() }}
					</center>
	            </div>
	        </div>
	    </div>
	</div>

@include('accounts.create')
@include('accounts.view')
@endsection
