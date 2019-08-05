<style type="text/css">
    body{
        font-size: 11px;
        font-family: arial, sans-serif;
    }
    table {
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
<div align="right">{{Carbon\Carbon::now()->format('m/d/Y')}}</div>
@if(App\Company::all()->first()->logo != "/images/logos/")
    <img src='.{{ App\Company::all()->first()->logo}}' style=" width: 20%;">
@endif
    <div align="left"><span style="font-size: 15px">{{$company->name}}</span><br><div style="width: 25%">{{$company->address}}</div>TIN:{{$company->TIN}}<br>{{$company->contact}}&nbsp;/&nbsp;{{$company->email}}<br><br><center><span style="font-size: 13px;">Inventory Logs Report</span><br>{{$datefrom->format('m/d/Y')}} through {{$dateto->format('m/d/Y')}}</div></center><br>
<div class="container">
    </table>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>User</th>
                <th>Reference Code</th>
                <th>Field</th>
                <th>Action</th>
                <th>Amount</th>
                <th>Old Value</th>
                <th>New Value</th>
                <th style="max-width: 300px;">Comment</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>
        @forelse($inventorylogs as $log)
            <tr>
                <td>{{$log->user_id}}</td>
                <td>{{$log->ref_code}}</td>
                <td>{{$log->field}}</td>
                <td>{{$log->action}}</td>
                <td>{{$log->amount}}</td>
                <td>{{$log->old_value}}</td>
                <td>{{$log->new_value}}</td>
                <td style="max-width: 300px;">{{$log->comment}}</td>
                <td>{{\Carbon\Carbon::parse($log->created_at)->format('j F Y h:i A')}}</td>
            </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/tablesort.js') }}" type="text/javascript"></script>