<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Generic Inventory System</title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/stylesheet.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/dashboard.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/jumbotron.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/submenu.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/profile.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/switch.css')); ?>" rel="stylesheet">

    <style>
        /*<?php echo e(App\SystemSetting::all()->first()->theme_color); ?>*/
        .panel > .panel-heading {
            background-image: none;
            background-color: <?php echo e(App\Theme::all()->first()->primary); ?>;
            color: #ffffff;
        }

        .navbar {
            background-color: <?php echo e(App\Theme::all()->first()->primary); ?>;
        }

        .nav-side-menu {
            background-color: <?php echo e(App\Theme::all()->first()->primary); ?>;
            color: #ffffff;
        }

        .nav-side-menu a li{
            text-decoration: none;
            /*Tertiary*/
            color: <?php echo e(App\Theme::all()->first()->tertiary); ?>;
        }

        .nav-side-menu ul .active,
        .nav-side-menu li .active {
            margin-top: 5px;

            /*Tertiary*/
            border-left: 5px solid <?php echo e(App\Theme::all()->first()->tertiary); ?>;

            /*Primary*/
            background-color: <?php echo e(App\Theme::all()->first()->primary); ?>;
        }

        .nav-side-menu ul .sub-menu li,
        .nav-side-menu li .sub-menu li {
            /*Secondary*/
            background-color: <?php echo e(App\Theme::all()->first()->secondary); ?>;
            border-bottom: <?php echo e(App\Theme::all()->first()->secondary); ?>;
        }

        .nav-side-menu ul .sub-menu li:hover,
        .nav-side-menu li .sub-menu li:hover {
            /*Primary*/
            background-color: <?php echo e(App\Theme::all()->first()->primary); ?>;
        }

        .accordion-section-title {
            border-bottom:1px solid #1a1a1a;
            background: <?php echo e(App\Theme::all()->first()->primary); ?>;
            text-shadow:0px 1px 0px #1a1a1a;
            color:#fff;
        }

        .accordion-section-title.active, .accordion-section-title:hover {
            background: <?php echo e(App\Theme::all()->first()->primary); ?>;
        }


    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>
</head>
<body>
    <div id="app">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/tether.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>" charset="utf-8"></script>
</body>
</html>
