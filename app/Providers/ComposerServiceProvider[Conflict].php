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
        View::creator(['items.index','items.update','menus.index','restaurant.index','retailer.index', 'fastfood.index'], 'App\Http\ViewComposers\ItemComposer');
        View::creator(['retailer.index','restaurant.index','fastfood.index','admin.home', 'user.home'], 'App\Http\ViewComposers\SystemSettingComposer');
        View::creator(['retailer.index','restaurant.index','fastfood.index'], 'App\Http\ViewComposers\ReceiptComposer');
        View::creator(['dashboard.index'], 'App\Http\ViewComposers\ReportComposer');
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
