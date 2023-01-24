<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cashier;

class AdminController extends Controller
{
    public function home(){
        return view('admin.home');
    }

    public function accounts(){
        $cashiers = Cashier::All();
        return view('admin.accounts')->with('cashiers', $cashiers);
    }

    public function addAccount(){
        return view('admin.addAccount');
    }

    public function feedback(){
        return view('admin.feedback');
    }

    public function showAccount(){
        return view('admin.showAccount');
    }
}
