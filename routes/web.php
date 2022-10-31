<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VATController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\LayoutsController;
use App\Http\Controllers\CustomerController;

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
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('HOME')->middleware('auth');
    Route::get('/', 'redirect');
});


Auth::routes();

Route::controller(VendorController::class)->group(function () {
   
    //Shop front of the Vendor for customers
    Route::get('/events/{event}/vendors/{vendor}/shop','shop')->name('SHOP_VENDOR');
    //List Vendors
    Route::get('/vendors','list')->name('LIST_VENDORS')->middleware('can:list-vendors');
    //Create Vendor
    Route::get('/vendors/new','create')->name('CREATE_VENDOR')->middleware('can:create-vendor');
    //Add Vendor
    Route::post('/vendors', 'store')->name('STORE_VENDOR')->middleware('can:create-vendor');
    //Show Vendor
    Route::get('/vendors/{vendor}','show')->name('SHOW_VENDOR');
    //Edit Vendor
    Route::get('/vendors/{vendor}/edit','edit')->name('EDIT_VENDOR')->middleware('can:edit-vendor');
    //update Vendor
    Route::put('/vendors/{vendor}','update')->name('UPDATE_VENDOR')->middleware('can:edit-vendor');
    //update Vendor
    Route::get('/vendors/{vendor}/delete','destroy')->name('DESTROY_VENDOR')->middleware('can:delete-vendor');

 
});

Route::controller(LayoutsController::class)->group(function () {
    //Add Layout
    Route::post('/layouts','store')->name('STORE_LAYOUT')->middleware('can:create-layout');
    //List Layouts
    Route::get('/layouts','list')->name('LIST_LAYOUTS')->middleware('can:list-layouts');
    //Show Layout Create Form
    Route::get('/layouts/new','create')->name('CREATE_LAYOUT')->middleware('can:create-layout');
    //Edit Layout
    Route::get('/layouts/{layout}/edit','edit')->name('EDIT_LAYOUT')->middleware('can:edit-layout');
    //Update Layout
    Route::put('/layouts/{layout}','update')->name('UPDATE_LAYOUT')->middleware('can:edit-layout');
    //Delete Layout
    Route::get('/layouts/{layout}/delete', 'destroy')->name('DESTROY_LAYOUT')->middleware('can:delete-layout');
});

Route::controller(ItemController::class)->group(function () {
    //List Items
    Route::get('/items','list')->name('LIST_ITEMS')->middleware('can:list-items');
    //Create Items
    Route::get('/items/new','create')->name('CREATE_ITEM')->middleware('can:create-item');
    //Add Item
    Route::post('/items','store')->name('STORE_ITEM')->middleware('can:create-item');
    //Edit Items
    Route::get('/items/{item}/edit','edit')->name('EDIT_ITEM')->middleware('can:edit-item');
    //Update Items
    Route::put('/items/{item}','update')->name('UPDATE_ITEM')->middleware('can:edit-items');
    //Delete Items
    Route::get('/items/{item}/delete','destroy')->name('DESTROY_ITEM')->middleware('can:delete-item');
});

Route::controller(CustomerController::class)->group(function () {
    //List Customers
    Route::get('/customers','list')->name('LIST_CUSTOMERS')->middleware('can:list-customers');
    //Create Customer
    Route::get('/customers/new','create')->name('CREATE_CUSTOMER')->middleware('can:create-customer');
    //Add Customers
    Route::post('/customers','store')->name('STORE_CUSTOMER')->middleware('can:create-customer');
    //Edit Customers
    Route::get('/customers/{customer}/edit','edit')->name('EDIT_CUSTOMER')->middleware('can:edit-customer');
    //Update Customers
    Route::put('/customers/{customer}','update')->name('UPDATE_CUSTOMER')->middleware('can:edit-customer');
    //Toggle Customers
    Route::get('/customers/{customer}/toggle','toggle')->name('TOGGLE_CUSTOMER')->middleware('can:toggle-customer');
    //Delete Customers
    Route::get('/customers/{customer}/delete','destroy')->name('DESTROY_CUSTOMER')->middleware('can:delete-customer');

});
Route::controller(UserController::class)->group(function () {
  
    //List Customers
    Route::get('/users','list')->name('LIST_USERS')->middleware('can:list-users');
    //Create Customers
    Route::get('/users/new','create')->name('CREATE_USER')->middleware('can:create-user');
    //Addtional Authentifikatioenen
    Route::get('/users/{user}/setAuth','password')->name('PASSWORD_USER')->middleware('can:create-user');
    //Addtional Authentifikatioenen
    Route::put('/users/{user}/setAuth','setpassword')->name('SET_PASSWORD_USER')->middleware('can:create-user');
    //Add Customers
    Route::post('/users','store')->name('STORE_USER')->middleware('can:create-user');
    //Edit Customers
    Route::get('/users/{user}/edit','edit')->name('EDIT_USER')->middleware('can:edit-user');
    //Update Customers
    Route::put('/users/{user}','update')->name('UPDATE_USER')->middleware('can:create-user');
    //Toggle Customers
    Route::get('/users/{user}/toggle','toggle')->name('TOGGLE_USER')->middleware('can:toggle-user');
    //Delete Customers
    Route::get('/users/{user}/delete','destroy')->name('DESTROY_USER')->middleware('can:delete-user');


});

