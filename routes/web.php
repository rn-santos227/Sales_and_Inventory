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
	if(!Auth::check()) return view('auth.login');
    else return view('dashboard.index');
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
<<<<<<< HEAD
Route::get('/employees/pdf',array('as'=>'employees/pdf','uses'=>'EmployeeController@pdfview'));
Route::get('/accounts/pdf',array('as'=>'accounts/pdf','uses'=>'AccountController@pdfview'));
Route::get('/suppliers/pdf',array('as'=>'suppliers/pdf','uses'=>'SupplierController@pdfview'));
Route::get('/categories/pdf',array('as'=>'categories/pdf','uses'=>'CategoryController@pdfview'));
Route::get('/tables/pdf',array('as'=>'tables/pdf','uses'=>'TableController@pdfview'));
Route::get('/promos/pdf',array('as'=>'promos/pdf','uses'=>'PromoController@pdfview'));
Route::get('/discounts/pdf',array('as'=>'discounts/pdf','uses'=>'DiscountController@pdfview'));
Route::get('/salesreports/sellingitems/pdf',array('as'=>'salesreports/sellingitems/pdf','uses'=>'SellingItemsReportController@pdfview'));
Route::get('/salesreports/salesactivities/pdf',array('as'=>'salesreports/salesactivities/pdf','uses'=>'SalesActivityReportController@pdfview'));
Route::get('/salesreports/salesanalysis/pdf',array('as'=>'salesreports/salesanalysis/pdf','uses'=>'SalesAnalysisReportController@pdfview'));
Route::get('/salesreports/grossprofits/pdf',array('as'=>'salesreports/grossprofits/pdf','uses'=>'GrossProfitReportController@pdfview'));
Route::get('/salesreports/voidreports/pdf',array('as'=>'salesreports/voidreports/pdf','uses'=>'VoidReportController@pdfview'));
Route::get('/audittrail/pdf',array('as'=>'/audittrail/pdf','uses'=>'AuditTrailController@pdfview'));
Route::get('/inventoryreports/inventoryvalue/pdf',array('as'=>'inventoryreports/inventoryvalue/pdf','uses'=>'InventoryValueController@pdfview'));
Route::get('/inventoryreports/inventorylogs/pdf',array('as'=>'inventoryreports/inventorylogs/pdf','uses'=>'InventoryLogsController@pdfview'));


Route::get('fileentry', 'FileEntryController@index');
Route::get('fileentry/get/{filename}', [
	'as' => 'getentry', 'uses' => 'FileEntryController@get']);
Route::post('fileentry/add',['as'=>'addentry','uses'=> 'FileEntryController@add']);
Route::get('fileentry/dload/{filename}','FileEntryController@dload');


=======
Route::get('/accounts/pdf',array('as'=>'accounts/pdf','uses'=>'AccountController@pdfview'));
Route::get('/salesreports/sellingitems/pdf',array('as'=>'salesreports/sellingitems/pdf','uses'=>'SellingItemsReportController@pdfview'));
Route::get('/salesreports/salesactivities/pdf',array('as'=>'salesreports/salesactivities/pdf','uses'=>'SalesActivityReportController@pdfview'));
Route::get('/audittrail/pdf',array('as'=>'/audittrail/pdf','uses'=>'AuditTrailController@pdfview'));
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::put('/account/block', 'AccountController@block');
Route::put('/account/unblock', 'AccountController@unblock');

<<<<<<< HEAD
//Sales and Inventory System
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
Route::post('retailer/search', 'RetailerController@search');
Route::post('retailer/total', 'RetailerController@total');
Route::post('retailer/add', 'RetailerController@addToCart');
Route::post('retailer/clear', 'RetailerController@clearCart');
Route::post('retailer/update', 'RetailerController@updateCart');
Route::post('retailer/delete', 'RetailerController@deleteFromCart');
<<<<<<< HEAD
Route::post('retailer/promo', 'RetailerController@promo');

Route::post('inventory/search', 'InventoryController@search');
Route::post('inventory/view', 'InventoryController@view');
Route::post('inventory/addtoinventory', 'InventoryController@addtoinventory');
Route::post('inventory/save', 'InventoryController@save');
Route::post('inventory/updateprice', 'InventoryController@updatePrice');
Route::post('inventory/updatetax', 'InventoryController@updateTax');
Route::post('inventory/updatecost', 'InventoryController@updateCost');
Route::post('inventory/updatereorderpoint', 'InventoryController@updateReorderPoint');
Route::post('inventory/updateexpdate', 'InventoryController@updateExpDate');
Route::post('inventory/updatestocks', 'InventoryController@updateStocks');
Route::post('inventory/addstocks', 'InventoryController@addStocks');
Route::post('inventory/pullstocks', 'InventoryController@pullStocks');
Route::post('inventory/setstatus', 'InventoryController@setStatus');
Route::post('inventory/deleteentry', 'InventoryController@deleteEntry');
Route::post('inventory/currentinventory', 'InventoryController@showActiveInventory');
Route::post('inventory/inactiveinventory', 'InventoryController@showInactiveInventory');

