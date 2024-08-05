<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use Auth;

class PackageController extends Controller
{



    public function index()
    {
        $packages = Package::orderBy('updated_at', 'desc')->paginate(8);
        return view('packages.index', compact('packages'));
        
    }

    public function form(Request $request)
    {
        if (isset($request->id) && $request->id != 0) {
            $results = $this->edit($request->id);
            if ($results instanceof Package) {
                $page_title = "Edit";
                return view('packages.form', compact('page_title', 'results'));
            }
            return $results;
        } else {
            $page_title = "Add";
            return view('packages.form', compact('page_title'));
        }
    }

    public function edit($id)
    {
        $package = Package::find($id);
        if (!$id || !$package) {
            return redirect()->back();
        } else {
            return $package;
        }
    }

    public function save(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->id == 0) {
                return $this->create($request);
            } else {
                return $this->update($request);
            }
        }

        $response = ['error_msg' => trans('alert.invalid_request')];

        return redirect(route('all-packages'))->withErrors($response);
    }

    public function create($request)
    {
       
            $data = array();
            $validation_rules = [
                'name' => 'required|unique:packages,name',
                'tagline' => 'required',
                'price' => 'required',
                'duration' => 'required'
            ];
            if (!empty($request->off_bit) && $request->off_bit == "on") {
                $validation_rules['off_percentage'] = "required";
            }

            $request->validate($validation_rules);

            $data['name'] = $request->name;
            $data['tagline'] = $request->tagline;
            $data['price'] = $request->price;
            $data['duration'] = $request->duration;
            $data['off_bit'] = !empty($request->off_bit) && $request->off_bit == "on" ? 1 : 0;
            $data['off_percentage'] =  !empty($request->off_percentage) ? $request->off_percentage : 0;

            $attributes = array();
            $attributes["adverts"] = !empty($request->adverts) ? $request->adverts : 0;
            $attributes["images_per_post"] = !empty($request->images_per_post) ? $request->images_per_post : 0;
            $attributes["videos_per_post"] = !empty($request->videos_per_post) ? $request->videos_per_post : 0;

            $data['attributes'] = json_encode($attributes);

            $package = Package::create($data);

            if ($package) {
                $response = ['success_msg' => trans('alert.record_created')];
            } else {
                $response = ['error_msg' => trans('alert.record_unable_to_save')];
            }
       

        return redirect(route('all-packages'))->withErrors($response);
    }

    public function update($request)
    {
        $data = array();
        $validation_rules = [
            'name' => 'required',
            'tagline' => 'required',
            'price' => 'required',
            'duration' => 'required'
        ];
        if (!empty($request->off_bit) && $request->off_bit == "on") {
            $validation_rules['off_percentage'] = "required";
        }

        $request->validate($validation_rules);

        $exists = Package::where([['name', '=', $request->name], ['id', '!=', $request->id]])->count();
        if ($exists >= 1) {
            $data['tagline'] = $request->tagline;
            $data['price'] = $request->price;
            $data['duration'] = $request->duration;
            $data['off_bit'] = !empty($request->off_bit) && $request->off_bit == "on" ? 1 : 0;
            $data['off_percentage'] =  !empty($request->off_percentage) ? $request->off_percentage : 0;

            $attributes = array();
            $attributes["adverts"] = !empty($request->adverts) ? $request->adverts : 0;
            $attributes["images_per_post"] = !empty($request->images_per_post) ? $request->images_per_post : 0;
            $attributes["videos_per_post"] = !empty($request->videos_per_post) ? $request->videos_per_post : 0;

            $data['attributes'] = json_encode($attributes);

            $package = Package::where('id', $request->id)->update($data);

            if ($package) {
                $response = ['success_msg' => trans('alert.updated_except_name_exists')];
            } else {
                $response = ['error_msg' => trans('alert.record_unable_to_save')];
            }
        } else {
            $data['name'] = $request->name;
            $data['tagline'] = $request->tagline;
            $data['price'] = $request->price;
            $data['duration'] = $request->duration;
            $data['off_bit'] = !empty($request->off_bit) && $request->off_bit == "on" ? 1 : 0;
            $data['off_percentage'] =  !empty($request->off_percentage) ? $request->off_percentage : 0;

            $attributes = array();
            $attributes["adverts"] = !empty($request->adverts) ? $request->adverts : 0;
            $attributes["images_per_post"] = !empty($request->images_per_post) ? $request->images_per_post : 0;
            $attributes["videos_per_post"] = !empty($request->videos_per_post) ? $request->videos_per_post : 0;

            $data['attributes'] = json_encode($attributes);

            $package = Package::where('id', $request->id)->update($data);

            if ($package) {
                $response = ['success_msg' => trans('alert.record_updated')];
            } else {
                $response = ['error_msg' => trans('alert.record_unable_to_save')];
            }
        }
        return redirect(route('all-packages'))->withErrors($response);
    }





}
