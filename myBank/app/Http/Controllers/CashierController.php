<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cashier;
use App\Models\Account;
use App\Models\Statement;


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

    public function cashierTransaction(Request $request){
        $account = Account::where('accountNumber', $request->accountNumber)->first();

        if($account){
            return view('cashier.transaction')->with('account', $account);
        }
        else return back()->with('statusTr', "Ce numéro de compte n'existe pas");
    }

    public function withdraw(Request $request, $id){
        $account = Account::where('id', $id)->first();
        $account->balance -= $request->input('amount');
        
        $statement = new Statement();
        $statement->name = $account->name;
        $statement->source = 'withdraw';
        $statement->destination = $account->accountNumber;
        $statement->amount = $request->input('amount');
        $statement->status = 3;
        $statement->save();
        $account->update();

        return redirect('/cashier/home')->with('status1', 'withdraw made with success');
    }

    public function deposit(Request $request, $id){
        $account = Account::where('id', $id)->first();
        $account->balance += $request->input('amount');
        $statement = new Statement();
        $statement->name = $account->name;
        $statement->source = 'deposit';
        $statement->destination = $account->accountNumber;
        $statement->amount = $request->input('amount');
        $statement->status = 0;
        $statement->save();
        $account->update();

        return redirect('/cashier/home')->with('status1',  'deposit made with success');
    }
}