Route::post('orders/vieworder', 'OrderController@viewOrder');
Route::post('orders/search', 'OrderController@searchOrder');
Route::post('orders/searchid', 'OrderController@searchID');
Route::post('orders/void', 'OrderController@voidOrder');
Route::post('orders/confirmpassword', 'OrderController@confirmPassword');
Route::post('orders/getmode', 'OrderController@getMode');

Route::post('inventoryreports/inventorybeginning-ending/search', 'InventoryReportController@search');

Route::post('salesreports/salesactivities/search', 'SalesActivityReportController@search');
Route::post('salesreports/sellingitems/search', 'SellingItemsReportController@search');
Route::post('salesreports/salesanalysis/search', 'SalesAnalysisReportController@search');
Route::post('salesreports/salesreports/search', 'VoidReportController@search');

//Route::post('orders/search', 'OrderController@search');
Route::post('audittrail/search', 'AuditTrailController@search');

=======

Route::post('fastfood/total', 'FastFoodController@total');
Route::post('fastfood/add', 'FastFoodController@addToTray');
Route::post('fastfood/clear', 'FastFoodController@clearTray');
Route::post('fastfood/update', 'FastFoodController@updateTray');
Route::post('fastfood/delete', 'FastFoodController@deleteFromTray');

Route::post('inventory/search', 'InventoryController@search');
Route::post('inventory/view', 'InventoryController@view');
Route::post('inventory/addtoinventory', 'InventoryController@addtoinventory');

Route::post('orders/vieworder', 'OrderController@viewOrder');
Route::post('orders/search', 'OrderController@searchOrder');
Route::post('orders/searchid', 'OrderController@searchID');
Route::post('orders/void', 'OrderController@voidOrder');
Route::post('orders/confirmpassword', 'OrderController@confirmPassword');

Route::post('salesreports/salesactivities/search', 'SalesActivityReportController@search');
Route::post('salesreports/sellingitems/search', 'SellingItemsReportController@search');
Route::post('salesreports/salesanalysis/search', 'SalesAnalysisReportController@search');

// Route::post('orders/search', 'OrderController@search');
Route::post('audittrail/search', 'AuditTrailController@search');

Route::get('/kitchen', 'KitchenController@index');
Route::post('/kitchen/load', 'KitchenController@load');
Route::post('/kitchen/serve', 'KitchenController@serve');

>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
//Setting routes for the Controller's functions such as; index, show, store, update. Basically CRUD.
Route::resource('items', 'ItemController');
Route::resource('suppliers', 'SupplierController');
Route::resource('categories', 'CategoryController');
Route::resource('menus', 'MenuController');
<<<<<<< HEAD
Route::resource('tables', 'TableController');
Route::resource('employees', 'EmployeeController');
Route::resource('customers', 'CustomerController');
Route::resource('promos', 'PromoController');
=======
Route::resource('customers', 'CustomerController');
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
Route::resource('company', 'CompanyController');
Route::resource('policies', 'PolicyController');
Route::resource('accounts', 'AccountController');
Route::resource('discounts', 'DiscountController');
Route::resource('settings', 'SettingController');
Route::resource('restaurant', 'RestaurantController');
Route::resource('fastfood', 'FastFoodController');
Route::resource('retailer', 'RetailerController');
Route::resource('profile', 'ProfileController');
Route::resource('accountsettings', 'AccountSettingController');
Route::resource('systemsettings', 'SystemSettingController');
<<<<<<< HEAD
=======
Route::resource('inventoryreport ', 'InventoryReportController');
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
Route::resource('audittrail', 'AuditTrailController');
Route::resource('dashboard', 'DashboardController');
Route::resource('orders', 'OrderController');
Route::resource('inventory', 'InventoryController');
<<<<<<< HEAD
Route::resource('ads', 'AdController');
Route::resource('attendance', 'AttendanceController');
Route::resource('database', 'DatabaseController');

Route::resource('inventoryreports/inventoryvalue', 'InventoryValueController');
Route::resource('inventoryreports/inventorybeginning-ending', 'InventoryReportController');

Route::resource('inventoryreports/inventorylogs', 'InventoryLogsController');
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

Route::resource('salesreports/salesactivities', 'SalesActivityReportController');
Route::resource('salesreports/sellingitems', 'SellingItemsReportController');
Route::resource('salesreports/grossprofits', 'GrossProfitReportController');
Route::resource('salesreports/salesanalysis', 'SalesAnalysisReportController');
<<<<<<< HEAD
Route::resource('salesreports/voidreports', 'VoidReportController');

//Search Functions in File Maintenance
Route::post('categories/search', 'CategoryController@search');
Route::post('discounts/search', 'DiscountController@search');
Route::post('employees/search', 'EmployeeController@search');
Route::post('items/search', 'ItemController@search');
Route::post('menus/search', 'MenuController@search');
Route::post('promos/search', 'PromoController@search');
Route::post('suppliers/search', 'SupplierController@search');
Route::post('tables/search', 'TableController@search');
Route::post('inventoryreports/inventorylogs/search', 'InventoryLogsController@search');

