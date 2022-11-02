<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, "index"]);
Route::get('/redirects', [HomeController::class, "redirects"]);
Route::get('/users', [AdminController::class, "user"]);

Route::get('/addFood', [AdminController::class, "addFood"]);
Route::get('/deleteFood/{id}', [AdminController::class, "deleteFood"]);
Route::get('/updateFoodView/{id}', [AdminController::class, "updateFoodView"]);
Route::post('/update/{id}', [AdminController::class, "update"]);
Route::post('/uploadFood', [AdminController::class, "uploadFood"]);

Route::post('/reservation', [AdminController::class, "reservation"]);
Route::get('/viewReservation', [AdminController::class, "viewReservation"]);

Route::get('/viewChef', [AdminController::class, "viewChef"]);
Route::post('/addChef', [AdminController::class, "addChef"]);
Route::get('/updateChef/{id}', [AdminController::class, "updateChef"]);
Route::post('/updateAdminChef/{id}', [AdminController::class, "updateAdminChef"]);
Route::get('/deleteChef/{id}', [AdminController::class, "deleteChef"]);

Route::get('/showCart/{id}', [HomeController::class, "showCart"]);
Route::get('/remove/{id}', [HomeController::class, "remove"]);
Route::post('/addChart/{id}', [AdminController::class, "addChart"]);
Route::post('/orderconfirm', [HomeController::class, "orderconfirm"]);

Route::get('/deleteuser/{id}', [AdminController::class, "deleteuser"]);

Route::get('/orders', [AdminController::class, "orders"]);
Route::get('/search', [AdminController::class, "search"]);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
