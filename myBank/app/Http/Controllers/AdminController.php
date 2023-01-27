<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Cashier;
use App\Models\Account;
use App\Models\Notice;
use App\Models\Message;

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
        $messages = Message::get();
        return view('admin.feedback')->with('messages', $messages);
    }

    public function showAccount($id){
        $account = Account::find($id);
        return view('admin.showAccount')->with('account', $account);
    }

    public function deleteAccount($id){
        $account = Account::find($id);
        Storage::delete('public/account_images/'.$account->photo);
        $account->delete();

        return back()->with('status', 'The account has been deleted with success');
    }

    public function adminNotice($id){
        $account = Account::find($id);
        return view('admin.notice')->with('account', $account);
    }

    public function sendNotice(Request $request){
        $notice = new Notice();
        $notice->message = $request->notice;
        $notice->accountNumber = $request->input('accountNumber');

        $notice->save();
        return back()->with('status', 'Notification sent with success');
    }
}
