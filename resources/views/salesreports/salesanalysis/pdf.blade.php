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
    <div align="left"><br><span style="font-size: 15px">{{$company->name}}</span><br><div style="width: 25%">{{$company->address}}</div>TIN:{{$company->TIN}}<br>{{$company->contact}}&nbsp;/&nbsp;{{$company->email}}<br><br><center><span style="font-size: 13px;">Sales Analysis Report</span><br></div></center><br>
<div>
    <table id="myTable" class="table table-hover">
        <thead>
            <tr>
                <th>Total Cost</th>
                <th>Total Gross Revenue</th>
                <th>Total Profit</th>
                <th>Period</th>
            </tr>
        </thead>
        
        <tbody>
        @forelse($salesanalysis as $analysis) 
            <tr>
                <td>{{$analysis->total_cost}}</td>
                <td>{{$analysis->total_grossrev}}</td>
                <td>{{$analysis->total_profit}}</td>
                <td>{{\Carbon\Carbon::parse($analysis->created_at)->format('j F Y h:i A')}}</td>
            </tr>
        @empty
        @endforelse
        </tbody>
    </table>
</div>