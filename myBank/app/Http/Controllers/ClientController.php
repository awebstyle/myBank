<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Notice;
use App\Models\Message;

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

    public function sendMessage(Request $request){
        $message = new Message();
        $message->name = Session::get('client')->name;
        $message->accountNumber = Session::get('client')->accountNumber;
        $message->phone = Session::get('client')->phone;
        $message->message = $request->input('message');

        $message->save();
        return back()->with('status', 'your message has been sent with success');
    }
}
