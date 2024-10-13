<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $coupons = Coupon::get();
        return view("coupon_index", compact("coupons"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("coupon_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                "coupon_code" => "required",
                "coupon_price" => "required|numeric"
            ],
            [
                "coupon_code.required" => "エラーが発生しました",
                "coupon_price.required" => "エラーが発生しました",
                "coupon_price.numeric" => "エラーが発生しました",
            ]
        );
        Coupon::create([
            "shop_id" => Auth::id(),
            "coupon_code" => $request->coupon_code,
            "coupon_price" => $request->coupon_price
        ]);
        return redirect(route("coupon_create"))->with(["message" => "クーポン情報が登録されました"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $coupon = Coupon::find($id);
        $coupon->delete();
        return redirect(route("coupon_index"));
    }
}
