<?php

namespace App\Http\Controllers;

use App\LikeCar;
use App\SaveList;
use App\SwapCar;
use App\Wanted;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\CarSetting;
use App\User_car;
use App\Brand;
use App\Cookie;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
//use function GuzzleHttp\json_decode;

class ApiController extends Controller
{
    public $IsLive = true;
    public $Username = "";
    public $Password = "";
    public $VRM = "";
    public $VIN = "";
    public $CurrentMileage = "0";
    public $CapVehicleValues = false;
    public $CapLiveVehicleValues = false;
    public $GlassVehicleValues = false;
    public $CapCode = false;
    public $GlassModelID = false;
    public $GlassQualifier = false;
    public $CapID = false;
    public $MCIData = false;
    public $DVLASMMTDescription = false;
    public $VED = false;
    public $MileageCheckRequired = false;
    public $BlackBookPlusValues = false;
    public $PreviousSearchRecords = false;
    public $HighRiskRecords = false;
    public $StolenVehicleRecords = false;
    public $ConditionRecords = false;
    public $PlateChanges = false;
    public $FinanceRecords = false;
    public $ColourChanges = false;
    public $KeeperChanges = false;
    public $PerformanceAndConsumptionData = false;
    public $EngineAndTechnicalData = false;
    public $WeightAndDimensionsData = false;
    public $TVI = false;
    public $CapCodeMultiMatch = false;
    public $KCodes = false;
    public $BoschCodes = false;
    public $EngineCodes = false;
    public $GlassShortCode = false;
    public $InlineDocuments = false;
    public $Documents = "";

