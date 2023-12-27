<?php

namespace App\Http\Controllers;

use App\Models\Inventori;
use App\Models\Purchase;
use App\Models\Sales;
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
                $inventori  = Inventori::all();
                $sales      = Sales::all();
                $purchase   = Purchase::all();
                return view('layout_dashboard', compact('user', 'inventori', 'sales', 'purchase'));
            }else{
                return back()->withErrors(['error_message' => 'Error pak boss'])->withInput();
            }
        
        
    }

    public function dashboard(){
        if(Auth::check() == false){
            return redirect()->back();
        }

        $user = DB::table('users')->where('id', auth::user()->id)->first();
        $inventori  = Inventori::all();
        $sales      = Sales::all();
        $purchase   = Purchase::all();

        return view('layout_dashboard', compact('user', 'inventori', 'sales', 'purchase'));
    }
}
