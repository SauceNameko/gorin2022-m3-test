<?php

use App\Http\Controllers\CouponController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::middleware("guest")->group(function () {
Route::get("/admin", [LoginController::class, "login"])->name("login");
Route::post("/admin", [LoginController::class, "check"])->name("check");
// });
// Route::middleware("auth")->group(function () {
Route::get("/admin/logout", [LoginController::class, "logout"])->name("logout");
Route::get('/admin/dashboard', [ItemController::class, "index"])->name("dashboard");
Route::get('/admin/item/create', [ItemController::class, "create"])->name("item_create");
Route::post('/admin/item/store', [ItemController::class, "store"])->name("item_store");
Route::get('/admin/item/edit/{id}', [ItemController::class, "edit"])->name("item_edit");
Route::post('/admin/item/update/{id}', [ItemController::class, "update"])->name("item_update");
Route::get('/admin/item/destroy/{id}', [ItemController::class, "destroy"])->name("item_destroy");

Route::get('/admin/coupon/index', [CouponController::class, "index"])->name("coupon_index");
Route::get('/admin/coupon/create', [CouponController::class, "create"])->name("coupon_create");
Route::post('/admin/coupon/store', [CouponController::class, "store"])->name("coupon_store");
Route::get('/admin/coupon/edit/{id}', [CouponController::class, "edit"])->name("coupon_edit");
Route::post('/admin/coupon/update/{id}', [CouponController::class, "update"])->name("coupon_update");
Route::get('/admin/coupon/destroy/{id}', [CouponController::class, "destroy"])->name("coupon_destroy");
// });