Route::controller(RoleController::class)->group(function () {
    //Create Role
    Route::get('/roles/new','create')->name('CREATE_ROLE')->middleware('can:create-role');
    //Add Role
    Route::post('/roles','store')->name('STORE_ROLE')->middleware('can:create-role');
    //Edit Role
    Route::get('/roles/{role}/edit','edit')->name('EDIT_ROLE')->middleware('can:edit-role');
    //Update Role
    Route::put('/roles/{role}','update')->name('UPDATE_ROLE')->middleware('can:edit-role');
    //Delete Role
    Route::get('/roles/{role}/delete','destroy')->name('DESTROY_ROLE')->middleware('can:delete-role');


});

Route::controller(LoginController::class)->group(function () {

    // Show Login Form
    Route::get('/login', 'login')->name('login')->middleware('guest');
     //Login user 
     Route::post('/login', 'loginUser')->name('loginUser');
     // Validate User
    Route::post('/login/{user}/authenticate', 'authenticate')->name('authenticate');
    // Log User Out
    Route::post('/logout', 'logout')->middleware('auth')->name('LOGOUT');
});

Route::controller(EventController::class)->group(function () {
    //List Events
    Route::get('/events','list')->name('LIST_EVENTS')->middleware('can:list-events');
    //Create Events
    Route::get('/events/new','create')->name('CREATE_EVENT')->middleware('can:create-event');
    //Add Events
    Route::post('/events','store')->name('STORE_EVENT')->middleware('can:create-event');
    //Show Events
    Route::get('/events/{event}','show')->name('SHOW_EVENT')->middleware('can:show-event');
    //Edit Events
    Route::get('/events/{event}/edit','edit')->name('EDIT_EVENT')->middleware('can:edit-event');
    //Update Events
    Route::put('/events/{event}','update')->name('UPDATE_EVENT')->middleware('can:edit-event');
    //Delete Events
    Route::get('/events/{event}/delete','destroy')->name('DESTROY_EVENT')->middleware('can:delete-event');
    //Toggle Events
    Route::get('/events/{event}/toggle','toggle')->name('TOGGLE_EVENT')->middleware('can:toggle-event');
    //Users Event
    Route::put('/events/{event}/users','users')->name('USERS_EVENT')->middleware('can:users-event');

});

Route::controller(VATController::class)->group(function () {
    //List Items
    Route::get('/vats','list')->name('LIST_VATS')->middleware('can:list-vats');
    //Create Items
    Route::get('/vats/new','create')->name('CREATE_VAT')->middleware('can:create-vat');
    //Add Item
    Route::post('/vats','store')->name('STORE_VAT')->middleware('can:create-vat');
    //Edit Items
    Route::get('/vats/{vat}/edit','edit')->name('EDIT_VAT')->middleware('can:edit-vat');
    //Update Items
    Route::put('/vats/{vat}','update')->name('UPDATE_VAT')->middleware('can:edit-vat');
    //Delete Items
    Route::get('/vats/{vat}/delete','destroy')->name('DESTROY_VAT')->middleware('can:destroy-vat');
});

