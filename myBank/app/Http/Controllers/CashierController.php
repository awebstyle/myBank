<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cashier;


class CashierController extends Controller
{
    public function home(){
        return view ('cashier.home');
    }

    public function addCashier(Request $request){
        $cashier = new Cashier();
        $cashier->email = $request->input('email');
        $cashier->password = bcrypt($request->input('password'));
        $cashier->accounttype = "cashier";

        $cashier->save();
        return back()->with('status', 'The cashier has been created with success');
    }
}
