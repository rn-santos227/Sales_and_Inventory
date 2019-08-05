@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: {{App\Theme::all()->first()->secondary}};
    }

    .panel-body {
        background-color: {{App\Theme::all()->first()->secondary}};
    }

    .outer {
        display: table;
        position: absolute;
        height: 80%;
        width: 100%;
    }

    .middle {
        display: table-cell;
        vertical-align: middle;
    }

    .inner {
        margin-left: auto;
        margin-right: auto; 
        width: 100%;
    }

</style>
<div class="outer">
    <div class="middle">
        <div class="inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 anim">
                        <center>
                            <!-- <h1 style="font-size: 1000%; color: {{App\Theme::all()->first()->tertiary}};"> <i class="fa fa-circle-o-notch" aria-hidden="true"></i> </h1> -->
                            <h1 class="col-md-6 col-md-offset-3" style="margin-bottom: 4%; text-transform: uppercase; font-size: 200%; color: {{App\Theme::all()->first()->tertiary}};">
                                {{App\SystemSetting::all()->first()->system_name}}
                            </h1>
                        </center>

                        <div class="panel panel-default" style="border: 0px; border: 0;">
                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                        <div class="col-md-6 col-md-offset-3">
                                            <input placeholder="Username" id="username" type="text" class="form-control text-center" name="username" value="{{ old('username') }}" required autofocus>

                                            @if ($errors->has('username'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <div class="col-md-6 col-md-offset-3">
                                            <input placeholder="Password" id="password" type="password" class="form-control text-center" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button style="width: 100%; border-color: {{App\Theme::all()->first()->tertiary}}; background-color: {{App\Theme::all()->first()->tertiary}};" type="submit" class="btn btn-primary">
                                                Log In
                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-group item_hide">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="checkbox pull-left">
                                                <label>
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember
                                                </label>
                                            </div>

                                            <a class="btn btn-link pull-right item_hide" style="color: {{App\Theme::all()->first()->tertiary}};" href="{{ route('password.request') }}">
                                                Forgot Your Password?
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
