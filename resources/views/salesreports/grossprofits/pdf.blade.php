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
    <img src='{{ App\Company::all()->first()->getLogoAttribute()}}' alt="{{ App\SystemSetting::all()->first()->system_name}}">
    <div align="right">{{Carbon\Carbon::now()->format('m/d/Y')}}</div>
    <div align="left"><span style="font-size: 15px">{{$company->name}}</span><br><div style="width: 25%">{{$company->address}}</div>TIN:{{$company->TIN}}<br>{{$company->contact}}&nbsp;/&nbsp;{{$company->email}}<br><br><center><span style="font-size: 13px;">Gross Profit Report</span><br>{{$datefrom->format('m/d/Y')}} through {{$dateto->format('m/d/Y')}}</div></center><br>
<div>
    <table id="myTable" class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Total</th>
            <th>Vatable</th>
            <th>Vat</th>
            <th>Vat Exempt</th>
            <th>Vat Zero</th>
            <th>Amount Due</th>
            <th>Cash</th>
            <th>Change Due</th>
            <th>User ID</th>
            <th>Date</th>
        </tr>
    <thead>
    </thead>
        <tbody>
        </tbody>
    </table>
</div>