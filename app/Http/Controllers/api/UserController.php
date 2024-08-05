<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function enable(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user' => 'required',
            'enabled' => 'required',
        ]);

        $id = $request->user;
        $enabled = $request->enabled;

        if ($validator->fails()) {
            $response = [
                'code' => 400,
                'data' => [],
                'error_msg' => 'Something went wrong. Please reload page and try again!'
            ];
            return response()->json($response);
        }
        $result = User::where('id', $id)->update(['enabled' => $enabled]);
        if($result){
            $response = [
                'code' => 200,
                'data' => ['enabled'=>$enabled],
                'error_msg' => ''
            ];
        }else{
            $response = [
                'code' => 500,
                'data' => [],
                'error_msg' => 'Something went wrong. Please reload page and try again!'
            ];
        }
        return response()->json($response);
    }
}
