<div class="panel panel-default">
	<div class="panel-body">
	@forelse($menus as $menu)
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
						</center>
					</div>
				</div>
			</form>
		</div>			
	@empty
	    <p>No menu Available</p>
	@endforelse
	</div>
</div>