<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1)->create();
        factory(App\Category::class, 1)->create();
        factory(App\Supplier::class, 1)->create();
        // factory(App\Menu::class, 10)->create();
        // factory(App\Receipt::class, 5)->create();
        factory(App\Company::class, 1)->create();
        factory(App\SystemSetting::class, 1)->create();
        // factory(App\Order::class, 10)->create();
<<<<<<< HEAD
        factory(App\Table::class, 5)->create();
        factory(App\Theme::class, 1)->create();
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }
}
