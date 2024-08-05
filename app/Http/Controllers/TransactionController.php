<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::orderBy('id', 'desc')->paginate(8);
        return view('transactions.index', compact('transactions'));
    }

    public function status(Request $request)
    {
        $response = [];
        $transaction = Transaction::find($request->id);
        $data['status'] = $request->status;
        if ($transaction->update($data)) {
            if ($request->status == 0) {
                // $body = "<p>Your profile is banned by company!.</p>
                //     we are hereby to inform you that the your account is banned by company. Kindly inform this
                //     to our help center if this is mistake by company.</p>
                //     <br><br><p>
                //     Regards Instatask</p>";
                // Mail::to($user->email)->send(new defaultNotify("Profile Banned!", $body));
            }
            $response = ['success_msg' => trans('alert.record_updated')];
        } else {
            $response = ['error_msg' => trans('alert.record_unable_to_save')];
        }
        return redirect(route('transactions'))->withErrors($response);
    }
}
