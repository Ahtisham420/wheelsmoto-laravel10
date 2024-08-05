<?php

namespace App\Http\Controllers;

use App\Classes\PaymentGateway;
use App\Log;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $stripGateway = new PaymentGateway();
        // \Stripe\Stripe::setApiKey($stripGateway->getSecretKey());


        // \Stripe\Payout::create([
        //     "amount" => 1000,
        //     "currency" => 'usd',
        //     "recipient" =>  'self',
        //     "statement_descriptor" => 'JULY SALES',
        // ]);
        // dd('ss');

        // if (!empty($order)) {


        //     dd('sss');
        //     \Stripe\Charge::create([
        //         "amount" => $amount_in_cents,
        //         "currency" => "usd",
        //         "source" => $request->payment_card_token, // obtained with Stripe.js
        //         "description" => "Charge for order id " . $order->id
        //     ]);
        //     return true;
        // }

        //     $user = User::find(129);
        //     //return $user;
        //    // return Permission::with('roles')->get();
        //     $user->hasPermissionThroughRole(Permission::find(3));
        //     return $user;
        //     $new = 'new-permission';
        //     $role = Role::with('permissions')->get();
        //     return $role;
        //     $auth = auth()->user()->hasPermissionTo($new);
        $logs = Log::with('user')->paginate(10);
        //return $logs;
        return view('logs.index', compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
