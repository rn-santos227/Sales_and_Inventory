<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Sets the main page when the url is accessed without any routes. 
Route::get('/', function () {
    return view('auth.login');
});

//TESTING PURPOSES
// Route::get('/test', function () {
//     return view('dashboard.chart');
// });

Auth::routes();

//Middleware application, it manages what type of users are able to access a page.
Route::get('/customers/pdf',array('as'=>'pdf','uses'=>'CustomerController@pdfview'));
Route::get('/menus/pdf',array('as'=>'menus/pdf','uses'=>'MenuController@pdfview'));
Route::get('/items/pdf',array('as'=>'items/pdf','uses'=>'ItemController@pdfview'));
Route::get('/accounts/pdf',array('as'=>'accounts/pdf','uses'=>'AccountController@pdfview'));
Route::get('/salesreports/sellingitems/pdf',array('as'=>'salesreports/sellingitems/pdf','uses'=>'SellingItemsReportController@pdfview'));
Route::get('/salesreports/salesactivities/pdf',array('as'=>'salesreports/salesactivities/pdf','uses'=>'SalesActivityReportController@pdfview'));
Route::get('/audittrail/pdf',array('as'=>'/audittrail/pdf','uses'=>'AuditTrailController@pdfview'));
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::put('/account/block', 'AccountController@block');
Route::put('/account/unblock', 'AccountController@unblock');

Route::post('retailer/search', 'RetailerController@search');
Route::post('retailer/total', 'RetailerController@total');
Route::post('retailer/add', 'RetailerController@addToCart');
Route::post('retailer/clear', 'RetailerController@clearCart');
Route::post('retailer/update', 'RetailerController@updateCart');
Route::post('retailer/delete', 'RetailerController@deleteFromCart');

Route::post('restaurant/total', 'RestaurantController@total');
Route::post('restaurant/add', 'RestaurantController@addToTray');
Route::post('restaurant/clear', 'RestaurantController@clearTray');
Route::post('restaurant/update', 'RestaurantController@updateTray');
Route::post('restaurant/delete', 'RestaurantController@deleteFromTray');

Route::post('orders/vieworder', 'OrderController@viewOrder');
Route::post('orders/search', 'OrderController@searchOrder');

Route::post('salesreports/salesactivities/search', 'SalesActivityReportController@search');
Route::post('salesreports/sellingitems/search', 'SellingItemsReportController@search');
Route::post('salesreports/salesanalysis/search', 'SalesAnalysisReportController@search');

Route::post('orders/search', 'OrderController@search');
Route::post('audittrail/search', 'AuditTrailController@search');

Route::get('/kitchen', 'KitchenController@index');
Route::post('/kitchen/load', 'KitchenController@load');
Route::post('/kitchen/serve', 'KitchenController@serve');

Route::post('/items/search', 'ItemController@search');

//Setting routes for the Controller's functions such as; index, show, store, update. Basically CRUD.
Route::resource('items', 'ItemController');
Route::resource('suppliers', 'SupplierController');
Route::resource('categories', 'CategoryController');
Route::resource('menus', 'MenuController');
Route::resource('customers', 'CustomerController');
Route::resource('company', 'CompanyController');
Route::resource('policies', 'PolicyController');
Route::resource('accounts', 'AccountController');
Route::resource('discounts', 'DiscountController');
Route::resource('settings', 'SettingController');
Route::resource('restaurant', 'RestaurantController');
Route::resource('retailer', 'RetailerController');
Route::resource('profile', 'ProfileController');
Route::resource('accountsettings', 'AccountSettingController');
Route::resource('systemsettings', 'SystemSettingController');
Route::resource('inventoryreport ', 'InventoryReportController');
Route::resource('audittrail', 'AuditTrailController');
Route::resource('dashboard', 'DashboardController');
Route::resource('orders', 'OrderController');

Route::resource('salesreports/salesactivities', 'SalesActivityReportController');
Route::resource('salesreports/sellingitems', 'SellingItemsReportController');
Route::resource('salesreports/grossprofits', 'GrossProfitReportController');
Route::resource('salesreports/salesanalysis', 'SalesAnalysisReportController');


