<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Generic Inventory System</title>

    <!-- Styles -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylesheet.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jumbotron.css') }}" rel="stylesheet">
    <link href="{{ asset('css/submenu.css')}}" rel="stylesheet">
    <link href="{{ asset('css/profile.css')}}" rel="stylesheet">
<<<<<<< HEAD
    <link href="{{ asset('css/switch.css')}}" rel="stylesheet">

    <style>
        /*{{App\SystemSetting::all()->first()->theme_color}}*/
        .panel > .panel-heading {
            background-image: none;
            background-color: {{App\Theme::all()->first()->primary}};
            color: #ffffff;
        }

        .navbar {
            background-color: {{App\Theme::all()->first()->primary}};
        }

        .nav-side-menu {
            background-color: {{App\Theme::all()->first()->primary}};
            color: #ffffff;
        }

        .nav-side-menu a li{
            text-decoration: none;
            /*Tertiary*/
            color: {{App\Theme::all()->first()->tertiary}};
        }

        .nav-side-menu ul .active,
        .nav-side-menu li .active {
            margin-top: 5px;

            /*Tertiary*/
            border-left: 5px solid {{App\Theme::all()->first()->tertiary}};

            /*Primary*/
            background-color: {{App\Theme::all()->first()->primary}};
        }

        .nav-side-menu ul .sub-menu li,
        .nav-side-menu li .sub-menu li {
            /*Secondary*/
            background-color: {{App\Theme::all()->first()->secondary}};
            border-bottom: {{App\Theme::all()->first()->secondary}};
        }

        .nav-side-menu ul .sub-menu li:hover,
        .nav-side-menu li .sub-menu li:hover {
            /*Primary*/
            background-color: {{App\Theme::all()->first()->primary}};
        }

        .accordion-section-title {
            border-bottom:1px solid #1a1a1a;
            background: {{App\Theme::all()->first()->primary}};
            text-shadow:0px 1px 0px #1a1a1a;
            color:#fff;
        }

        .accordion-section-title.active, .accordion-section-title:hover {
            background: {{App\Theme::all()->first()->primary}};
        }


    </style>
=======
    
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/tether.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}" charset="utf-8"></script>
</body>
</html>
