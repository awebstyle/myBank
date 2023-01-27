<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Account;
use App\Models\Statement;

class AccountController extends Controller
{
    public function addBankAccount(Request $request){
        $this->validate($request, [
            'image' => 'image|max:1999'
        ]);

        $fileNameWithExtension = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'-'.time().'.'.$extension;
        
        $bankAccount = new Account();
        $bankAccount->name = $request->input('name');
        $bankAccount->accountNumber = $request->input('accountNumber');
        $bankAccount->city = $request->input('city');
        $bankAccount->email = $request->input('email');
        $bankAccount->balance = $request->input('balance');
        $bankAccount->phone = $request->input('phone');
        $bankAccount->cmic = $request->input('cnic');
        $bankAccount->accountType = $request->input('accountType');
        $bankAccount->address = $request->input('address');
        $bankAccount->password = bcrypt($request->input('password'));
        $bankAccount->source = $request->input('source');
        $bankAccount->photo = $fileNameToStore;
        $bankAccount->branchName = 'BNP Paribas';
        $bankAccount->branchCode = 11111111345;

        $statement = new Statement();
        $statement->name = $request->input('name');
        $statement->source = $request->input('accountNumber');
        $statement->destination = $request->input('accountNumber');
        $statement->amount = $request->input('balance');
        $statement->status = 0;

        $bankAccount->save();
        $statement->save();

        // upload image
        $path = $request->file('image')->storeAs('public/account_images', $fileNameToStore);
        
        return back()->with('status', 'The customer account has been created with success');
    }
}
