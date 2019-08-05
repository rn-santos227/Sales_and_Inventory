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
<div class="container">
	<div align="right">{{Carbon\Carbon::now()->format('m/d/Y')}}</div>
	@if(App\Company::all()->first()->logo != "/images/logos/")
    <img src='.{{ App\Company::all()->first()->logo}}' style=" width: 20%;">
	@endif
    <div align="left"><span style="font-size: 15px">{{$company->name}}</span><br><div style="width: 25%">{{$company->address}}</div>TIN:{{$company->TIN}}<br>{{$company->contact}}&nbsp;/&nbsp;{{$company->email}}<br><br><center><span style="font-size: 13px;">Suppliers List</span></center>
	<table>
		<tr>
			<th>ID</th>
			<th>REFRENCE CODE</th>
			<th>NAME</th>
			<th>CONTACT</th>
		</tr>
		@foreach ($suppliers as $key => $item)
		<tr>
			<td>{{ $item->id }}</td>
			<td>{{ $item->ref_code }}</td>
			<td>{{ $item->name }}</td>
			<td>{{ $item->contact }}</td>
		</tr>
		@endforeach
	</table>
</div>