<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
<<<<<<< HEAD
        View::creator(['items.index','items.update','menus.index','restaurant.index','retailer.index','fastfood.index', 'inventory.index'], 'App\Http\ViewComposers\ItemComposer');
        View::creator(['retailer.index','restaurant.index','fastfood.index','admin.home', 'user.home'], 'App\Http\ViewComposers\SystemSettingComposer');
        View::creator(['retailer.index','restaurant.index','fastfood.index'], 'App\Http\ViewComposers\ReceiptComposer');
        View::creator(['dashboard.index'], 'App\Http\ViewComposers\ReportComposer');
        View::creator(['restaurant.index'], 'App\Http\ViewComposers\TableComposer');
        View::creator(['restaurant.menu', 'restaurant.menu','fastfood.index'], 'App\Http\ViewComposers\MenuComposer');
        View::creator(['fastfood.monitor'], 'App\Http\ViewComposers\AdsComposer');
        View::creator(['dashboard.index'], 'App\Http\ViewComposers\DashboardComposer');
=======
        View::creator(['items.index','items.update','menus.index','restaurant.index','retailer.index','fastfood.index'], 'App\Http\ViewComposers\ItemComposer');
        View::creator(['retailer.index','restaurant.index','fastfood.index','admin.home', 'user.home'], 'App\Http\ViewComposers\SystemSettingComposer');
        View::creator(['retailer.index','restaurant.index','fastfood.index'], 'App\Http\ViewComposers\ReceiptComposer');
        View::creator(['dashboard.index'], 'App\Http\ViewComposers\ReportComposer');
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
