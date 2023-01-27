<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Notice;

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
        $notices = Notice::where('accountNumber', Session::get('client')->accountNumber)->get();
        return view('client.notice')->with('notices', $notices);
    }

    public function feedback(){
        return view('client.feedback');
    }
}
