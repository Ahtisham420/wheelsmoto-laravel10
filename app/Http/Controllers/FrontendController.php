<?php

namespace App\Http\Controllers;

use App\CarState;
use App\Footer;
use App\GarageAdvert;
use App\User_car;
use App\LikeCar;
Use App\ContactUs;
use App\CarSetting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Package;
use App\UserPackage;
use App\FooterMail;
use App\SwapCar;
use App\Brand;
use App\Comment;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Misecellinous;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
    
        $result = CarSetting::get();
        $User_car = User_car::orderBy('price', 'ASC')->orderBy('year', 'ASC')->get();
        $show_br =  Brand::where('status',Brand::active)->where('image','!=',null)->OrderBy('name')->limit(20)->get();
        $brands= Brand::OrderBy('name')->get();
        session()->forget('product');
        $state_sl = CarState::OrderBy('name','ASC')->get();
        $footer = Footer::OrderBy('id','desc')->first();
        $Car_type = CarSetting::OrderBy("_value")->where("_key","car-type")->limit(24)->get();
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
        $b_top = Brand::OrderBy('name')->first();
        $md_top = CarSetting::where('_key','model')->paginate(24);
        $cr_type = CarSetting::where('_key','car-type')->paginate(24);
        $ct_top = CarSetting::where('_key','city')->paginate(24);
        $slider  = User_car::orderBy('created_at','desc')->paginate(8);
        $nearSlider = User_car::whereNotIn('id',$slider->pluck('id'))->paginate(8);
        return view('frontend.index', ['nearSlider'=>$nearSlider,'cr_type'=>$cr_type,'state_sl'=>$state_sl,'result' => $result,'slider'=>$slider,'brands'=>$brands,'show_br' =>$show_br,'User_car' => $User_car,'car_type'=>$Car_type,'user_s'=>$user_s,'user_s_id'=>$user_s_id,'b_top'=>$b_top,'md_top'=>$md_top,'ct_top'=>$ct_top,'footer'=>$footer]);
    }
    public function sendMail($mail){
    $mailData = [
    'subject' => 'Hello',
    'content' => 'This is a simple email.'
    ];
    Mail::send([], $mailData, function ($message) use ($mailData,$mail) {
    $message->to($mail)
            ->subject($mailData['subject'])
            ->setBody($mailData['content']);
    });
    }
    public function  CarDetail($id){
        //$id =  base64_decode(base64_decode($id));
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
        $car_d = User_car::with('modal','brand_d','stat_l','city_l')->where('slug',$id)->first();
        if(isset($car_d)){
            $rel_ad = User_car::with('modal','brand_d','stat_l','city_l')->where('id','!=',$car_d->id)->paginate(8);
        }else{
            $rel_ad = [];
        }
        return view('frontend.product-detail',compact('car_d','user_s','user_s_id','rel_ad'));
    }
      public function AutoPartDetail($id){
        $id= base64_decode(base64_decode($id));
         $car_d = Misecellinous::with('user')->find($id);
        $rel_ad = Misecellinous::where('id','!=',$car_d->id)->paginate(8);
         if ($car_d){
             return view('frontend.auto-part-detail',compact('car_d','rel_ad'));
         }else{
             return redirect()->back();
         }
    }
    public function GarageDetail($id){
        $id= base64_decode(base64_decode($id));
         $garage_d = GarageAdvert::with('user')->find($id);
         $rel_ad = GarageAdvert::where('id','!=',$garage_d->id)->paginate(8);
         if ($garage_d){
             return view('frontend.product-detail',compact('garage_d','rel_ad'));
         }else{
             return redirect()->back();
         }
    }
       public  function  swapIndex($query){

        $result = User_car::orderBy('created_at', 'DESC')->whereraw($query)->first();
           if (!empty($result)) {
               return response()->json(["status" => 1, "result" => $result]);
           }
           return response()->json(["status" => 0, "result" => ""]);

       }
    public function misecellinous(Request $request)
    {
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
        $misc = Misecellinous::with("brand_misc","model_misc")->orderBy('created_at', 'desc')->paginate(6);
        return view('frontend.misecellinous',["misc"=>$misc,'user_s'=>$user_s,'user_s_id'=>$user_s_id]);
    }
    public function carSellingLease(Request $request)
    {
        return view('frontend.car-selling-lease');
    }
    public function blog(Request $request)
    {
        return view('frontend.blog');
    }
    public function carSellingAuction(Request $request)
    {
        return view('frontend.car-selling-auction');
    }
    public function carSelling(Request $request)
    {
        return view('frontend.car-selling');
    }

    public  function BrandBaseModel($id){
        $result = CarSetting::where('brand','=',$id)->where('_key','model')->get();
        if(!empty($result) && count($result) > 0){
            return response()->json(["status" => 1, "result" => $result]);
        }else{
            return response()->json(["status" => 0, "result" => ""]);
        }

    }
    public  function StateBaseCity($id){
        $result = CarSetting::where('state','=',$id)->where('_key','city')->get();
        if(!empty($result) && count($result) > 0){
            return response()->json(["status" => 1, "result" => $result]);
        }else{
            return response()->json(["status" => 0, "result" => ""]);
        }
    }
