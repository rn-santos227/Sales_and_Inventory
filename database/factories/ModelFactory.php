<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'user_level' => 'Administrator',
        'username' => 'testaccount00',
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => $faker->unique()->email,
        'password' => 'secret',
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Uncategorized',
        'ref_code' => str_random(10),
        'description' => 'Default Category for Uncategorized Items.',
    ];
});


$factory->define(App\Supplier::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Default',
        'ref_code' => str_random(10),
        'email' => $faker->unique()->email,
        'address' => $faker->address,
        'contact' => $faker->phonenumber,
        'description' => 'Default Supplier for self-made products.',        
    ];
});

<<<<<<< HEAD
$factory->define(App\Table::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Table ' . $faker->unique()->numberBetween($min = 1, $max = 10),
        'ref_code' => 'TBL' . $faker->unique()->numberBetween($min = 1, $max = 10),   
    ];
});

=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
$factory->define(App\Receipt::class, function (Faker\Generator $faker) {
    $total = rand(800,999);
    $cash = rand($total,$total+999);
    return [
<<<<<<< HEAD
=======
        // 'id' => $faker->wor
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        'total' => $total,
        'vatable' => $total-($total*0.12),
        'vat' => 0,
        'vat_exempt' => 0,
        'vat_zero' => 0,
        'amount_due' => $total-($total*0.12),
        'cash' => $cash,
        'change_due' => $cash-$total, 
        'user_id' => rand(1,10),
        'status' => 'pending',
    ];
});

$factory->define(App\SystemSetting::class, function (Faker\Generator $faker) {
    return [
        'system_name' => 'System Name',
        'vatable' => 1.12,
        'tax_rate' => .12,
<<<<<<< HEAD
        'non_vat' => 0,
=======
        'non_vat' => 1,
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    ];
});


$factory->define(App\Menu::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'ref_code' => $faker->name,
        'category_id' => App\Category::all()->random()->id,
        'description' => $faker->paragraph(5),
        'image' => 'SNN.jpg',
        'cost' => rand(80,90),
        'price' => rand(90,100),
        'active' => 1,
        
    ];
});

$factory->define(App\Order::class, function (Faker\Generator $faker) {
    return [
        'item' => $faker->name,
        'item_id' => rand(1,10),
        'qty' => rand(1,10),
        'price' => rand(80,100),
        'subtotal' => rand(200, 500),
        'receipt_id' => App\Receipt::all()->random()->id,
        'status' => 'pending',
    ];
});

$factory->define(App\Company::class, function (Faker\Generator $faker) {
    return [
<<<<<<< HEAD
        'name' => $faker->name,
        'description' => $faker->paragraph(2),
        'email' => $faker->unique()->email,
        'contact' => $faker->phoneNumber,
        'address' => $faker->paragraph(1),
        'TIN' => $faker->phoneNumber,
    ];
});


$factory->define(App\Theme::class, function (Faker\Generator $faker) {
    return [
        'primary' => '#24292e',
        'secondary' => '#202428',
        'tertiary' => '#4fc1e9',
        'font_color' => '#ffffff',
    ];
});
=======
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
    ];
});

>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
