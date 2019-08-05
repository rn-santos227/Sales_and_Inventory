<style type="text/css">
    body{
        font-size: 11px;
    }
	table {
    		    font-family: arial, sans-serif;
                
    		    border-collapse: collapse;
    		    width: 100%;
    		}
    		td, th {
    		    border: 1px solid #dddddd;
    		    text-align: left;
    		}
    .box
    {
        width: 33.33%;
        float: left;
    }
</style>
    <!-- {{$company}} -->
    <div align="center">Audit Trail<br>{{$period}} Report<br>{{$datefrom->format('m/d/Y')}} through {{$dateto->format('m/d/Y')}}</div><br>
    <!-- {{Carbon\Carbon::now()}} -->
<div>
    <table id="myTable" class="table table-hover">
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