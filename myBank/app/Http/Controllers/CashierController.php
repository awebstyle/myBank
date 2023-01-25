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

    public function updateCashier(Request $request, $id){
        $cashier = Cashier::find($id);
        $cashier->email = $request->input('email');
        $cashier->password = $request->input('password');

        $cashier->update();
        return back()->with('status', 'The cashier account has been updated with success');
    }

    public function deleteCashier($id){
        $cashier = Cashier::find($id);
        $cashier->delete();

        return back()->with('status', 'The cashier account has been deleted with success');
    }
}
