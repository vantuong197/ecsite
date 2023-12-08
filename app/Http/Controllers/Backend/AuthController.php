<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;
class AuthController extends Controller
{
    //
    public function __construct(){

    }

    public function index(){
        return view('backend.auth.login');
    }

    public function login(AuthRequest $request){
        $data = $request->validated();
        $check = Auth::attempt($data);
        if($check){
            return redirect()->route('dashboard.index')->with('success', 'Login successfully!');
        }
        return redirect()->route('auth.admin')->with('error', 'Email or password is invalid!')->withInput();
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
        return redirect()->route('auth.admin');
    }
}
