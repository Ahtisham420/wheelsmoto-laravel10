<?php

namespace App\Http\Controllers\api;

use App\Service;
use App\System_prefrence;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class serviceController extends Controller
{
    public function limitations(Request $request)
    {

        {
            $response = [];
            if ($request->isMethod('get')) {
                $response = $this->getLimitations($request);
            } else {
                $response = [
                    'code' => 401,
                    'data' => [],
                    'error_msg' => trans('alert.invalid_request')
                ];
            }
            return response()->json($response);
        }
    }

    public function services(Request $request)
    {
        $response = [];
        if ($request->isMethod('get')) {
            $response = $this->getAllServicesUser($request);
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public function serviceDetailByName(Request $request){
        $response = [];
        if ($request->isMethod('post')) {
            $response = $this->getServicesDetails($request);
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    protected
    function getAllServicesUser($request)
    {
        $services = Service::all();
        return $response = [
            'code' => 200,
            'data' => $services,
            'error_msg' => trans('alert.no_error')
        ];
    }

    protected
    function getServicesDetails($request)
    {
        $services = Service::where('title','=',$request->title)->first();
        return $response = [
            'code' => 200,
            'data' => $services,
            'error_msg' => trans('alert.no_error')
        ];
    }

    protected
    function getLimitations($request)
    {
        $limitations = System_prefrence::first();
        return $response = [
            'code' => 200,
            'data' => $limitations,
            'error_msg' => trans('alert.no_error')
        ];
    }
}