//View and Fetch Functions in File Maintenance
Route::post('categories/view', 'CategoryController@view');
Route::post('discounts/view', 'DiscountController@view');
Route::post('employees/view', 'EmployeeController@view');
Route::post('items/view', 'ItemController@view');
Route::post('menus/view', 'MenuController@view');
Route::post('promos/view', 'PromoController@view');
Route::post('suppliers/view', 'SupplierController@view');
Route::post('tables/view', 'TableController@view');

//Batch Upload in File Maintenance
Route::post('categories/batch', 'CategoryController@batch');
Route::post('discounts/batch', 'DiscountController@batch');
Route::post('employees/batch', 'EmployeeController@batch');
Route::post('items/batch', 'ItemController@batch');
Route::post('menus/batch', 'MenuController@batch');
Route::post('promos/batch', 'PromoController@batch');
Route::post('suppliers/batch', 'SupplierController@batch');
Route::post('tables/batch', 'TableController@batch');

//Excel Batch Download
Route::get('categories/download{type}', array('as'=>'categories-file','uses'=>'CategoryController@downloadExcel'));
Route::get('discounts/download{type}', array('as'=>'discounts-file','uses'=>'DiscountController@downloadExcel'));
Route::get('employees/download{type}', array('as'=>'employees-file','uses'=>'EmployeeController@downloadExcel'));
Route::get('menus/download/{type}', array('as'=>'menus-file','uses'=>'MenuController@downloadExcel'));
Route::get('items/download/{type}', array('as'=>'items-file','uses'=>'ItemController@downloadExcel'));
Route::get('promos/download/{type}', array('as'=>'promos-file','uses'=>'PromoController@downloadExcel'));
Route::get('suppliers/download/{type}', array('as'=>'suppliers-file','uses'=>'SupplierController@downloadExcel'));
Route::get('tables/download/{type}', array('as'=>'tables-file','uses'=>'TableController@downloadExcel'));

//Excel File Format Download
Route::post('categories/excel', 'CategoryController@excel');
Route::post('discounts/excel', 'DiscountController@excel');
Route::post('items/excel', 'ItemController@excel');
Route::post('menus/excel', 'MenuController@excel');
Route::post('promos/excel', 'PromoController@excel');
Route::post('suppliers/excel', 'SupplierController@excel');
Route::post('tables/excel', 'TableController@excel');

//Fastfood System
Route::post('fastfood/total', 'FastFoodController@total');
Route::post('fastfood/add', 'FastFoodController@addToTray');
Route::post('fastfood/clear', 'FastFoodController@clearTray');
Route::post('fastfood/update', 'FastFoodController@updateTray');
Route::post('fastfood/delete', 'FastFoodController@deleteFromTray');
Route::post('fastfood/search', 'FastFoodController@search');
Route::post('fastfood/promo', 'FastFoodController@promo');
Route::post('fastfood/monitor/gettray', 'FastFoodController@getTray');
Route::get('/fastfood/monitor', function()
{
	if(App\SystemSetting::all()->first()->system_mode == 'Fastfood') {
		return view('fastfood.monitor');		
	} else {
        return redirect()->back(); 	
	}
});


//Attendance Monitoring
Route::get('attendance', 'AttendanceController@index');
Route::post('attendance/call','AttendanceController@call');

//Ads
Route::post('ads/add', 'AdController@addAd');
Route::post('ads/delete', 'AdController@deleteAd');

//Restaurant System
Route::post('restaurant/set', 'RestaurantController@setTable');
Route::post('restaurant/remove', 'RestaurantController@cancelTable');
Route::post('restaurant/order', 'RestaurantController@setTray');
Route::post('restaurant/total', 'RestaurantController@total');
Route::post('restaurant/add', 'RestaurantController@addToTray');
Route::post('restaurant/update', 'RestaurantController@updateTray');
Route::post('restaurant/delete', 'RestaurantController@deleteFromTray');
Route::post('restaurant/search', 'RestaurantController@search');
Route::post('restaurant/confirm', 'RestaurantController@confirmPassword');
Route::post('restaurant/serve', 'RestaurantController@serve');
Route::post('restaurant/promo', 'RestaurantController@promo');

//Kitchen System
Route::get('/kitchen', 'KitchenController@index');
Route::post('/kitchen/load', 'KitchenController@load');
Route::post('/kitchen/set', 'KitchenController@set');
Route::post('/kitchen/cancel', 'KitchenController@cancel');
Route::post('/kitchen/serve', 'KitchenController@serve');
Route::post('/kitchen/getmode', 'KitchenController@getMode');

//Database System
Route::post('/database/backupDatabase', 'DatabaseController@backupDatabase');
Route::post('/database/restoreDatabase', 'DatabaseController@restoreDatabase');
=======

//Search Functions in File Maintenance
Route::post('items/search', 'ItemController@search');

//Fetch Functions in File Maintenance
Route::post('items/view', 'ItemController@view');


>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
