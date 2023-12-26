<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login');
    }

    public function login (Request $request){


            $credentials = $request->validate([
                'username' => ['required'],
                'password' => ['required'],
            ]);
        
            if (auth()->attempt($credentials)) {
                $user = DB::table('users')->where('id', auth::user()->id)->first();
                return view('layout_dashboard', compact('user'));
            }else{
                return back()->withErrors(['error_message' => 'Error pak boss'])->withInput();
            }
        
        
    }
}
