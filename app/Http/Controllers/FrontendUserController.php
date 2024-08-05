<?php

namespace App\Http\Controllers;

use App\GarageAdvert;
use App\Misecellinous;
use App\Package;
use App\LikeCar;
use App\User;
use App\CarSetting;
use App\UserPackage;
use App\User_car;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\Appnotify;
use App\Wanted;
use App\Swap;




class FrontendUserController extends Controller
{
    function __construct()
    {
        $this->middleware('checkuserloggedin')->except("swapCreate");
    }


    function userDashboard($tab,$id = null)
    {

          // var_dump($tab,$id,$g_id,$w_id);
        $update = null;
        $w_edit = null;
        $g_edit = null;
        $misc_edit=null;

        if($id){
            $id = base64_decode($id);
        if ($tab === "wantedsection"){
            $w_edit = Wanted::find($id);
            //dd($w_edit);
     }else if( $tab === "garageadvert"){
            $g_edit = GarageAdvert::find($id);
        }else if ($tab === "edit"){
            $id = base64_decode($id);
            $update = User_car::find($id);
          }else if ($tab === "miscellaneous"){

            $misc_edit = Misecellinous::find($id);
        }
        }

        $user_packge_id = null;
        $user_package = UserPackage::where('user_id', '=', session('userDetails')->id)->with("package")->first();
        if ($user_package) {
            $user_packge_id = $user_package->package_id;
        }


        $packages = Package::all();
        $engine_type = CarSetting::where("_key", "=", "engine-types")->get();
        $exhaust = CarSetting::where("_key", "=", "exhaust")->get();
        $colors = CarSetting::where("_key", "=", "colors")->get();
        $matt_paint = CarSetting::where("_key", "=", "matt-paint")->get();
        $wheel_size = CarSetting::where("_key", "=", "wheel-size")->get();
        $parking_sensor = CarSetting::where("_key", "=", "parking-sensor")->get();
        $car_type = CarSetting::where("_key", "=", "car-type")->get();
        $body_type = CarSetting::where("_key", "=", "body-type")->get();
        $interior = CarSetting::where("_key", "=", "interior")->get();
        $import = CarSetting::where("_key", "=", "import")->get();
        $service_history = CarSetting::where("_key", "=", "service-history")->get();
        $boot_spoiler = CarSetting::where("_key", "=", "boot-spoiler")->get();
        $modal = CarSetting::where("_key", "=", "modal")->get();
        $variant = CarSetting::where("_key", "=", "variant")->get();
        $car_make = CarSetting::where("_key", "=", "car-make")->get();
        $saftey_feature = CarSetting::where("_key", "=", "saftey-feature")->get();
        $ent_feature = CarSetting::where("_key", "=", "entertainment-feature")->get();
        $user = User::where('id', session('userDetails')->id)->first();
        $garage = GarageAdvert::OrderBy('created_at','desc')->where('user_id', session('userDetails')->id)->paginate(12);
        $misc = Misecellinous::OrderBy('created_at','desc')->where('user_id', session('userDetails')->id)->paginate(12);
        $wanted = Wanted::OrderBy('created_at','desc')->where('user_id', session('userDetails')->id)->paginate(12);
        $user_car = User_car::OrderBy('created_at','desc')->where('user_id', session('userDetails')->id)->with(["user", "engine_type", "color", "parking_sensor", "exhaust", "car_type", "body_type"])->paginate(12);
        $swap_id =  $id;
        return view('frontend.dashboard', compact('tab', 'user_packge_id', 'user_package', 'packages', 'user', 'engine_type', 'exhaust', 'colors', 'matt_paint', 'wheel_size', 'parking_sensor', 'car_type', 'body_type', 'user_car', 'interior', 'service_history', 'boot_spoiler', 'modal', 'variant', 'car_make', 'import', 'saftey_feature', 'update', 'ent_feature','garage','g_edit','wanted','w_edit','misc','misc_edit','swap_id'));
    }

