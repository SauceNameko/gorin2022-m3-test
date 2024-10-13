<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login()
    {
        return view("login");
    }
    public function check(Request $request)
    {
        $user = $request->only("name", "password");
        if (Auth::attempt($user)) {
            $request->session()->regenerate();
            return redirect(route("dashboard"));
        }
        return back()->with(["message" => "アカウントまたはパスワードが正しくありません"]);
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect(route("login"));
    }
}
