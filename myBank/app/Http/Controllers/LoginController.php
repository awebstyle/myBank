<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(){
        return view('login/login');
    }

    public function clientLogin(Request $request){
    
        $account = Account::where('email', $request->email)->first();

        if($account){
            if($account->password == $request->password){
                Session::put('client', $account);
                return redirect("client/home");
            }
            else{
                return back()->with('status', 'wrong email or password');
            }
        }
        else{
            return back()->with('status', 'wrong email or password');
        }
    }
}
