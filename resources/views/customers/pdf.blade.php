<style type="text/css">
<<<<<<< HEAD
	body{
        font-size: 11px;
        font-family: arial, sans-serif;
    }
	table {
=======
	table {
    		    font-family: arial, sans-serif;
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    		    border-collapse: collapse;
    		    width: 100%;
    		}
    		td, th {
    		    border: 1px solid #dddddd;
    		    text-align: left;
<<<<<<< HEAD
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
    <div align="left"><span style="font-size: 15px">{{$company->name}}</span><br><div style="width: 25%">{{$company->address}}</div>TIN:{{$company->TIN}}<br>{{$company->contact}}&nbsp;/&nbsp;{{$company->email}}<br><br><center><span style="font-size: 13px;">Customers List</span></center>
=======
    		    padding: 8px;
    		}
</style>
<div class="container">
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
	<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Contact</th>
			<th>Address</th>
		</tr>
		@foreach ($customers as $key => $customer)
		<tr>
			<!-- <td>{{ ++$key }}</td> -->
			<td>{{ $customer->id }}</td>
			<td>{{ $customer->name }}</td>
			<td>{{ $customer->email }}</td>
			<td>{{ $customer->contact }}</td>
			<td>{{ $customer->address }}</td>
		</tr>
		@endforeach
	</table>
</div>