@extends('admin.home')
@section('page')

<div class="container-fluid">
	<div class="row">
		<div class="panel panel-default">
<<<<<<< HEAD
			<div class="panel-heading"><h4><i class="fa fa-history" aria-hidden="true"></i> Audit Trail</h4></div>
=======
			<div class="panel-heading"><h3><i class="fa fa-history" aria-hidden="true"></i> Audit Trail</h3></div>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
			<div class="panel-body">
				
				<form action="/audittrail/search" method="post" class="form-inline">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label>Date From:</label>
                            <input type="date" name="datefrom" id="datefrom" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Date To:</label>
                            <input type="date" name="dateto" id="dateto" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Period:</label>
                            <select name="period" id="period" class="form-control">
                                <option></option>
                                <option>Daily</option>
                                <option>Weekly</option>
                                <option>Monthly</option>
                                <option>Yearly</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-md" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                        </div>
                    </form>
                    <br>
                <a href="{{ route('/audittrail/pdf',['download'=>'pdf']) }}" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>
				<table class="table table-hover">
					<thead>
						<tr>
						    <th>Username</th>
						    <th>Form</th>
						    <th>Action</th>
						    <th>Date</th>
					    </tr>
				    </thead>
				    <tbody>
				    	@forelse($audittrails as $audittrail)
                        <tr>
                            <td>{{$audittrail->username}}</td>
                            <td>{{$audittrail->form_name}}</td>
                            <td>{{$audittrail->activity}}</td>
                            <td>{{$audittrail->created_at}}</td>
                        </tr>        
                        @empty
                        @endforelse
				    </tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection