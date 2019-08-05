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
<img src='.{{ App\Company::all()->first()->getLogoAttribute()}}' style=" width: 20%;">
    <div align="left"><span style="font-size: 15px">{{$company->name}}</span><br><div style="width: 25%">{{$company->address}}</div>TIN:{{$company->TIN}}<br>{{$company->contact}}&nbsp;/&nbsp;{{$company->email}}<br><br><center><span style="font-size: 13px;">Void Items Report</span><br>{{$datefrom->format('m/d/Y')}} through {{$dateto->format('m/d/Y')}}</div></center><br>
<div class="container">
	<table class="table table-hover">
        <thead>
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
        </thead>
        <tbody>
            <tbody>
                @forelse($items as $item) 
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->total}}</td>
                        <td>{{$item->vatable}}</td>
                        <td>{{$item->vat}}</td>
                        <td>{{$item->vat_exempt}}</td>
                        <td>{{$item->vat_zero}}</td>
                        <td>{{$item->amount_due}}</td>
                        <td>{{$item->cash}}</td>
                        <td>{{$item->change_due}}</td>
                        <td>{{$item->user_id}}</td>
                        <td>{{\Carbon\Carbon::parse($item->updated_at)->format('j F Y h:i A')}}</td>
                    </tr>
                @empty
                @endforelse
        </tbody>
    </table>
</div>