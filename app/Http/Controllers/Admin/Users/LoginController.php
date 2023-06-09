<?php

namespace App\Http\Controllers\admin\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login',[
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'email' => 'required|email:filter',
            'password' => 'required',
        ]);

        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])){
            return redirect()->route('dashboard');
        }

        return Redirect()->back();
    }
}