    public  function findcar(Request $request)
    {


        $reg = $request->reg;
        $mileage  = $request->mileage;
        $vrmToSearch = $reg;
        //      $user = 'AUTOMXINUATG0378';
        //      $pass = 'DGA54OBQ';
        $user = 'POWERPERFORJ0765LIVE';
        $pass = 'JNHH00^56KJH!(JNLOLI';
        $vrmToSearch = $reg;
        $params = new ApiController();
        $params->Username = $user;
        $params->Password = $pass;
        $params->VRM = $vrmToSearch;
        try {

            $opts = array(
                'http' => array(
                    'user_agent' => 'PHPSoapClient'
                )
            );

            $context = stream_context_create($opts);
            $client = new \SoapClient('https://www.automotivemxin.com/SOAP/Service.asmx?wsdl', array(
                'stream_context' => $context,
                'cache_wsdl' => WSDL_CACHE_NONE
            ));
            $response = $client->__soapCall("GetVehicleData", array('classpmap' => array('VehicleRegInput' => $params)));
            // dd($response->GetVehicleDataResult->VehicleRegistration->VRM  );
            //$array = new stdClass();
            // $array=json_decode(json_encode( $response));
            //dd( $response->GetVehicleDataResult->MessageDetails->Message[0]->MsgLine1  );
            // dd($response->GetVehicleDataResult->VehicleRegistration->EngineCapacity);
            // echo '<br>';
            // echo'<pre>';
            // print_r($array);
            // echo '</pre>';
            // var_dump($response);
            // return  view('api',['response'=>$response]);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'result' => $e]);
        }
        return response()->json(['status' => 1, 'result' => $response]);
    }
    public function reg(Request $request)
    {

        $reg = $request->reg;
        $mileage  = $request->mileage;
        $vrmToSearch = $reg;
        //      $user = 'AUTOMXINUATG0378';
        //      $pass = 'DGA54OBQ';
        $user = 'POWERPERFORJ0765LIVE';
        $pass = 'JNHH00^56KJH!(JNLOLI';
        $vrmToSearch = $reg;
        $params = new ApiController();
        $params->Username = $user;
        $params->Password = $pass;
        $params->VRM = $vrmToSearch;
        try {

            $opts = array(
                'http' => array(
                    'user_agent' => 'PHPSoapClient'
                )
            );

            $context = stream_context_create($opts);
            $client = new \SoapClient('https://www.automotivemxin.com/SOAP/Service.asmx?wsdl', array(
                'stream_context' => $context,
                'cache_wsdl' => WSDL_CACHE_NONE
            ));
            $response = $client->__soapCall("GetVehicleData", array('classpmap' => array('VehicleRegInput' => $params)));
            //$array = new stdClass();
            // $array=json_decode(json_encode( $response));
            //dd( $response->GetVehicleDataResult->VehicleRegistration  );
            // dd($response->GetVehicleDataResult->VehicleRegistration->EngineCapacity);
            // echo '<br>';
            // echo'<pre>';
            // print_r($array);
            // echo '</pre>';
            // var_dump($response);
            // return ;

        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'result' => $e]);
        }

        if ($response->GetVehicleDataResult->VehicleRegistration->MaxPermissibleMass != 0) {
            session()->put("product", $response);
            if ($request->session()->has('userLoggedIn')) {
                $url =  env('APP_URL') . "user/dashboard";
            } else {

                //session()->flash('product', $response);
                //$a=  $request->session()->get('product');

                $url =  env('APP_URL') . "user/login";
            }
            return response()->json(['status' => 1, 'result' => $response, 'url' => $url]);
        } else {
            return response()->json(['status' => 0, 'result' => ""]);
        }
    }

    public function statuschange()
    {
    }

    public function HomeFilters($query)
    {
        //  $url = url('/home/filters');
        //   return redirect("/home/filters");
        $table = new User_car();
        $result = $table::whereraw($query)->get();
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
        return view('frontend.home-filters',['result'=>$result,'user_s'=>$user_s,'user_s_id'=>$user_s_id]);
        // return view("frontend.home-filters",['result'=>$result]);

        // return view('frontend.home-filters',['result'=>$result]);

        //dd($result);

        /*if ($request->isMethod("post")) {
            $year = $request->year;
            $price = $request->price;
            $mileage = $request->mileage;
            $condition = $request->car_condition;
            $engine_size = $request->engine_size;
            $transmission = $request->transmission;
            $boot_spoiler = $request->boot_spoiler;
            $exhaust = $request->exhaust;
            $color = $request->color;
            $interior = $request->interior;
            $body_type = $request->body_type;
            $engine_type = $request->engine_type;
            $engine_size = $request->engine_size;
            $condition = $request->car_condition;
            $car_make = $request->car_make;
            $car_type = $request->car_type;
            $modal = $request->modal;
            $car_make = $request->car_make;
            //$request = $request->all();
            $table = new User_car();
            // $result = $table::where("price", "=", $price)->get();
            dd($request);



            //return response()->json(['status' => 1, "result" => $array]);
            //  $result = CarSetting::where("_value", "=", $request->_value)->get();
            //dd($result);
        } else {
            //return response()->json(['status' => 0, 'result' => ""]);
        }*/
    }
    public  function cookie(Request $request){
        setcookie("wheelshunt_cookie", $request->cookie_n, time() + (10 * 365 * 24 * 60 * 60), "/");
        $cookie_v=$request->cookie_n;
        $cookie = new Cookie;
            $cookie->c_name=$cookie_v;
            if($cookie->save()){
                return response()->json(["status"=>1,"result"=>""]);
            }
        return response()->json(["status"=>0,"result"=>""]);
    }
    public  function  HomeFrontFilters($query,$b=null,$m=null,$y=null,Request $request){
          if($request->has('key')){
            return self::LoadMoreTile($request);
        }
        $table = new User_car();
//        if($request->has('key')){
//            return self::filterPagination($request);
//        }
        if ($query == "all"){
            $result = $table::with('city_l')->orderBy("id","desc")->paginate(User_car::pagination);
        }else{
            $query = base64_decode($query);
            $result = $table::with('city_l')->whereraw($query)->orderBy("id","desc")->paginate(User_car::pagination);
        }
        $last_id = null;
        if (!empty($result->nextPageUrl())) {
            $last_id = $result->nextPageUrl();
        }

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
        return view('frontend.home-filters',['result'=>$result,'query'=>$query,'br'=>$b,'md'=>$m,'yr'=>$y,'user_s'=>$user_s,'user_s_id'=>$user_s_id,'last_id'=>$last_id]);
    }
    public  function  LoadMoreTile(Request $request)
    {
        $user_s_id=array();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $user_s = LikeCar::where("user_id", "=", session('userDetails')->id)->get();
            foreach($user_s as $s) {
                $user_s_id[] = $s->car_id;
            }
        }
        $result = User_car::with('city_l')->orderBy("id","desc")->paginate(User_car::pagination);
        $html = View::make('frontend.partials.tile-load-more',compact('result','user_s_id'))->render();

        if (!empty($result) && count($result) != 0){
            $last_id = $result->nextPageUrl();
            if (count($result) >0 ){
                return response()->json(["status" => 1, "result" => $html,'last_id'=>$last_id,'btn'=>'Load More']);
            }else{
                return response()->json(["status" => 1, "result" => $html,'last_id'=>$last_id,'btn'=>'Ended']);
            }

        }
        return response()->json(["status" => 0,'btn'=>'Ended']);



    }
    public static function filterPagination($request){
        $user_s_id=array();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $user_s = LikeCar::where("user_id", "=", session('userDetails')->id)->get();
            foreach($user_s as $s) {
                $user_s_id[] = $s->car_id;
            }
        }
        $result = User_car::orderBy('id', 'desc')->paginate(6);
        $html = View::make('frontend.partials.tile',compact('result','user_s_id'))->render();
        $results = response()->json($html);
        return $results;
    }
    public  function  LoadMoreTileQuery(Request $request,$query)
    {
        $user_s_id=array();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $user_s = LikeCar::where("user_id", "=", session('userDetails')->id)->get();
            foreach($user_s as $s) {
                $user_s_id[] = $s->car_id;
            }
        }
        // if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
        //     /// $user_car = SwapCar::where("user_id", "=", session('userDetails')->id)->get();
        //     if ($query == "all") {
        //         $result = User_car::with('city_l')->where("user_id","!=",session('userDetails')->id)->orderBy("id", "desc")->paginate(6);
        //     }else{
        //         $result = User_car::with('city_l')->where("user_id","!=",session('userDetails')->id)->orderBy("id","desc")->whereraw($query)->paginate(User_car::pagination);

        //     }
        // }else{}
            if ($query == "all") {
                $result = User_car::with('city_l')->orderBy("id", "desc")->paginate(User_car::pagination);
            }else{
                $result = User_car::with('city_l')->orderBy("id","desc")->whereraw($query)->paginate(User_car::pagination);
            }


       // $result = User_car::with('city_l')->orderBy("id","desc")->whereraw($query)->paginate(6);
        $html = View::make('frontend.partials.tile-load-more',compact('result','user_s_id'))->render();

        if (!empty($result) && count($result) != 0){
            $last_id = $result->nextPageUrl();
            if (count($result) >0 ){
                return response()->json(["status" => 1, "result" => $html,'last_id'=>$last_id,'btn'=>'Load More']);
            }else{
                return response()->json(["status" => 1, "result" => $html,'last_id'=>$last_id,'btn'=>'Ended']);
            }

        }
        return response()->json(["status" => 0,'btn'=>'Ended']);



    }
        public function priceFilterData(Request $request,$query)
    {
        $type = new User_car();
        if($request->has('key')){
            return self::LoadMoreTileQuery($request,$query);
        }
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            /// $user_car = SwapCar::where("user_id", "=", session('userDetails')->id)->get();
            if ($query == "all") {
                $result = $type::with('city_l')->orderBy("id", "desc")->paginate(6);
            }else{
                $result = $type::with('city_l')->orderBy("id","desc")->whereraw($query)->paginate(6);

            }
        }else{
            if ($query == "all") {
                $result = $type::with('city_l')->orderBy("id", "desc")->paginate(6);
            }else{
                $result = $type::with('city_l')->orderBy("id","desc")->whereraw($query)->paginate(6);
            }

        }
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
        //  $last_id =$result->last()->id;
        $last_id = null;
        if (!empty($result->nextPageUrl())) {
            $last_id = $result->nextPageUrl();
        }
        $html = \Illuminate\Support\Facades\View::make('frontend.partials.tile',compact('result','user_s_id','user_s','last_id'))->render();
        //$results = response()->json($html);
        if (!empty($result) && count($result) != 0) {
            return response()->json(['status'=>1,'result'=>$html]);
        }
        return response()->json(["status" => 0, "result" => ""]);
