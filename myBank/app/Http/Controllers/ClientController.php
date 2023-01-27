<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function home(){
        if(Session::has('client')){
            return view('client.home');
        }
        else return redirect('/');
        
    }

    public function account(){
        return view('client.account');
    }

    public function statements(){
        return view('client.statements');
    }

    public function transfer(){
        return view('client.transfer');
    }

    public function notice(){
        return view('client.notice');
    }

    public function feedback(){
        return view('client.feedback');
    }
}
