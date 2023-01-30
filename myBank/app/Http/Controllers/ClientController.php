<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Notice;
use App\Models\Message;
use App\Models\Account;

class ClientController extends Controller
{
    public function home(){
        if(Session::has('client')){
            return view('client.home');
        }
        else return redirect('/');
        
    }

    public function account(){
        $account = Account::where('accountNumber', Session::get('client')->accountNumber)->first();
        return view('client.account')->with('account', $account);
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

    public function transferFunds(Request $request){
        $account = Account::where('accountNumber', $request->input('accountNumber'))->first();
        if($account){
            if($account->accountNumber != Session::get('client')->accountNumber){
                return view('client.transferFundsDetails')->with('account', $account);
            }
            else return back()->with('status', 'Transaction impossible !  Les comptes débiteur et créditeur sont identiques !');
        }
        else {
            return back()->with('status', "Le compte créditeur n'existe pas");
        }
    }

    public function clientTransfer(Request $request){
        $fromAccount = Account::where('accountNumber', Session::get('client')->accountNumber)->first();
        $toAccount = Account::where('accountNumber', $request->input('accountNumber'))->first();
        $fromAccount->balance -= $request->input('amount');
        $fromAccount->update();
        $toAccount->balance += $request->input('amount');
        $toAccount->update();
        return redirect('/client/home')->with('status', "votre transfert a bien été effectué");
    }
}
