<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class BrandController extends Controller
{
    public function all()
    {
        $categories = Brand::orderBy('name')->paginate(8);
        return view('brand.index', compact('categories'));
    }

    public function create()
    {
        return view('brand.create');
    }

    public function save(Request $request)
    {

        if (!empty($request->id) && $request->id > 0){
            if ($request->file('icon')){
                $request->validate([
                    'name' => 'required|unique:brands,name,' . $request->id,
                    'icon' =>'required|image|mimes:png,|max:2048',
                    'top_list' => 'required',
                     'slug'=> 'required'
                ]);
            }else{

                $request->validate([
                    'name' => 'required|unique:brands,name,' . $request->id,
                      'top_list' => 'required',
                     'slug'=> 'required'
                ]);

            }


        }else{
            $request->validate([
                'name' => 'required|unique:brands,name,NULL,id,deleted_at,NULL',
                'icon' =>'required|image|mimes:png,|max:2048',
                  'top_list' => 'required',
                     'slug'=> 'required'
            ]);
        }

        if (!empty($request->id) && $request->id > 0) {
            if ($request->brand_status === "on"){
                $status = 1;
            }else{
                $status = 0;
            }
            if ($request->file('icon')){
                $response =  Brand::find($request->id);
                $cover = $request->file('icon');
                   
                $extension = $cover->getClientOriginalExtension();
                $feature_img_name = time().'.'.$extension;
                $destinationPath = public_path('brand_icon/');
                $cover->move($destinationPath, $feature_img_name);
                $response->name= $request->name;
                $response->top_list= $request->top_list;
                $response->slug= $request->slug;
                $response->image = $feature_img_name;
                $response->status = $status;
                $response->save();

            }else{
                $response = Brand::where('id','=', $request->id)->update([
                    'name' => $request->name,
                    'top_list' => $request->top_list,
                    'slug'=> $request->slug,
                ]);
            }

        } else {

            if ($request->file('icon')){
                $response = new Brand();
                $cover = $request->file('icon');

                $extension = $cover->getClientOriginalExtension();
                $feature_img_name = time().'.'.$extension;
                $destinationPath = public_path('brand_icon/');
                $cover->move($destinationPath, $feature_img_name);
                $response->top_list= $request->top_list;
                $response->name= $request->name;
                $response->slug= $request->slug;
                $response->image = $feature_img_name;
                $response->save();
            }else{
                $response = Brand::create([
                    'name' => $request->name,
                  'top_list'=> $request->top_list,
                   'slug'=> $request->slug,
                ]);
            }

        }

        if ($response) {
            return redirect()->route('all-brands')->with('success', 'Operation Successfull!');
        } else {
            return redirect()->route('all-brands')->with('failure', 'Operation Failed!');
        }
    }

    public function show(Request $request)
    {
        $brand = Brand::find($request->id);
        return view('brand.edit', compact('brand'));
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
                if (Brand::where('id', $request->id)->update(['status' => $request->status])) {
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
                if (Brand::where([['id', '=', $request->id]])->update(['top_list' => $request->top_list])) {
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

    public function delete($id)
    {
        if (Brand::find($id)->delete())
            return redirect()->route('all-brands')->with('success', 'Data Deleted');
        else
            return redirect()->route('all-brands')->with('failure', 'Data Delete Failed');
    }
}
