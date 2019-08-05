@forelse($menus as $menu)
<<<<<<< HEAD
	<div class='col-md-4 hide-x-bar'>
		<form>
			<div class='panel panel-default'>
				<div class='panel-heading menu-heading'>
					<label>{{$menu->name}}</label>
				</div>
				<div class='panel-body'>
					<img class='img-rounded' src='{{$menu->image}}' width='100%'>
					<label>{{$menu->price}}</label>
				</div>
				<div class='panel-footer clearfix'>
					<center>
						{{ csrf_field() }}
						<input type='hidden' name='id'  id='id{{$menu->id}}' value='{{$menu->id}}'>
						<input type='hidden' name='name'  id='name{{$menu->id}}' value='{{$menu->name}}'>
						<input type='hidden' name='price' id='price{{$menu->id}}' value='{{$menu->price}}'>
						<button class='btn btn-xs btn-success addToTray' type='button' id='{{$menu->id}}' ><i class='fa fa-inbox' aria-hidden='true'></i> Add to Tray</button>
=======
	<div class="col-md-4 hide-x-bar">
		<form>
			<div class="panel panel-default">
				<div class="panel-heading menu-heading">
					<label>{{$menu->name}}</label>
				</div>
				<div class="panel-body">
					<img class="img-rounded" src="{{$menu->image}}" width="100%">
					<label>{{$menu->price}}</label>
				</div>
				<div class="panel-footer clearfix">
					<center>
						{{ csrf_field() }}
						<input type="hidden" name="id"  id="id{{$menu->id}}" value="{{$menu->id}}">
						<input type="hidden" name="name"  id="name{{$menu->id}}" value="{{$menu->name}}">
						<input type="hidden" name="price" id="price{{$menu->id}}" value="{{$menu->price}}">
						<button class="btn btn-xs btn-success addToTray" type="button" id="{{$menu->id}}" ><i class="fa fa-inbox" aria-hidden="true"></i> Add to Tray</button>
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
					</center>
				</div>
			</div>
		</form>
	</div>			
@empty
    <p>No menu Available</p>
@endforelse