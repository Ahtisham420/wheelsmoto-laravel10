<?php

namespace App\Http\Controllers\api;

use App\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountController extends Controller
{
    //
    public function validateCoupons(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);
        $discount = Discount::where("title", "=", $request->code)->first();
//        dd($discount);
        if (!empty($discount)) {
            $response = [
                'code' => 200,
                'data' => $discount,
                'msg' => trans('alert.record_found')
            ];
        } else {
            $response = [
                'code' => 500,
                'data' => [],
                'msg' => trans('alert.record_not_found'),
                'error_msg' => trans('alert.record_not_found'),
            ];
        }
        return response()->json($response);
    }
}
