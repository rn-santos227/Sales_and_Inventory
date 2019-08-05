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
	<div align="right">{{Carbon\Carbon::now()->format('m/d/Y')}}</div>
	@if(App\Company::all()->first()->logo != "/images/logos/")
    <img src='.{{ App\Company::all()->first()->logo}}' style=" width: 20%;">
	@endif
    <div align="left"><span style="font-size: 15px">{{$company->name}}</span><br><div style="width: 25%">{{$company->address}}</div>TIN:{{$company->TIN}}<br>{{$company->contact}}&nbsp;/&nbsp;{{$company->email}}<br><br><center><span style="font-size: 13px;">Menu List</span></center>
=======
    		    padding: 8px;
    		}
</style>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
<div class="container">
	<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>CODE</th>
			<th>CATEGORY</th>
			<th>DESCRIPTION</th>
			<th>PRICE</th>
<<<<<<< HEAD
=======
			<th>STATUS</th>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
		</tr>
		@foreach ($menus as $key => $menu)
		<tr>
			<!-- <td>{{ ++$key }}</td> -->
			<td>{{ $menu->id }}</td>
			<td>{{ $menu->name }}</td>
			<td>{{ $menu->ref_code }}</td>
			<td>{{ $menu->category_id }}</td>
			<td>{{ $menu->description }}</td>
			<td>{{ $menu->price }}</td>
<<<<<<< HEAD
=======
			<td>{{ $menu->active }}</td>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
		</tr>
		@endforeach
	</table>
</div>