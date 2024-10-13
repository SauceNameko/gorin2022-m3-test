<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $items = Item::get();
        return view("dashboard", compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("item_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                "name" => "required",
                "price" => "required"
            ],
            [
                "name.required" => "エラーが発生しました",
                "price.required" => "エラーが発生しました",
            ]
        );
        Item::create([
            "shop_id" => Auth::id(),
            "name" => $request->name,
            "price" => $request->price
        ]);
        return redirect(route("item_create"))->with(["message" => "商品情報が登録されました"]);
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
        $item = Item::find($id);
        return view("item_edit", compact("item"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                "name" => "required",
                "price" => "required"
            ],
            [
                "name.required" => "エラーが発生しました",
                "price.required" => "エラーが発生しました",
            ]
        );
        $item = Item::find($id);
        $item->update([
            "shop_id" => Auth::id(),
            "name" => $request->name,
            "price" => $request->price
        ]);
        return redirect(route("item_edit", $item->id))->with(["message" => "商品情報が登録されました"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $item = Item::find($id);
        $item->delete();
        return redirect(route("dashboard"));
    }
}
