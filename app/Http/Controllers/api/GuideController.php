<?php

namespace App\Http\Controllers\api;

use App\Guide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuideController extends Controller
{
    //
    public function insertIssue(Request $request)
    {
        $validation_rules = [
            'user_id' => 'required',
            'user_type' => 'required',
            'issue_name' => 'required',
            'issue_type' => 'required',
            'issue_description' => 'required',
            'status' => 'required'
        ];
        $request->validate($validation_rules);
        $guide = Guide::create($request->all());
//        dd($request->all());
        if (!empty($guide)) {
            $response = [
                'code' => 200,
                'data' => $guide,
                'msg' => trans('alert.record_found')
            ];
        } else {
            $response = [
                'code' => 500,
                'data' => [],
                'error_msg' => trans('alert.record_not_found'),
            ];
        }
        return response()->json($response);
    }
}
