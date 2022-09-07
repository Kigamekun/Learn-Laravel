<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BaseController extends Controller
{
    public function index(Request $request)
    {
        return view('login');
    }


    public function base(Request $request)
    {
        $var = session('user');
        if (isset($var) && $var == true) {
            return view('index');
        } else {
            return redirect('/');
        }
    }

    public function login(Request $request)
    {
        $user = User::where(['email'=>$request->email,'password'=>md5($request->password)])->first();
        if (!is_null($user)) {
            $request->session()->put('user', true);
            return redirect('/base');
        } else {
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect('/');
    }
}
