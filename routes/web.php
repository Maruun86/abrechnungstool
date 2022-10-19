<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\LayoutsController;

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
Route::controller(VendorController::class)->group(function () {
    Route::get('/', 'index');

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
    //Update Items
    Route::put('/customers/{customer}','update')->name('UPDATE_CUSTOMER');
    //Update Items
    Route::get('/customers/{customer}/toggle','toggle')->name('TOGGLE_CUSTOMER');
    //Update Items
    Route::get('/customers/{customer}/destroy','destroy')->name('DESTROY_CUSTOMER');

});

