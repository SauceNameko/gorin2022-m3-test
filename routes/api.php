<?php

use App\Models\Coupon;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("/items", function (Request $request) {
    $items = Item::query();
    $shop_id = $request->shop_id;
    $price = $request->price;
    $title = $request->title;
    if (isset($shop_id)) {
        $items->where("shop_id", $shop_id);
    }
    if (isset($price)) {
        $items->where("price", "<", $price);
    }
    if (isset($title)) {
        $items->where("name", "like",  "%" . $title . "%");
    }
    $items = $items->get();
    if ($items->isEmpty()) {
        return response()->json(["error" => "エラーが発生しました"], 404);
    }
    return response()->json($items);
});
Route::post("/order", function (Request $request) {
    $request->validate([
        "item_id" => "required",
        "address" => "required"
    ]);
    $item_id = $request->item_id;
    $coupon_code = $request->coupon_code;
    $address = $request->address;
    $item_price = Item::find($item_id)->price;
    if (isset($coupon_code)) {
        $coupons = Coupon::query()->where("coupon_code", $request->coupon_code)->first();
        if (empty($coupons)) {
            return response()->json(["error" => "エラー"], 404);
        }
        foreach ($coupons as $coupon) {
            Order::create([
                "item_id" => $item_id,
                "coupon_code" => $coupon_code,
                "address" => $address,
                "price" => $item_price - $coupon->coupon_price
            ]);
        }
    } else {
        Order::create([
            "item_id" => $item_id,
            "address" => $address,
            "price" => $item_price
        ]);
    }
    return response()->json(["message" => "注文情報を登録しました "]);
});