//        $type = new User_car();
//        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
//            $user_car = SwapCar::where("user_id", "=", session('userDetails')->id)->get();
//            $result = $type::whereraw($query)->where("user_id","!=",session('userDetails')->id)->get();
//        }else{
//            $result = $type::whereraw($query)->get();
//        }
//        $user_car_id=array();
//        if(!empty($user_car)){
//            foreach($user_car as $s){
//                $user_car_id[]=$s->swap_list_id;
//
//            }
//
//        }
//        if (!empty($result) && count($result) != 0) {
//            return response()->json(["status" => 1, "result" => $result,"user_car_id"=>$user_car_id]);
//        }
//        return response()->json(["status" => 0, "result" => ""]);
    }
  public function filterData(Request $request,$query)
    {
        $type = new User_car();
        if($request->has('key')){
            return self::LoadMoreTileQuery($request,$query);
        }
        // if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
        //   /// $user_car = SwapCar::where("user_id", "=", session('userDetails')->id)->get();
        //   if ($query == "all") {
        //         $result = $type::with('city_l')->where("user_id","!=",session('userDetails')->id)->orderBy("id", "desc")->paginate(User_car::pagination);
        //     }else{
        //       $result = $type::with('city_l')->where("user_id","!=",session('userDetails')->id)->orderBy("id","desc")->whereraw($query)->paginate(User_car::pagination);

        //   }
        // }else{}
            if ($query == "all") {
                $result = $type::with('city_l')->orderBy("id", "desc")->paginate(User_car::pagination);
            }else{
                $result = $type::with('city_l')->orderBy("id","desc")->whereraw($query)->paginate(User_car::pagination);
            }


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
      //  $last_id =$result->last()->id;
        $last_id = null;
        if (!empty($result->nextPageUrl())) {
            $last_id = $result->nextPageUrl();
        }
        $html = View::make('frontend.partials.tile',compact('result','user_s_id','user_s','last_id'))->render();
        //$results = response()->json($html);
        if (!empty($result) && count($result) != 0) {
            return response()->json(['status'=>1,'result'=>$html]);
        }
        return response()->json(["status" => 0, "result" => ""]);
    }
    public function FiltersSearch(Request $request, $brand=null, $modal=null, $year=null, $budget=null)
    {
        $filter = [];
        if($brand){
            $brand = Brand::where("name",$brand)->first();
            if($brand){
                $filter['brand'] = $brand->id;
            }
        }
        // dd($filter);
        if($modal){
            $modal = CarSetting::where("_key","model")->where("_value",$modal)->first();
            if($modal){
                $filter['modal'] = $modal->_value;
            }
        }
        if($budget){
            $budget = User_car::whereBetween("price",[0, $budget.'00000'])->first();
            $filter['budget'] = $budget->price;
        }
        // dd($budget);
        $data = User_car::where($filter)->paginate(User_car::pagination);
        // dd($filter);
         if($request->has('key')){
             return self::LoadMoreTile($request);
         }
         return view('frontend.home-filters',['data'=>$data,'b'=>$brand,'m'=>$modal,'y'=>$year, 'bg'=>$budget]);
    }
   }
