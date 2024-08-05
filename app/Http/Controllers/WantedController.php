<?php

namespace App\Http\Controllers;

use App\User;
use App\User_car;
use Illuminate\Http\Request;
use App\Wanted;
use App\Brand;
use  App\SaveList;
use  App\WantedChat;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class WantedController extends Controller
{
  public function index(Request $request)
  {
      if($request->has('key')){
          return self::filterPagination($request);
      }
      $table = Wanted::with('brandWanted', 'modelWanted', 'varientWanted')->orderBy('created_at', 'desc')->paginate(6);
      $user_s = array();
      if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
      $user_s = SaveList::where("user_id", "=", session('userDetails')->id)->get();
      }
      $user_s_id=array();
      if(!empty($user_s)){
          foreach($user_s as $s){
              $user_s_id[]=$s->car_id;
          }
      }     
      $tab = 'all';
      return view("frontend.wanted",["table"=>$table,"user_s_id"=>$user_s_id,'tab'=>$tab]);

  }
  public function Favorites(){
      $user_s = array();
      if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
          $user_s = SaveList::where("user_id", "=", session('userDetails')->id)->get();
      }
      $user_s_id=array();
      if(!empty($user_s)){
          foreach($user_s as $s){
              $user_s_id[]=$s->car_id;
          }
      }
      $table = Wanted::wherein("id",$user_s_id)->with('brandWanted', 'modelWanted', 'varientWanted')->orderBy('created_at', 'desc')->paginate(6);
      $tab = 'Favorites';
      return view("frontend.wanted",["table"=>$table,"user_s_id"=>$user_s_id,'tab'=>$tab]);
  }
    public  function wantedSearch($col,$fill,Request $request){
        $user_s_id=array();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $user_s = SaveList::where("user_id", "=", session('userDetails')->id)->get();
            foreach($user_s as $s) {
                $user_s_id[] = $s->car_id;
            }
        }
        if($request->has('key')){
            return self::filterPagination($request);
        }
        $result = new Wanted();
        $table = $result::with('brandWanted','modelWanted','varientWanted')->where($col, 'like', '%'.$fill.'%')->orderBy('id', 'desc')->paginate(6);
        $html = View::make('frontend.partials.wanted_tile',compact('table','user_s_id','user_s'))->render();
        if (!empty($table) && count($table) != 0) {
            return response()->json(["status" => 1, "result" => $html,"s_user_id"=>$user_s_id]);
        }
        return response()->json(["status" => 0, "result" => ""]);
    }
    public static function filterPagination($request){
        $user_s_id=array();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $user_s = SaveList::where("user_id", "=", session('userDetails')->id)->get();
            foreach($user_s as $s) {
                $user_s_id[] = $s->car_id;
            }
        }
        $table = Wanted::orderBy('id', 'desc')->paginate(6);
            $html = View::make('frontend.partials.wanted_tile',compact('table','user_s_id'))->render();
        $results = response()->json($html);
 return $results;
    }

    public  function  wantedFilters($querry){
      $user_s_id=array();
      if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $user_s = SaveList::where("user_id", "=", session('userDetails')->id)->get();
            foreach($user_s as $s) {
                $user_s_id[] = $s->car_id;
            }
      }
        $table = new Wanted();
        $result = $table::with('brandWanted','modelWanted','varientWanted')->whereraw($querry)->get();
        if (!empty($result) && count($result) != 0) {
            return response()->json(["status" => 1, "result" => $result,"s_user_id"=>$user_s_id]);
        }
    return response()->json(["status" => 0, "result" => ""]);
    }
public  function  saveList($c_id){

      $save = new SaveList();
      $id =session('userDetails')->id;
      if($car=SaveList::where("user_id","=",$id)->where("car_id","=",$c_id)->first()){
          if($car->delete()){
              return response()->json(["status" => 1, "result" => "Car deleted"]);
          }
      }
   $save->user_id=$id;
   $save->car_id=$c_id;
   if($save->save()){
       return response()->json(["status" => 1, "result" => "okay"]);
   }
    return response()->json(["status" => 0, "result" => ""]);
}

public  function  saveListView(){
    $table = new SaveList();
    if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
        $user_s = SaveList::where("user_id", "=", session('userDetails')->id)->get();
    }
    $user_s_id=array();
    if(empty($user_s)){
        return response()->json(["status" => 0, "result" => ""]);
        }
    foreach($user_s as $s) {
        $user_s_id[] = $s->car_id;
    }
    $result = Wanted::wherein("id",$user_s_id)->with('brandWanted', 'modelWanted', 'varientWanted')->orderBy('created_at', 'desc')->paginate(6);
    if (!empty($result) && count($result) != 0) {
        return response()->json(["status" => 1, "result" => $result]);
    }
    return response()->json(["status" => 0, "result" => ""]);
}

 public  function  wantedChat(Request $request){
      if ($request){
          $seller  =  Wanted::find($request->car_id);
          $chat = new WantedChat;
          $chat->query=$request->query1;
          $chat->proposal=$request->query2;
          $chat->car_id=$request->car_id;
          $chat->to_id=$request->to_id;
          $chat->from_id=session('userDetails')->id;
          $chat->from_mail = $request->from_mail;
          $chat->to_mail = $seller->mail;
          if($chat->save()){
              if($chat->to_mail){
                   Mail::send("frontend.partials.mail-template",["mail"=>$chat],function ($m) use ($chat){
                    $m->to($chat->to_mail)->subject('Buyer Request Or Perposal');
               });
              $chat->mail_status = 1;
              $chat->save();
              }
               
              return response()->json(["status"=>1,"result","okay"]);

          }
          }

   return response()->json(["status"=>0,"result","not okay"]);


 }
public  function  viewChat(){
    $table = WantedChat::with("to_same_user","from_user")->orderBy('created_at', 'desc')->get();
//   $users =  array();
//    foreach ($table as $us){
//            //$id=$us->to_id;
//            if ($us->to_id !== session('userDetails')->id && !in_array("users",$users)){
//                $users[]=$us->to_id;
//
//            }else if($us->from_id !== session('userDetails')->id && !in_array($users,$us->from_id)){
//                $users[]=$us->from_id;
//            }
//
//    }

    return view('frontend.messenger');

}

}
