<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home(){
        return view('admin.home');
    }

    public function accounts(){
        return view('admin.accounts');
    }

    public function addAccount(){
        return view('admin.addAccount');
    }

    public function feedback(){
        return view('admin.feedback');
    }
}
