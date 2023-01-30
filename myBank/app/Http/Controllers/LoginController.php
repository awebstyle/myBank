<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Cashier;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        if(Session::has('client')){
            return redirect('/client/home');
        }
        elseif(Session::has('cashier')){
            return redirect('/cashier/home');
        }
        elseif(Session::has('admin')){
            return redirect('/admin/home');
        }
        else return view('login/login');
    }

    public function signin(Request $request){
    
        $account = Account::where('email', $request->email)->first();
        
        $cashier = Cashier::where('email', $request->email)->first();
        

        if($account){
            if(Hash::check($request->input('password'), $account->password)){
                Session::put('client', $account);
                return redirect("client/home");
            }
            else{
                return back()->with('status', 'wrong email or password');
            }
        }
        elseif($cashier){
            if(Hash::check($request->input('password'), $cashier->password)){
                Session::put('cashier', $cashier);
                return redirect("cashier/home");
            }
            else{
                return back()->with('status', 'wrong email or password');
            }
        }
        else{
            return back()->with('status', 'wrong email or password');
        } 
    }

    public function signinAsManager(Request $request){
    
        $admin = Account::where('email', $request->email)->first();
       

        if($admin){
            if(Hash::check($request->input('password'), $admin->password)){
                Session::put('admin', $admin);
                return redirect("admin/home");
            }
            else{
                return back()->with('status', 'wrong email or password');
            }
        }
        else{
            return back()->with('status', 'wrong email or password');
        }
    }




    public function signout(){
        if(Session::has('client')){
            Session::forget('client');
        }
        elseif(Session::has('cashier')){
            Session::forget('cashier');
        }
        elseif(Session::has('admin')){
            Session::forget('admin');
        }
        
        return redirect('/');
    }
}
