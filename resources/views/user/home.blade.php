@extends('layouts.app')

@section('content')
  @include('user.menu')
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-0">
        <div class="nav-side-menu submenu">
          @include('user.sidenav')
        </div>
      </div>
    </div>
  </div>
@endsection