    public function packagePurchase(Request $request)
    {
         $package_id = $request->package_id;
        $auth_id = session('userDetails')->id;
        if (UserPackage::where('user_id', $auth_id)->exists()) {
            $package = UserPackage::where('user_id', $auth_id)->update(['package_id' => $package_id]);
        } else {
            $package = UserPackage::create([
                'user_id' => $auth_id,
                'package_id' => $package_id
            ]);
        }
        $user_car = Package::find($package_id);

        $user = User::find($auth_id);
        $user->notify(new Appnotify($user_car));

        return redirect()->route("user-dashboard", ["tab" => "packages"]);
    }

    public function userChangePassword()
    {
     //   $result = User::where('id',session('userDetails')->id)->first();
        return view("frontend.user-change-pass");
    }

    public function userChangePasswordSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);
        if ($validator->fails()){
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::where([['email', '=', $request->email]])->first();
        if ($user) {
            User::where('email', '=', $request->email)->update(['password' => Hash::make($request->password)]);
            return redirect()
                ->back()
                ->with('success', trans('alert.record_updated'));
        } else {
            return redirect()
                ->back()
                ->with('error', trans('alert.record_unable_to_save'))
                ->withInput();
        }
    }

    public function userProfileUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'about' => 'required',
            'address' => 'required',
            'city' => 'required',
            'Country' => 'required',
            "PostalCode"=>"required"
        ]);
        $data = $request->except('_token');
        if ($validator->fails()) {
            return redirect()
                ->route('profile-dashboard')
                ->withErrors($validator)
                ->withInput();
        }
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatar');
        }
        $userUpdate = User::where('id', '=', session('userDetails')->id)->update($data);

        if ($userUpdate) {
            $userData = User::find(session('userDetails')->id);
            session()->put("userDetails", $userData);
            session()->save();
            return redirect()
                ->route('profile-dashboard')
                ->with('success', trans('alert.record_updated'));
        } else {
            return redirect()
                ->route('profile-dashboard')
                ->with('error', trans('alert.record_unable_to_save'))
                ->withInput();
        }
    }
    public function user_save_car(Request $request)
    {

//$validator = Validator::make($request->all(), [
//            'registration_number' => 'required',
//            'milage' => 'required',
//            'engine_size' => 'required',
//            'engine_type' => 'required',
//            'color' => 'required',
//            'interior' => 'required',
//            'metallic_paint' => 'required',
//            'matt_paint' => 'required',
//            'warranty' => 'required',
//            'driver_position' => 'required',
//            'alloy_wheel' => 'required',
//            'part_exchange' => 'required',
//            'import' => 'required',
//            'mot' => 'required',
//            'service_history' => 'required',
//            'boot_spoiler' => 'required',
//            'parking_sensor' => 'required',
//            'exhaust' => 'required',
//            'title' => 'required',
//            'modal' => 'required',
//            'brand'=>'required',
//            'variant' => 'required',
//            'car_type' => 'required',
//            'car_make' => 'required',
//            'year' => 'required',
//            'post_code' => 'required',
//            'body_type' => 'required',
//            'transmission' => 'required',
//            'fuel_type' => 'required',
//            'condition' => 'required',
//            'advert_type' => 'required',
//            'price' => 'required',
//            'car_door'=> 'required',
//            'availibilty' => 'required',
//            'pic' => 'required',
//            'pic.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
//        ]);
        $validator = Validator::make($request->all(),[
            'brand' => 'required',
            'model' => 'required',
           'year' => 'required',
            'driven' => 'required',
            'fuel'=> 'required',
            'car_condition'=>'required',
            'registered'=>'required',
            'description'=>'required',
            'location'=>'required',
            'state'=>'required',
            'city'=>'required',
            'car_type'=>'required',
            'price'=>'required'

        ]);
        if ($validator->fails()) {
            return response()->json(["status" => 0, "msg" => $validator->errors()->all()]);
        }
//        $crop_image = $request->img;
//        $explode1 = explode(";", $crop_image);
//        $explode2 = explode(",", $explode1[1]);
//        $data = base64_decode($explode2[1]);
//        $img_name = time() . ".png";
//        $upload_path = public_path('crop_images/' . $img_name);
//
//        file_put_contents($upload_path, $data);
        $user_car = new User_car();
        $user_car->user_id = session('userDetails')->id;
        $user_car->registration_no = $request->registered;
        $user_car->brand = $request->brand;
        $user_car->modal = $request->model;
        $user_car->year = $request->year;
        $user_car->fuel_type = $request->fuel;
        $user_car->car_condition = $request->car_condition;
        $user_car->title = $request->title;
        $user_car->price = $request->price;
        $user_car->advert_text = $request->description;
        $user_car->pic_url = $request->image;
        $user_car->state = $request->state;
        $user_car->city = $request->city;
        $user_car->car_type = $request->car_type;
        $user_car->drivers_position = $request->driven;
        $user_car->contact_number=$request->number;
           if ($request->location){
            $user_car->location=$request->location;
            $user_car->map_lat=$request->map_lat;
            $user_car->map_lng=$request->map_lng;
        }
        if($request->other_name && $request->other_number){
            
        $user_car->other_name = $request->other_name;
        $user_car->other_number = $request->other_number;
        
            
        }
//        $user_car->interior = $request->interior;
//        $user_car->metallic_paint = $request->metallic_paint;
//        $user_car->matt_paint = $request->matt_paint;
//        $user_car->car_door = $request->car_door;
//        $user_car->safety_rating = $request->saftey_rating;
//        $user_car->safety_rating_info = $request->saftey_rating_info;
//        $user_car->bhp = $request->bhp;
//        $user_car->warranty = $request->warranty;
//        $user_car->drivers_position = $request->driver_position;
//        $user_car->wheel_size = $request->wheel_size;
//        $user_car->alloy_wheel = $request->alloy_wheel;
//        $user_car->part_exchange = $request->part_exchange;
//        $user_car->speed = $request->speed;
//        $user_car->top_speed = $request->top_speed;
//        $user_car->driven_wheels = $request->driven_wheel;
//        $user_car->import = $request->import;
//        $user_car->mot_expiry_date = $request->mot;
//        $user_car->service_history = $request->service_history;
//        $user_car->boot_spoiler = $request->boot_spoiler;
//        $user_car->parking_sensor = $request->parking_sensor;
//        $user_car->exhaust = $request->exhaust;
//        $user_car->title = $request->title;
//        $user_car->modal = $request->modal;
//        $user_car->brand = $request->brand;
//        $user_car->variant = $request->variant;
//        $user_car->car_type = $request->car_type;
//        $user_car->car_make = $request->car_make;
//        $user_car->year = $request->year;
//        $user_car->post_code = $request->post_code;
//        $user_car->body_type = $request->body_type;
//        $user_car->transmission = $request->transmission;
//        $user_car->fuel_type = $request->fuel_type;
//        $user_car->car_condition = $request->condition;
//        $user_car->advert_text = $request->advert_type;
//        $user_car->price = $request->price;
//        $user_car->crop_image =   $img_name;
//        $user_car->car_availbilty = $request->availibilty[0];
//        $img = array();
//        if ($request->hasFile('pic')) {
//            foreach ($request->file('pic') as $file) {
//                $img[] = $file->store('user_car', 'public');
//            }
//
//            $json = json_encode($img);
//            $user_car->pic_url = $json;
//            $se = array();
//
//            $json1 = json_encode($request->saf_f);
//            $user_car->saftey_f = $json1;
//            $ee = array();
//
//            $json2 = json_encode($request->en_f);
//            $user_car->ent_f = $json2;
//            if ($request->hasFile('video')) {
//                $video = $request->file("video")->store('user_car_video', 'public');
//                $user_car->video_url = $video;
//            }

            if ($user_car->save()) {
                 $slg  = $request->title . ' ' . $user_car->id;
                $user_car->slug = Str::slug($slg);
                $user_car->save();
                $user = User::find(session('userDetails')->id);
                $msg = "Created";
             //   $user->notify(new Appnotify(null, $msg));

                return response()->json(["status" => 1, "url" => route('my-advert'), "msg" => "record has been Placed", "swap_route" => $request->swap]);
            } else {
                return response()->json(["status" => 0, "msg" => ["record not save...Please try again"]]);
            }
        }

    public function user_update_car(Request $request)
    {
        // dd($request->en_f,$request->saf_f);
//        $validator = Validator::make($request->all(), [
//            'registration_number' => 'required',
//            'milage' => 'required',
//            'engine_size' => 'required',
//            'engine_type' => 'required',
//            'color' => 'required',
//            'interior' => 'required',
//            'metallic_paint' => 'required',
//            'matt_paint' => 'required',
//            'warranty' => 'required',
//            'driver_position' => 'required',
//            'alloy_wheel' => 'required',
//            'part_exchange' => 'required',
//            'import' => 'required',
//            'mot' => 'required',
//            'service_history' => 'required',
//            'boot_spoiler' => 'required',
//            'parking_sensor' => 'required',
//            'exhaust' => 'required',
//            'title' => 'required',
//            'modal' => 'required',
//            'brand'=>'required',
//            'variant' => 'required',
//            'car_type' => 'required',
//            'car_make' => 'required',
//            'year' => 'required',
//            'post_code' => 'required',
//            'body_type' => 'required',
//            'transmission' => 'required',
//            'fuel_type' => 'required',
//            'condition' => 'required',
//            "car_door"=>"required",
//            'advert_type' => 'required',
//            'price' => 'required',
//            'availibilty' => 'required',
//
//        ]);
        $validator = Validator::make($request->all(),[
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'driven' => 'required',
            'fuel'=> 'required',
            'car_condition'=>'required',
            'registered'=>'required',
            'description'=>'required',
            'location'=>'required',
            'state'=>'required',
            'city'=>'required',
            'car_type'=>'required',
            'price'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json(["status" => 0, "msg" => $validator->errors()->all()]);
        }


        $user_c = new User_car();
        $id = $request->c_id;

        $user_car = $user_c::find($id);
        if ($user_car) {
            $user_car->user_id = session('userDetails')->id;
            $user_car->registration_no = $request->registered;
            $user_car->brand = $request->brand;
            $user_car->modal = $request->model;
            $user_car->year = $request->year;
            $user_car->fuel_type = $request->fuel;
            $user_car->drivers_position = $request->driven;
            $user_car->car_condition = $request->car_condition;
            $user_car->title = $request->title;
            $slg  = $request->title . ' ' . $id;
            $user_car->slug = Str::slug($slg);
            $user_car->price = $request->price;
            $user_car->advert_text = $request->description;
            $user_car->pic_url = $request->image;
            $user_car->state = $request->state;
            $user_car->car_type = $request->car_type;
            $user_car->city = $request->city;
            $user_car->contact_number=$request->number;
            $user_car->other_name = $request->other_name;
                $user_car->other_number = $request->other_number;
            if ($request->location){
                $user_car->location=$request->location;
                $user_car->map_lat=$request->map_lat;
                $user_car->map_lng=$request->map_lng;
            }
       
                    
                
                
                    
            

//            if ($request->c_status == 1){
//                $crop_image = $request->img;
//                $explode1 = explode(";", $crop_image);
//                $explode2 = explode(",", $explode1[1]);
//                $data = base64_decode($explode2[1]);
//                $img_name = time() . ".png";
//                $upload_path = public_path('crop_images/' . $img_name);
//                file_put_contents($upload_path, $data);
//                $user_car->crop_image =  $img_name;
//            }

//            $user_car->registration_no = $request->registration_number;
//            $user_car->mileage = $request->milage;
//            $user_car->engine_size = $request->engine_size;
//            $user_car->engine_type = $request->engine_type;
//            $user_car->color = $request->color;
//            $user_car->car_door = $request->car_door;
//            $user_car->interior = $request->interior;
//            $user_car->metallic_paint = $request->metallic_paint;
//            $user_car->matt_paint = $request->matt_paint;
//            $user_car->safety_rating = $request->saftey_rating;
//            $user_car->safety_rating_info = $request->saftey_rating_info;
//            $user_car->bhp = $request->bhp;
//            $user_car->warranty = $request->warranty;
//            $user_car->drivers_position = $request->driver_position;
//            $user_car->wheel_size = $request->wheel_size;
//            $user_car->alloy_wheel = $request->alloy_wheel;
//            $user_car->part_exchange = $request->part_exchange;
//            $user_car->speed = $request->speed;
//            $user_car->top_speed = $request->top_speed;
//            $user_car->driven_wheels = $request->driven_wheel;
//            $user_car->import = $request->import;
//            $user_car->mot_expiry_date = $request->mot;
//            $user_car->service_history = $request->service_history;
//            $user_car->boot_spoiler = $request->boot_spoiler;
//            $user_car->parking_sensor = $request->parking_sensor;
//            $user_car->exhaust = $request->exhaust;
//            $user_car->title = $request->title;
//            $user_car->modal = $request->modal;
//            $user_car->brand = $request->brand;
//            $user_car->variant = $request->variant;
//            $user_car->car_type = $request->car_type;
//            $user_car->car_make = $request->car_make;
//            $user_car->year = $request->year;
//            $user_car->post_code = $request->post_code;
//            $user_car->body_type = $request->body_type;
//            $user_car->transmission = $request->transmission;
//            $user_car->fuel_type = $request->fuel_type;
//            $user_car->car_condition = $request->condition;
//            $user_car->advert_text = $request->advert_type;
//            $user_car->price = $request->price;

//            $user_car->car_availbilty = $request->availibilty[0];
//            $img = array();
//            if ($request->hasFile('pic')) {
//                foreach ($request->file('pic') as $file) {
//                    $img[] = $file->store('user_car', 'public');
//                }
//
//
//                $json = json_encode($img);
//                $user_car->pic_url = $json;
//                $se = array();
//            }
//            if ($request->hasFile('video')) {
//                $video = $request->file("video")->store('user_car_video', 'public');
//                $user_car->video_url = $video;
//            }
//          $json1 = json_encode($request->saf_f);
//            $user_car->saftey_f = $json1;
//            $ee = array();
//
//            $json2 = json_encode($request->en_f);
//            $user_car->ent_f = $json2;

            if ($user_car->save()) {
                $user = User::find(session('userDetails')->id);
                $msg = "Updated";
                //$user->notify(new Appnotify(null, $msg));
                return response()->json(["status" => 1, "url" => route('my-advert'), "msg" => "record has been updated"]);
            } else {
                return response()->json(["status" => 0, "msg" => ["record not save...Please try again"]]);
            }
        }
    }
    public function MyAdvert()
    {
        $user_car = User_car::OrderBy('created_at', 'desc')->where('user_id', session('userDetails')->id)->with(["user", "engine_type", "color", "parking_sensor", "exhaust", "car_type", "body_type"])->paginate(8);
        $update = null;
        $w_edit = null;
        $g_edit = null;
        $misc_edit = null;
        $tab = "my_advert";
        return view('frontend.dashboard', compact('user_car', 'update', 'w_edit', 'g_edit', 'misc_edit', 'tab'));

    }

    public function ProfileDashboard()
    {
        $update = null;
        $w_edit = null;
        $g_edit = null;
        $misc_edit = null;
        $tab = "profile_dash";
        $user = User::where('id', session('userDetails')->id)->first();
        return view('frontend.dashboard', compact('user', 'update', 'w_edit', 'g_edit', 'misc_edit', 'tab'));
    }
    public function GarageAdvert($id = null)
    {
        $update = null;
        $w_edit = null;
        $g_edit = null;
        $misc_edit = null;
        if (!empty($id)){
            $id = base64_decode($id);
                $g_edit = GarageAdvert::find($id);
                }else{
            $g_edit = null;
        }
        $tab = "garage_advert";
        $user = User::where('id', session('userDetails')->id)->first();
        return view('frontend.dashboard', compact('user', 'update', 'w_edit', 'g_edit', 'misc_edit', 'tab'));
    }
       public function AutoPartAdvertList()
    {
        $update = null;
        $w_edit = null;
        $g_edit = null;
        $misc_edit = null;
        $tab = "auto-part";
        $misc = Misecellinous::OrderBy('created_at', 'desc')->where('user_id', session('userDetails')->id)->paginate(9);
        return view('frontend.dashboard', compact('update', 'w_edit', 'g_edit', 'misc_edit', 'tab', 'misc'));
    }
  public function AutoPartAdvert($id=null)
    {
        $update = null;
        $w_edit = null;
        $g_edit = null;
        $misc_edit = null;
        if ($id) {
           $id = base64_decode($id);
           $misc_edit =  Misecellinous::find($id);
        }
        $tab = "autopart_ad";
        $user = User::where('id', session('userDetails')->id)->first();
        return view('frontend.dashboard', compact('user', 'update', 'w_edit', 'g_edit', 'misc_edit', 'tab'));
    }

    public function SellYourCar($id = null)
    {
        if ($id != null) {
            $id = base64_decode(base64_decode($id));
            $update = User_car::find($id);

        } else {
            $update = null;
        }
        $engine_type = CarSetting::where("_key", "=", "engine-types")->get();

        $exhaust = CarSetting::where("_key", "=", "exhaust")->get();

        $colors = CarSetting::where("_key", "=", "colors")->get();

        $matt_paint = CarSetting::where("_key", "=", "matt-paint")->get();

        $wheel_size = CarSetting::where("_key", "=", "wheel-size")->get();

        $parking_sensor = CarSetting::where("_key", "=", "parking-sensor")->get();

        $car_type = CarSetting::where("_key", "=", "car-type")->get();

        $body_type = CarSetting::where("_key", "=", "body-type")->get();

        $interior = CarSetting::where("_key", "=", "interior")->get();

        $import = CarSetting::where("_key", "=", "import")->get();

        $service_history = CarSetting::where("_key", "=", "service-history")->get();

        $boot_spoiler = CarSetting::where("_key", "=", "boot-spoiler")->get();

        $modal = CarSetting::where("_key", "=", "modal")->get();

        $variant = CarSetting::where("_key", "=", "variant")->get();

        $car_make = CarSetting::where("_key", "=", "car-make")->get();

        $saftey_feature = CarSetting::where("_key", "=", "saftey-feature")->get();

        $ent_feature = CarSetting::where("_key", "=", "entertainment-feature")->get();
        $user_packge_id = null;
        $user_package = UserPackage::where('user_id', '=', session('userDetails')->id)->with("package")->first();
        if ($user_package) {
            $user_packge_id = $user_package->package_id;
        }
        $pkg = false ;
        if ($update){
            $pkg = Package::find($update->package_id);
        }

        $packages = Package::all();
        $user = User::where('id', session('userDetails')->id)->first();


        $w_edit = null;
        $g_edit = null;
        $misc_edit = null;
        $tab = "sell_your_car";
        return view('frontend.dashboard', compact('pkg','update', 'w_edit', 'g_edit', 'misc_edit', 'tab', 'user', 'engine_type', 'exhaust', 'colors', 'matt_paint', 'wheel_size', 'parking_sensor', 'car_type', 'body_type', 'interior', 'service_history', 'boot_spoiler', 'modal', 'variant', 'car_make', 'import', 'saftey_feature', 'update', 'ent_feature', 'user', 'user_packge_id', 'user_package', 'packages'));
    }

    public function CreateWantedSection($id = null)
    {
        if ($id != null) {
            $id = base64_decode($id);
            $w_edit = Wanted::find($id);

        } else {
            $w_edit = null;
        }
        $update = null;
        $g_edit = null;
        $misc_edit = null;
        $tab = "buyer_ad";
        return view('frontend.dashboard', compact('update', 'w_edit', 'g_edit', 'misc_edit', 'tab'));
    }

    public function WantedList()
    {
        $update = null;
        $w_edit = null;
        $g_edit = null;
        $misc_edit = null;
        $tab = "buyer_list";
        $wanted = Wanted::with('brandWanted', 'modelWanted', 'varientWanted')->OrderBy('created_at', 'desc')->where('user_id', session('userDetails')->id)->paginate(9);
        return view('frontend.dashboard', compact('update', 'w_edit', 'g_edit', 'misc_edit', 'tab', 'wanted'));
    }
    public function GarageList()
    {
        $update = null;
        $w_edit = null;
        $g_edit = null;
        $misc_edit = null;
        $tab = "garage";
        $garage = GarageAdvert::OrderBy('created_at', 'desc')->where('user_id', session('userDetails')->id)->paginate(9);
        return view('frontend.dashboard', compact('update', 'w_edit', 'g_edit', 'misc_edit', 'tab', 'garage'));
    }

    public function add_garage_advert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'c_name' => 'required',
            'description' => 'required',
            'pic' => 'required',
            'location' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(["status" => 0, "msg" => $validator->errors()->all()]);
        }

        if($request->id ==0){
                $garage = new GarageAdvert();
            }
              else{
                $g=new GarageAdvert();
                  $garage = $g::find($request->id);

              }
                $garage->c_name=$request->c_name;
                $garage->user_id = session('userDetails')->id;
                $garage->description=$request->description;
                $garage->deal_item=$request->deal_item;
                $garage->compan_mail=$request->compan_email;
                $garage->user_website= $request->url;
                $garage->location= $request->location;
                $garage->map_lat= $request->maplat;
                $garage->map_lng= $request->maplng;
                $img=array();
                if ($request->hasFile('image')) {
                foreach ($request->file('image') as $file) {
                    $img[] = $file->store('garage_advert', 'public');
                }
                $json = json_encode($img);
                    $garage->pic = $json;
                    $crop_image = $request->img;
                    $explode1 = explode(";", $crop_image);
                    $explode2 = explode(",", $explode1[1]);
                    $data = base64_decode($explode2[1]);
                    $img_name = time() . ".png";
                    $upload_path = public_path('crop_images/' . $img_name);
                    file_put_contents($upload_path, $data);
                    $garage->feature_img = $img_name;


        }
                if($garage->save()){
                    return response()->json(["status" => 1, "msg" => "record has been inserted"]);
                }else{
                    return response()->json(["status" => 0, "msg" => "Please Try Again"]);
                }
                }
    public function add_wanted_advert(Request $request)
    {

        if($request->id !=0) {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'describe' => 'required',
                // 'brand' => 'required',
                // 'model' => 'required',
                // 'varient' => 'required',
                'budget' => 'required', 
                'email' => 'required',
                'attachment' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }
        else{
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'describe' => 'required',
                'attachment' => 'required',
                // 'brand' => 'required',
                // 'model' => 'required',
                // 'varient' => 'required',
                'budget' => 'required',
                'email' => 'required',
                'attachment' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }
        if ($validator->fails()) {
            return response()->json(["status" => 0, "msg" => $validator->errors()->all()]);
        }
        if($request->id ==0){
                $garage = new Wanted();
            }
            else{
                $g=new Wanted();
                $garage = $g::find($request->id);
            }
            $garage->title=$request->title;
            $garage->user_id = session('userDetails')->id;
            $garage->describe=$request->describe;
            // $garage->brand=$request->brand;
            // $garage->model=$request->model;
            // $garage->varient=$request->varient;
            $garage->budget=$request->budget;
            $garage->user_number = $request->user_numb;
            $garage->mail = $request->email;
            if($request->has("attachment")){
                $garage->image= $request->file('attachment')->store('garage_advert', 'public');
            }
            if($garage->save()){
                return response()->json(["status" => 1, "msg" => "record has been inserted"]);
            }
            else{
                return response()->json(["status" => 0, "msg" => "Please Try Again"]);
            }



    }
    public function del_car($id)
    {
        $id = base64_decode($id);
        $res = User_car::find($id);
        if ($res) {
            if ($res->delete()) {
                return response()->json(["status" => 1, "msg" => "Car add has been deleted"]);
            } else {
                return response()->json(["status" => 0, "msg" => "Please Refresh and try again"]);
            }
        }
    }
    public function del_garage($id)
    {
        $id = base64_decode($id);
        $garage = new GarageAdvert();
        $garage = $garage::find($id);
        if ($garage) {
            if ($garage->delete()) {
                return response()->json(["status" => 1, "msg" => "Georage add has been deleted"]);
            } else {
                return response()->json(["status" => 0, "msg" => "Please Refresh and try again"]);
            }
        }
    }
    public function del_wanted($id)
    {
        $id = base64_decode($id);
        $want = new Wanted();
        $want = $want::find($id);
        if ($want) {
            if ($want->delete()) {
                return response()->json(["status" => 1, "msg" => "Georage add has been deleted"]);
            } else {
                return response()->json(["status" => 0, "msg" => "Please Refresh and try again"]);
            }
        }
    }
    public function del_misc($id)
    {
        $id = base64_decode($id);
        $res = Misecellinous::find($id);
        if ($res) {
            if ($res->delete()) {
                return response()->json(["status" => 1, "msg" => "Car add has been deleted"]);
            } else {
                return response()->json(["status" => 0, "msg" => "Please Refresh and try again"]);
            }
        }
    }

    public  function miscellanousCreate(Request $request){
if ($request->id != 0){
    $validator = Validator::make($request->all(), [
        'car_part' => 'required',
        'price' => 'required',
        'part_condition'=>'required',
        'location'=>'required',
    ]);
}else{
    $validator = Validator::make($request->all(), [
        'car_part' => 'required',
        'price' => 'required',
        'image' => 'required',
        "part_condition"=>"required",
        'location'=>'required',
    ]);
}

        if ($validator->fails()) {
            return response()->json(["status" => 0, "msg" => $validator->errors()->all()]);
        }

        if($request->id ==0){
            $misc = new Misecellinous();
        }
        else{
            $m=new Misecellinous();
            $misc = $m::find($request->id);

        }
        // $misc->model = $request->model;
        // $misc->brand=$request->brand;
        $misc->user_id = session('userDetails')->id;
        $misc->car_part=$request->car_part;
        $misc->price=$request->price;
        $misc->number=$request->misc_numb;
        $misc->part_condition=$request->part_condition;
         if ($request->location){
            $misc->location=$request->location;
            $misc->map_lat=$request->map_lat;
            $misc->map_lng=$request->map_lng;
        }
        $img=array();
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $img[] = $file->store('garage_advert', 'public');
            }
            $json = json_encode($img);
            $misc->pics = $json;
            $crop_image = $request->img;
            $explode1 = explode(";", $crop_image);
            $explode2 = explode(",", $explode1[1]);
            $data = base64_decode($explode2[1]);
            $img_name = time() . ".png";
            $upload_path = public_path('crop_images/' . $img_name);
            file_put_contents($upload_path, $data);
            $misc->feature_img = $img_name;


        }
        if($misc->save()){
            return response()->json(["status" => 1, "msg" => "record has been inserted"]);
        }else{
            return response()->json(["status" => 0, "msg" => "Please Try Again"]);
        }

    }

    public  function swapCreate(Request $request)
    {

        $validator = validator::make($request->all(), [
            'manufacture' => 'required',
            'car_type' => 'required',
            'carmake' => 'required',
            'enginetype' => 'required',
            'color' => 'required',
            'swap_condition' => 'required',
            'mileage' => 'required',
            'registration_no' => 'required',
            'image' => 'required',
            'fuel_type'=> 'required',
            'price'=> 'required'
        ]);
        if ($validator->fails()) {

            return response()->json(["status" => 0, "msg" => $validator->errors()->all()]);
        }

        if (session("userLoggedIn") == true) {

            if ($request->swap_id == 0){

                $swap = new Swap();
            }else{

                $swap = new Swap();
                $swap = $swap::find($request->swap_id);
            }


            $swap->registration_number = $request->registration_no;
            $swap->mileage = $request->mileage;
            $swap->manufacture = $request->manufacture;
            $swap->user_id = session('userDetails')->id;
            $swap->car_type = $request->car_type;
            $swap->car_make = $request->carmake;
            $swap->engine_type = $request->enginetype;
            $swap->car_condition = $request->swap_condition;
            $swap->model = $request->model;
            $swap->color = $request->color;
            $swap->price=$request->price;
            $swap->fuel_type=$request->fuel_type;

            $img = array();
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $file) {
                    $img[] = $file->store('garage_advert', 'public');
                }
                $json = json_encode($img);
                $swap->pic = $json;
                $crop_image = $request->img;
                $explode1 = explode(";", $crop_image);
                $explode2 = explode(",", $explode1[1]);
                $data = base64_decode($explode2[1]);
                $img_name = time() . ".png";
                $upload_path = public_path('crop_images/' . $img_name);
                file_put_contents($upload_path, $data);
                $swap->featured_img = $img_name;
            }
            if ($swap->save()) {
                $result = $swap::where('id','=',$swap->id)->first();
                return response()->json(["status" => 1, "msg" => "record has been inserted","result"=>$result]);
            } else {
                return response()->json(["status" => 0, "msg" => "Please Try Again"]);
            }


        }
        //else {
//            $value = $request->all();
//            $crop_image = $request->img;
//           // dd($request->all());
//            $explode1 = explode(";", $crop_image);
//            $explode2 = explode(",", $explode1[1]);
//            $data = base64_decode($explode2[1]);
//            $value["img"]=$data;
//         $request->session()->put("swap_car",$value);
////            $swap_session=  $request->session()->get("swap_car");
//            return response()->json(["status" => 2, "msg" => "Please login"]);

     //   }




    }







}
