@extends('layouts.app')

@section('content')
<<<<<<< HEAD

<style>
	body {
		background-color: {{App\Theme::all()->first()->primary}};
	}
</style>
<a style="color: #ffffff;" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
<div class="panel panel-default">
	<div class="panel-body" style="overflow: scroll; height:85vh;">
		<div class="row">
			<div id="kitchen">
			</div>
		</div>
	</div>
</div>

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/kitchen-script.js') }}"></script>
@endsection