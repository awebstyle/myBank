<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cashier;
use App\Models\Account;

class AdminController extends Controller
{
    public function home(){
        $accounts = Account::All();
        return view('admin.home')->with('accounts', $accounts);
    }

    public function accounts(){
        $cashiers = Cashier::get();
        return view('admin.accounts')->with('cashiers', $cashiers);
    }

    public function addAccount(){
        return view('admin.addAccount');
    }

    public function feedback(){
        return view('admin.feedback');
    }

    public function showAccount($id){
        $account = Account::find($id);
        return view('admin.showAccount')->with('account', $account);
    }
}
