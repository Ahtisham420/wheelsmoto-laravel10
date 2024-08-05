<?php

namespace App\Http\Controllers;

use App\CarSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\Exports\IngredientsExports;

class CarSettingController extends Controller
{
    public function all(Request $request)
    {
        $key = $request->key;
           if($request->has('key')){
            return self::filterdData($request);
        }
        $posts = CarSetting::where("_key","=",$key)->orderBy('id', 'desc')->paginate(8);
        return view('car-setting.index', compact('posts','key'));
    }

    public function create(Request $request)
    {
        $key = $request->key;
        return view('car-setting.create', compact('key'));
    }
     
    public function save(Request $request)
{

        if (!empty($request->id) && $request->id > 0){
            if ($request->brand){
                $request->validate([
                    'brand' => 'required',
                    '_value' =>'required',
                ]);
            }else{
                $request->validate([
                    '_value' => 'required'
                ]);
            }
        }else{
            if ($request->brand){
                $request->validate([
                    'brand' => 'required',
                    '_value' =>'required',
                ]);
            }else{
                $request->validate([
                    '_value' => 'required'
                ]);
            }
        }

        if (!empty($request->id) && $request->id > 0) {
            if ($request->file('icon')){
                $response = CarSetting::find($request->id);
                $cover = $request->file('icon');
                $extension = $cover->getClientOriginalExtension();
                $feature_img_name = time().'.'.$extension;
                $destinationPath = public_path('car_icon/');
                $cover->move($destinationPath, $feature_img_name);
                $response->icon = $feature_img_name;
                $response->_key = $request->_key;
                $response->_value =  $request->_value;
                $response->save();

            }else if($request->brand){
                $response = CarSetting::find($request->id);
                $response->brand = $request->brand;
                $response->_key = $request->_key;
                $response->_value =  $request->_value;
                $response->save();
            }else if ($request->state){
                $response = CarSetting::find($request->id);
                $response->state = $request->state;
                $response->_key = $request->_key;
                $response->_value =  $request->_value;
                $response->save();
            }else if ($request->model){
                $response = CarSetting::find($request->id);
                $response->model = $request->model;
                $response->_key = $request->_key;
                $response->_value =  $request->_value;
                $response->save();
            }else{
                $response = CarSetting::where('id', $request->id)->update([
                    '_value' => $request->_value
                ]);
            }

        } else {
            if ($request->file('icon')){
                $response = new CarSetting();
                $cover = $request->file('icon');
                $extension = $cover->getClientOriginalExtension();
                $feature_img_name = time().'.'.$extension;
                $destinationPath = public_path('car_icon/');
                $cover->move($destinationPath, $feature_img_name);
                $response->icon = $feature_img_name;
                $response->_key = $request->_key;
                $response->_value =  $request->_value;
                $response->save();

            }else if ($request->brand){
                $response = new CarSetting();
                $response->brand = $request->brand;
                $response->_key = $request->_key;
                $response->_value =  $request->_value;
                $response->save();
            }else if ($request->state){
                $response = new CarSetting();
                $response->state = $request->state;
                $response->_key = $request->_key;
                $response->_value =  $request->_value;
                $response->save();
            }else if ($request->model){
                $response = new CarSetting();
                $response->model = $request->model;
                $response->_key = $request->_key;
                $response->_value =  $request->_value;
                $response->save();
            }else{
                $response = CarSetting::create([
                    '_key' => $request->_key,
                    '_value' => $request->_value
                ]);
            }

        }

        if ($response) {
            return redirect()->route('all-car-settings',["key" => $request->_key])->with('success', 'Operation Successfull!');
        } else {
            return redirect()->route('all-car-settings',["key" => $request->_key])->with('failure', 'Operation Failed!');
        }
    }


    public function show(Request $request)
    {
        $key = $request->key;
        $brand = CarSetting::find($request->id);
        return view('car-setting.edit', compact('brand','key'));
    }

    public function updateStatus(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'status' => 'required'
            ]);
            if ($validator->fails()) {
                $response = [
                    'code' => 400,
                    'data' => [],
                    'error_msg' => $validator->errors()
                ];
            } else {
                if (CarSetting::where('id', $request->id)->update(['status' => $request->status])) {
                    $response = [
                        'code' => 200,
                        'data' => ["status" => $request->status, "id" => $request->id],
                        'error_msg' => trans('alert.record_updated')
                    ];
                } else {
                    $response = [
                        'code' => 500,
                        'data' => [],
                        'error_msg' => trans('alert.record_unable_to_save')
                    ];
                }
            }
        } else {
            $response = [
                'code' => 405,
                'data' => [],
                'error_msg' => trans('alert.invalid_request_method')
            ];
        }
        return response()->json($response);
    }

    public function updateTop(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'top_list' => 'required'
            ]);
            if ($validator->fails()) {
                $response = [
                    'code' => 400,
                    'data' => [],
                    'error_msg' => $validator->errors()
                ];
            } else {
                if (CarSetting::where([['id', '=', $request->id]])->update(['top_list' => $request->top_list])) {
                    $response = [
                        'code' => 200,
                        'data' => ["top_list" => $request->top_list, "id" => $request->id],
                        'error_msg' => trans('alert.record_updated')
                    ];
                } else {
                    $response = [
                        'code' => 500,
                        'data' => [],
                        'error_msg' => trans('alert.record_unable_to_save')
                    ];
                }
            }
        } else {
            $response = [
                'code' => 405,
                'data' => [],
                'error_msg' => trans('alert.invalid_request_method')
            ];
        }
        return response()->json($response);
    }

    public function delete($id,$key)
    {
        if (CarSetting::find($id)->delete())
            return redirect()->route('all-car-settings',['key'=>$key])->with('success', 'Data Deleted');
        else
            return redirect()->route('all-car-settings',['key'=>$key])->with('failure', 'Data Delete Failed');
    }
        public static function filterdData($request){
        $posts = [];
        $filters = [];
        $results = false;
        if(!empty($request->filter_status && $request->filter_status != "false")) {
            $filters[] = [
                "status", '=',$request->filter_status
            ];
        }
        if(!empty($request->filter_from_date)) {
            $filters[] = ['created_at', '>=', $request->filter_from_date];
        }
        if(!empty($request->filter_to_date)) {
            $filters[] = ['created_at', '<=', $request->filter_to_date];
        }
        if(!empty($request->filter_search)) {
            $columns = array('_value');
            $posts = CarSetting::search($request->filter_search,$columns);
        }else {
            $posts = CarSetting::where($filters);
        }
        $posts = $posts->where($filters)->orderBy('id', 'desc')->where('_key','=',$request->category)->paginate(10);
        $key = $request->category;
        if($request->has('filter_reset')){
            $posts = CarSetting::orderBy('id', 'desc')->paginate(10);
        }
        if(!$request->has('filter_csv_export')) {
            $html = View::make('car-setting.partials.table',compact('key'))->with('posts',$posts)->render();
            $results = response()->json($html);
        }else{
            return (new IngredientsExports($filters))->download('CarSetting.xlsx');
        }
        return $results;
    }
	
}
