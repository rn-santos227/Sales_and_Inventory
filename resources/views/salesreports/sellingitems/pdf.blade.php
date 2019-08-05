<style type="text/css">
<<<<<<< HEAD
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
    <div align="left"><span style="font-size: 15px">{{$company->name}}</span><br><div style="width: 25%">{{$company->address}}</div>TIN:{{$company->TIN}}<br>{{$company->contact}}&nbsp;/&nbsp;{{$company->email}}<br><br><center><span style="font-size: 13px;">Top/Worst Selling Items Report</span><br>{{$datefrom->format('m/d/Y')}} through {{$dateto->format('m/d/Y')}}</div></center><br>
=======
	table {
    		    font-family: arial, sans-serif;
    		    border-collapse: collapse;
    		    width: 100%;
    		}
    		td, th {
    		    border: 1px solid #dddddd;
    		    text-align: left;
    		    padding: 8px;
    		}
</style>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
<div class="container">
	<table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Item</th>
            <th>Total Earnings</th>
            <th>Quantity Sold</th>
            <th>Date</th>
        </tr>
    <thead>
    </thead>
        <tbody>
            @forelse($items as $item) 
                <tr>
                    <td>{{$item->ref_code}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->subtotal}}</td>
                    <td>{{$item->qty}}</td>
                    <td>{{\Carbon\Carbon::parse($item->created_at)->format('j F Y h:i A')}}</td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>