//    public function garageServices(Request $request)
//    {
//        return view('frontend.garage-services');
//    }
    public function americanMuscle(Request $request)
    {
        $tab = "American-Muscle";
        $type = new User_car();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $result = $type::where("user_id","!=",session('userDetails')->id)->where("car_availbilty","=",$tab)->get();
        }else{
            $result = $type::Leasecars($tab);
        }
        return view('frontend.american-muscle', ['result' => $result]);
    }
    public function auctionCars(Request $request)
    {
        $tab = "auction";
        $type = new User_car();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $result = $type::where("user_id","!=",session('userDetails')->id)->where("car_availbilty","=",$tab)->get();
        }else{
            $result = $type::Leasecars($tab);
        }
        return view('frontend.auction-cars', ['result' => $result]);
    }


    public  function ModelBaseVariant($id){
        $result = CarSetting::where('model','=',$id)->where('_key','variant')->get();
        if(!empty($result) && count($result) > 0){
            return response()->json(["status" => 1, "result" => $result]);
        }else{
            return response()->json(["status" => 0, "result" => ""]);
        }
    }


    public  function  BrandFilterIndex($brand)
    {
        $type = strtr($brand,'-',' ');

        $type_id  = Brand::where('name',$type)->pluck('id')->first();

        $result =User_car::orderBy('created_at','desc')->where('brand','=',$type_id)->paginate(User_car::pagination);

        $query = '';

        return view('frontend.home-filters', ['result' => $result,'query'=>$query,'br'=>$type_id]);
    }

    public  function  CarTypeFilterIndex($type)
    {

        $type = strtr($type,'-',' ');
        $type_id  = CarSetting::where('_value',$type)->pluck('id')->first();
        $result =User_car::orderBy('created_at','desc')->where('car_type','=',$type_id)->paginate(12);
        $query = '';
        $user_s = array();

        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
        {
            $user_s = LikeCar::where("user_id", "=", session('userDetails')->id)->get();
        }

        $user_s_id=array();

        if(!empty($user_s))
        {
            foreach($user_s as $s)
            {
                $user_s_id[]=$s->car_id;
            }
        }
        return view('frontend.home-filters', ['result' => $result,'query'=>$query,'tr'=>$type_id,'user_s'=>$user_s,'user_s_id'=>$user_s_id]);
    }
    public  function  ContactUs(Request $request){
        $result = new ContactUs();
        $result->name = $request->name;
        $result->email = $request->email;
        $result->message =$request->massage;
        if ($result->save()){
            return redirect()->route('frontend-home');
        }
    }

    public  function CarBudget($bg){
        $result =User_car::orderBy('created_at','desc')->whereBetween('price', [0, $bg.'00000'])->paginate(12);
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
        $query = 'price BETWEEN 0 AND '.$bg.'00000';
        return view('frontend.home-filters', ['result' => $result,'user_s'=>$user_s,'user_s_id'=>$user_s_id,'query'=>$query]);
    }
    public  function CarState($st){
        $st  =base64_decode(base64_decode($st));
        $result =User_car::orderBy('created_at','desc')->where('state',$st)->paginate(6);
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
        $query = 'state = '.$st;
        return view('frontend.home-filters', ['result' => $result,'user_s'=>$user_s,'user_s_id'=>$user_s_id,'query'=>$query]);
    }

    public  function  Brand(){
        $brands =Brand::orderBy('name')->get();
        return view('frontend.brands',compact('brands'));
    }

    public  function  CarType(){
        $type =CarSetting::orderBy('_value')->where('_key','car-type')->get();
        return view('frontend.types',compact('type'));
    }
    public  function LikeCarFrontend ($id,$type){
      $id =  base64_decode($id);
      if ($type) {
          $fnd_c = LikeCar::where('user_id',session('userDetails')->id)->where('car_id',$id)->where('type',$type)->first();
      }else{
         $fnd_c = LikeCar::where('user_id',session('userDetails')->id)->where('car_id',$id)->first();
      }
      if ($fnd_c){
          if ($fnd_c->delete()){
              return response()->json(["status" => 2, "result" => 'car deleted']);
          }
      }
      $lk = new LikeCar();
      $lk->user_id = session('userDetails')->id;
      $lk->car_id = $id;
      $lk->type = $type;
      if ($lk->save()){
         return response()->json(["status" => 1, "result" => 'Car Inserted']);
      }
        return response()->json(["status" => 0, "result" => 'Something was wrong.']);
    }
    public function searchLeaseCars(Request $request)
    {
        $tab = "Lease";
        $type = new User_car();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $result = $type::where("user_id","!=",session('userDetails')->id)->where("car_availbilty","=",$tab)->get();
            }else{
            $result = $type::Leasecars($tab);
        }
        return view('frontend.search-lease-cars', ['result' => $result]);
    }
    public function rentalCars(Request $request)
    {
        $tab = "Rent";
        $type = new User_car();

        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $result = $type::where("user_id","!=",session('userDetails')->id)->where("car_availbilty","=",$tab)->get();
        }else{
            $result = $type::Leasecars($tab);
        }
        return view('frontend.rental-cars', ['result' => $result]);
    }
    public function classifiedCars(Request $request)
    {
        // $User_car = User_car::orderBy('price', 'ASC')->orderBy('year', 'ASC')->get();
        $tab = 'Sell';
        $type = new User_car();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $result = $type::where("user_id","!=",session('userDetails')->id)->where("car_availbilty","=",$tab)->get();
        }else{
            $result = $type::Leasecars($tab);
        }
        return view('frontend.classified-cars', ['result' => $result]);
    }
    public  function filterdData($search)
    {

        $type = new User_car();
        $result = $type::where("post_code", "=", $search)->get();
        //dd($result);
        return view('frontend.demo', ['result' => $result]);
    }

    public function priceFilterData($query)
    {

        $type = new User_car();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $user_car = SwapCar::where("user_id", "=", session('userDetails')->id)->get();
            $result = $type::whereraw($query)->where("user_id","!=",session('userDetails')->id)->get();
        }else{
            $result = $type::whereraw($query)->get();
        }
        $user_car_id=array();
        if(!empty($user_car)){
            foreach($user_car as $s){
                $user_car_id[]=$s->swap_list_id;

            }

        }
        if (!empty($result) && count($result) != 0) {
            return response()->json(["status" => 1, "result" => $result,"user_car_id"=>$user_car_id]);
        }
        return response()->json(["status" => 0, "result" => ""]);
    }


    public  function postalData($fill,$col,$type){
        $table = new User_car();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $user_car = SwapCar::where("user_id", "=", session('userDetails')->id)->get();
            $result = $table::where($col,'=',$fill)->where('car_availbilty','=',$type)->where("user_id","!=",session('userDetails')->id)->get();
        }else{
            $result = $table::where($col,'=',$fill)->where('car_availbilty','=',$type)->get();
        }
        $user_car_id=array();
        if(!empty($user_car)){
            foreach($user_car as $s){
                $user_car_id[]=$s->swap_list_id;

            }

        }
        if (!empty($result) && count($result) != 0) {
            return response()->json(["status" => 1, "result" => $result,"user_car_id"=>$user_car_id]);
        }
        return response()->json(["status" => 0, "result" => ""]);
    }
    public  function  dahsboardFilter($val,$con,request $request){
      //  $id = session('userDetails')->id;

        if ($val==="all"){
            $type = new User_car();
            $result = $type::where("user_id",'=',session('userDetails')->id)->where('car_condition','=',$con)->get();

        }else{
            $type = new User_car();
            $result = $type::where("user_id",'=',session('userDetails')->id)->where("car_availbilty", "=", $val)->where('car_condition','=',$con)->get();
        }
        if(!empty($result) && count($result) != 0){
            return response()->json(["status" => 1, "result" => $result]);
        }else{
            return response()->json(["status" => 0, "result" => ""]);
        }

    }
    public function swapCars($s_id,Request $request)
    {

        $id = base64_decode($s_id);
        if (session("userLoggedIn") == true){

            $result_con =User_car::where('id','=',$id)->where('user_id','=',session('userDetails')->id)->first();
            $list_car_con =SwapCar::where('swap_list_id','=',$id)->where('user_id','=',session('userDetails')->id)->where('status','=',1)->first();
            $american = User_car::with("model","cartype")->orderBy('created_at', 'desc')->where('car_availbilty','=','American-Muscle')->first();
            $classified = User_car::orderBy('created_at', 'desc')->where('car_availbilty','=','Sell')->first();
            if ($result_con == null && $list_car_con  == null){
                $own = SwapCar::where('user_id','=',session('userDetails')->id)->where('status','=',1)->get();
                $swap_own_car  = array();
                if(!empty($own)){
                    foreach($own as $s){
                        $swap_own_car[]=$s->swap_car_id;
                        }
                        }
                $result = User_car::with("model","cartype","carmake","enginetype")->find($id);
                $swap_cars  = User_car::where('user_id','=',session('userDetails')->id)->where('car_availbilty','=','Swap')->paginate(9);
                 return view('frontend.swap-cars',['result'=>$result,'swap_car'=>$swap_cars,'classified'=>$classified,'american_mas'=>$american,'selected_own_car'=>$swap_own_car]);

            }else{
                $user_car = SwapCar::where("user_id", "=", session('userDetails')->id)->where('status','=',1)->get();
                $user_car_id=array();
                if(!empty($user_car)){
                    foreach($user_car as $s){
                        $user_car_id[]=$s->swap_list_id;
                    }
                }
                $swap_cars  = User_car::where('user_id','!=',session('userDetails')->id)->where('car_availbilty','=','Swap')->paginate(9);
                return view('frontend.swap-list',["result"=>$swap_cars,"selected"=>$user_car_id]);
            }


        }else{
           return redirect()->route("swap-login",["sw"=>"swap","s_id"=>base64_encode($id)]);
        }

    }
    public  function  SwapPricing($p_id){
        $result = User_car::with("model","cartype","carmake","enginetype")->find($p_id);
        if(!empty($result)){
            return response()->json(["status" => 1, "result" => $result]);
        }else{
            return response()->json(["status" => 0, "result" => ""]);
        }
    }

    public function swapList(Request $request)
    {
        $tab = "Swap";
        $type = new User_car();
        $result = $type::where('car_availbilty','=','Swap');
        if(session("userLoggedIn") == true){
            $result=$result->where("user_id","!=",session('userDetails')->id);
        }
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $user_car = SwapCar::where("user_id", "=", session('userDetails')->id)->where('status','=',1)->get();
        }
        $user_car_id=array();
        if(!empty($user_car)){
            foreach($user_car as $s){
                $user_car_id[]=$s->swap_list_id;
            }
        }
        $result=$result->paginate(9);
        return view('frontend.swap-list',["result"=>$result,"selected"=>$user_car_id]);
    }

    public function events()
    {
       $user_package = UserPackage::where('package_id', '=', 2)->first();

        $package = $user_package->package;
      //  dd($package);
        return view('frontend.events', compact('package'));
    }
    public  function  newUsed($con,Request $request){
      $table = new  User_car;
        $user_car = $table::where('user_id','=',session('userDetails')->id)->where('car_condition','=',$con)->paginate(User_car::pagination);
        if(!empty($user_car) && count($user_car) > 0){

            $html = \Illuminate\Support\Facades\View::make('frontend.partials.dashboard-tile',compact('user_car'))->render();

            return response()->json(["status"=>1,"result"=>$html]);
        }else{
            return response()->json(["status"=>0,"result"=>""]);

        }

    }




    public  function  loadComment(Request $request)
    {
        // dd($request->all());
        if($request->id > 0)
        {
            $data = Comment::with('user')->
            where('id', '<', $request->id)->where('post_id','=',$request->post_id)
                ->orderBy('id', 'DESC')
                ->limit(5)
                ->get();
        }
        else
        {
            $data = Comment::with('user')->
            orderBy('id', 'DESC')->where('post_id','=',$request->post_id)
                ->limit(5)
                ->get();
        }
        $output = '';
        $last_id = '';

        if(!$data->isEmpty())
        {
            // dd($data);
            foreach($data as $com)
            {
                $output .= '
           <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12 comment1section">


                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4 col-sm-3 col-lg-1 clientimages"><img src="'.$com->user['avatar'].'" alt=""></div>
                            <div class="col-6 clientName p-0">
                                <h6>'.$com->user['username'].'</h6>
                                                        <p>'.$com->comment.'</p>


                            </div>
                        </div>
                    </div>';
                $last_id = $com->id;
            }
            $output .= '
       <div id="load_more">
       <br>
        <button type="button" name="load_more_button" class="btn btn-danger load-cmnt-btn form-control" data-id="'.$last_id.'" id="load_more_button">Load More</button>
       </div>
       ';
        }
        else
        {
            $output .= '
       <div id="load_more">
        <br>
        <button type="button" name="load_more_button" class="btn btn-info form-control">No Comment Found</button>
       </div>
       ';
        }
        echo $output;
    }



    public  function FooterMail(Request $request){

        $response =  FooterMail::where('mail',$request->mail)->first();
        if (!empty($response)){
            return response()->json(["status" => 2, "result" => "The mail has already been Subscribed"]);
        }else{
            $mail = new FooterMail();
            $mail->mail = $request->mail;
        }

        if($mail->save()){
            return response()->json(["status" => 1, "result" => "Your Request Send"]);
        }else{
            return response()->json(["status" => 0, "result" => "Something was Wrong"]);
        }



    }
    public  function  LoadMoreTile($id)
    {
        $user_s_id=array();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $user_s = LikeCar::where("user_id", "=", session('userDetails')->id)->get();
            foreach($user_s as $s) {
                $user_s_id[] = $s->car_id;
            }
        }
        $result = User_car::where('id','<',$id)->orderBy('id', 'desc')->paginate(6);
        $html = \Illuminate\Support\Facades\View::make('frontend.partials.tile-load-more',compact('result','user_s_id'))->render();

        if (!empty($result) && count($result) != 0){
            $last_id = $result->last()->id;
            if (count($result) >5 ){
                return response()->json(["status" => 1, "result" => $html,'last_id'=>$last_id,'btn'=>'Load More']);
            }else{
                return response()->json(["status" => 1, "result" => $html,'last_id'=>$last_id,'btn'=>'Ended']);
            }

        }
            return response()->json(["status" => 0,'btn'=>'Ended']);



    }
}
