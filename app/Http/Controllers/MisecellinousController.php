<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Misecellinous;
use App\SaveList;
use App\LikeCar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
class MisecellinousController extends Controller
{
public  function  filterMisc($query,$search=null){
       $user_s = array();

        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){

            $user_s = LikeCar::where("user_id", "=", session('userDetails')->id)->where('type','=','auto-part')->get();
             
        }
        $user_s_id=array();
         if(!empty($user_s)){
            foreach($user_s as $s){
                $user_s_id[]=$s->car_id;
            }
        }
    if ($search == null){
        $misc = Misecellinous::with("brand_misc","model_misc")->whereraw($query)->get();
    }else{
        $misc = Misecellinous::with("brand_misc","model_misc")->whereraw($query)->where("car_part","like","%".$search."%")->get();
    }
 $html = View::make('frontend.partials.auto-part-tile',compact('misc','user_s_id','user_s'))->render();
    if (!empty($misc) && count($misc) > 0) {
        return response()->json(["status" => 1, "result" => $html,"s_user_id"=>$user_s_id]);
    }
    return response()->json(["status" => 0, "result" => ""]);
}


     public  function  SearchMisc($val){
                  $user_s = array();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $user_s = LikeCar::where("user_id", "=", session('userDetails')->id)->where('type','auto-parts')->get();
        }
        $user_s_id=array();
        if(!empty($user_s)){
            foreach($user_s as $s){
                $user_s_id[]=$s->car_id;
            }
        }
         // if($request->has('key')){
         //     return self::filterPagination($request);
         // }
         $table = new Misecellinous();
         $misc = $table::where("car_part",'like', '%'.$val.'%')->paginate(6);
         $html = View::make('frontend.partials.auto-part-tile',compact('misc','user_s_id','user_s'))->render();
         if (!empty($misc) && count($misc) != 0) {
             return response()->json(["status" => 1, "result" => $html,"s_user_id"=>$user_s_id]);
         }
         return response()->json(["status" => 0, "result" => ""]);
                }

                public function SearchPriceMisc($val1,$val2,$search=null)
                {
                             $user_s = array();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $user_s = LikeCar::where("user_id", "=", session('userDetails')->id)->where('type','auto-part')->get();
        }
        $user_s_id=array();
        if(!empty($user_s)){
            foreach($user_s as $s){
                $user_s_id[]=$s->car_id;
            }
        }
                    if ($search == null){
                        $misc = Misecellinous::with("brand_misc","model_misc")->whereBetween("price", [$val1,$val2])->get();
                    }else{
                        $misc = Misecellinous::with("brand_misc","model_misc")->whereBetween("price", [$val1,$val2])->where("car_part",'like', '%'.$search.'%')->get();
                    } 

                    $html = View::make('frontend.partials.auto-part-tile',compact('misc','user_s_id','user_s'))->render();
                   if (!empty($misc) && count($misc) > 0) {
                   
                    return response()->json(["status" => 1, "result" => $html,"s_user_id"=>$user_s_id]);
                                    
                                      }
                  
                    return response()->json(["status" => 0, "result" => ""]);

                


                }

}
