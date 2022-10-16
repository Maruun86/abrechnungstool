<?php

use App\Http\Controllers\Controller;
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

Route::get('/', [VendorController::class, 'index']);

//List Vendors
Route::get('/vendors', [VendorController::class, 'list'])->name('LIST_VENDORS');

//Create Vendor
Route::get('/vendors/new', [VendorController::class, 'create'])->name('CREATE_VENDOR');
//Add Vendor
Route::post('/vendors', [VendorController::class, 'add'])->name('ADD_VENDOR');
//Show Vendor
Route::get('/vendors/{vendor}', [VendorController::class, 'show'])->name('SHOW_VENDOR');
//Edit Vendor


//Add Layout
Route::post('/layouts', [LayoutsController::class, 'add'])->name('ADD_LAYOUT');
//List Layouts
Route::get('/layouts', [LayoutsController::class, 'show'])->name('LIST_LAYOUTS');
//Show Layout Create Form
Route::get('/layouts/new', [LayoutsController::class, 'create'])->name('CREATE_LAYOUT');

//Add Layout
Route::post('/items', [ItemController::class, 'add'])->name('ADD_ITEM');
//List Items
Route::get('/items', [ItemController::class, 'list'])->name('LIST_ITEMS');
//Create Items
Route::get('/items/new', [ItemController::class, 'create'])->name('CREATE_ITEM');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
