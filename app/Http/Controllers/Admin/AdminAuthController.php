<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Admin\LoginRequest;

class AdminAuthController extends Controller
{
    public function loginPage()
    {
        return view('Admin.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect(route('admin.index'));
        }
        Alert::error('Error', 'User Not found');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect(route('admin.loginPage'));
    }
}
