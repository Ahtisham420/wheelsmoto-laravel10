<?php

namespace App\Http\Controllers\api;

use App\Chat;
use App\Classes\PushNotifications;
use App\LikeCar;
use App\User_car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function featureListing(Request $request)
    {
        $slider = User_car::orderBy('created_at', 'desc')->paginate(8);
        $user_s = array();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $user_s = LikeCar::where("user_id", "=", session('userDetails')->id)->get();
        }
        $user_s_id=array();
        if(!empty($user_s)){
            foreach($user_s as $s){
                $user_s_id[]=$s->car_id;
            }
        }
        if ($slider) {
            $html = view('frontend.partials.featureList', compact('slider','user_s_id'))->render();
            $response = [
                'code' => 200,
                'data' => $html,
                'error_msg' => trans('alert.no_error')
            ];
        }
        return response()->json($response);
    }

    public function nearByListing(Request $request)
    {
        $sliderOld = User_car::orderBy('created_at', 'desc')->paginate(8);
        $slider = User_car::whereNotIn('id',$sliderOld->pluck('id'))->paginate(8);
        $user_s = array();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $user_s = LikeCar::where("user_id", "=", session('userDetails')->id)->get();
        }
        $user_s_id=array();
        if(!empty($user_s)){
            foreach($user_s as $s){
                $user_s_id[]=$s->car_id;
            }
        }
        if ($slider) {
            $html = view('frontend.partials.nearByList', compact('slider','user_s_id'))->render();
            $response = [
                'code' => 200,
                'data' => $html,
                'error_msg' => trans('alert.no_error')
            ];
        }
        return response()->json($response);
    }

}
