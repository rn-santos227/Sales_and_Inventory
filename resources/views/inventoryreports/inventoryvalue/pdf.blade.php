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
    <div align="left"><span style="font-size: 15px">{{$company->name}}</span><br><div style="width: 25%">{{$company->address}}</div>TIN:{{$company->TIN}}<br>{{$company->contact}}&nbsp;/&nbsp;{{$company->email}}<br><br><center><span style="font-size: 13px;">Inventory Value Report</span><br>{{$datefrom->format('m/d/Y')}} through {{$dateto->format('m/d/Y')}}</div></center><br>
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Cost</th>
                <th>Price</th>
                <th>Total Cost</th>
                <th>Total Retail Value</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{number_format($item->cost, 2, '.', ',')}}</td>
                <td>{{number_format($item->price, 2, '.', ',')}}</td>
                <td>{{number_format($item->quantity * $item->cost, 2, '.', ',')}}</td>
                <td>{{number_format($item->quantity * $item->price, 2, '.', ',')}}</td>
            </tr>        
            @empty
            @endforelse
        </tbody>
    </table>

    <div class="row">
        <div>
            <label>Total Cost of Inventory: {{number_format($itemTotalCost, 2, '.', ',')}}</label><br>
            <label>Total Retail Value of Inventory: {{number_format($itemTotalValue, 2, '.', ',')}}</label>
        </div>
    </div>
</div>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/tablesort.js') }}" type="text/javascript"></script>