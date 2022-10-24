<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VATController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
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
    Route::get('/home', 'home')->name('HOME');
});


Route::controller(VendorController::class)->group(function () {
   
    //List Vendors
    Route::get('/vendors','list')->name('LIST_VENDORS');
    //Create Vendor
    Route::get('/vendors/new','create')->name('CREATE_VENDOR');
    //Add Vendor
    Route::post('/vendors', 'store')->name('STORE_VENDOR');
    //Show Vendor
    Route::get('/vendors/{vendor}','show')->name('SHOW_VENDOR');
    //Edit Vendor
    Route::get('/vendors/{vendor}/edit','edit')->name('EDIT_VENDOR');
    //update Vendor
    Route::put('/vendors/{vendor}','update')->name('UPDATE_VENDOR');
    //update Vendor
    Route::get('/vendors/{vendor}/delete','destroy')->name('DESTROY_VENDOR');

});

Route::controller(LayoutsController::class)->group(function () {
    //Add Layout
    Route::post('/layouts','store')->name('STORE_LAYOUT');
    //List Layouts
    Route::get('/layouts','list')->name('LIST_LAYOUTS');
    //Show Layout Create Form
    Route::get('/layouts/new','create')->name('CREATE_LAYOUT');
    //Edit Layout
    Route::get('/layouts/{layout}/edit','edit')->name('EDIT_LAYOUT');
    //Update Layout
    Route::put('/layouts/{layout}','update')->name('UPDATE_LAYOUT');
    //Delete Layout
    Route::get('/layouts/{layout}/delete', 'destroy')->name('DESTROY_LAYOUT');
});

Route::controller(ItemController::class)->group(function () {
    //List Items
    Route::get('/items','list')->name('LIST_ITEMS');
    //Create Items
    Route::get('/items/new','create')->name('CREATE_ITEM');
    //Add Item
    Route::post('/items','store')->name('STORE_ITEM');
    //Edit Items
    Route::get('/items/{item}/edit','edit')->name('EDIT_ITEM');
    //Update Items
    Route::put('/items/{item}','update')->name('UPDATE_ITEM');
    //Delete Items
    Route::get('/items/{item}/delete','destroy')->name('DESTROY_ITEM');
});

Route::controller(CustomerController::class)->group(function () {
    //List Customers
    Route::get('/customers','list')->name('LIST_CUSTOMERS');
    //Create Customers
    Route::get('/customers/new','create')->name('CREATE_CUSTOMER');
    //Add Customers
    Route::post('/customers','store')->name('STORE_CUSTOMER');
    //Edit Customers
    Route::get('/customers/{customer}/edit','edit')->name('EDIT_CUSTOMER');
    //Update Customers
    Route::put('/customers/{customer}','update')->name('UPDATE_CUSTOMER');
    //Toggle Customers
    Route::get('/customers/{customer}/toggle','toggle')->name('TOGGLE_CUSTOMER');
    //Delete Customers
    Route::get('/customers/{customer}/delete','destroy')->name('DESTROY_CUSTOMER');

});
Route::controller(UserController::class)->group(function () {
    //List Customers
    Route::get('/users','list')->name('LIST_USERS');
    //Create Customers
    Route::get('/users/new','create')->name('CREATE_USER');
    //Add Customers
    Route::post('/users','store')->name('STORE_USER');
    //Edit Customers
    Route::get('/users/{user}/edit','edit')->name('EDIT_USER');
    //Update Customers
    Route::put('/users/{user}','update')->name('UPDATE_USER');
    //Toggle Customers
    Route::get('/users/{user}/toggle','toggle')->name('TOGGLE_USER');
    //Delete Customers
    Route::get('/users/{user}/delete','destroy')->name('DESTROY_USER');

    // Show Login Form
    Route::get('/login', 'login')->name('login')->middleware('guest');
    //Login user 
    Route::post('/users/login', 'loginUser')->name('loginUser');
    //PINLogin
    Route::get('/users/login/pin', 'PINLogin')->name('PINLogin');
    // Validate User
    Route::post('/users/authenticate', 'authenticate')->name('authenticate');
    // Log User Out
    Route::post('/logout', 'logout')->middleware('auth');

});
Route::controller(EventController::class)->group(function () {
    //List Events
    Route::get('/events','list')->name('LIST_EVENTS');
    //Create Events
    Route::get('/events/new','create')->name('CREATE_EVENT');
    //Add Events
    Route::post('/events','store')->name('STORE_EVENT');
    //Show Events
    Route::get('/events/{event}','show')->name('SHOW_EVENT');
    //Edit Events
    Route::get('/events/{event}/edit','edit')->name('EDIT_EVENT');
    //Update Events
    Route::put('/events/{event}','update')->name('UPDATE_EVENT');
    //Delete Events
    Route::get('/events/{event}/delete','destroy')->name('DESTROY_EVENT');
    //Toggle Events
    Route::get('/events/{event}/toggle','toggle')->name('TOGGLE_EVENT');
    //Users Event
    Route::put('/events/{event}/users','users')->name('USERS_EVENT');

});

Route::controller(VATController::class)->group(function () {
    //List Items
    Route::get('/vats','list')->name('LIST_VATS');
    //Create Items
    Route::get('/vats/new','create')->name('CREATE_VAT');
    //Add Item
    Route::post('/vats','store')->name('STORE_VAT');
    //Edit Items
    Route::get('/vats/{vat}/edit','edit')->name('EDIT_VAT');
    //Update Items
    Route::put('/vats/{vat}','update')->name('UPDATE_VAT');
    //Delete Items
    Route::get('/vats/{vat}/delete','destroy')->name('DESTROY_VAT');
});

