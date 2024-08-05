<?php

namespace App\Http\Controllers;

use App\Service;
use App\Settings;
// use App\System_prefrence;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //
    public function index()
    {
        // dd('123');
        $settings = Settings::all();
        $page_title = "All settings";
        return view('admin.settings.index', compact('settings'));
    }

    public function form(Request $request)
    {
        // dd('123');


        if (isset($request->id) && $request->id != 0) {
            $results = $this->edit($request->id);
            if ($results instanceof Settings) {
                $page_title = "Edit";
        // dd($results);
                return view('admin.settings.form', compact('page_title', 'results'));
            }
            return $results;
        } else {
            $page_title = "Add";
            return view('admin.settings.form', compact('page_title'));
        }
    }

    public function create()
    {
        $setting = Settings::all();
        return view('settings.index', compact('setting'));
    }
    public function store(Request $request)
    {
        $request_all = $request->all();
        //  dd($request_all);
        unset($request_all['_token']);

        foreach($request_all as $key => $value){
            ///  dd($key);
            Settings::where('id','=', $key)->update(['value' => $value]);
        }


        return redirect()->route('settings.create')->with('success', 'Operation Successfull!');
        // } else {
        //     return redirect()->route('settings.index')->with('failure', 'Operation Failed!');
        // }
    }
    public function updatePrice(Request $request)

    {
        // dd('123');
        $validation_rules = [
            'meta_description' => 'required',


        ];
        $request->validate($validation_rules);


        $response = [];
        $data = [
            'meta_description' => $request->meta_description

        ];
          // dd($data);

        if ($request->hasFile('avatar_file')) {
            $data['logo'] = $request->file('avatar_file')->store('logo');
        }
        if ($request->hasFile('avatar_file1')) {
            $data['fevicon'] = $request->file('avatar_file1')->store('fevicon');
        }
        $setting = Settings::create($data);
        // dd($setting);
        if ($setting) {

            $response = ['success_msg' => trans('alert.record_updated')];
        } else {
            $response = ['error_msg' => trans('alert.record_unable_to_save')];
        }
        return redirect(route('all-settings'))->withErrors($response);
    }

    public function edit($id)
    {
        // dd("edit has been hitted");
        $setting = Settings::find($id);
        if (!$id || !$setting) {
            return redirect()->back();
        } else {
            return $setting;
        }
    }
    public function update(Request $request)
    {
          $validation_rules = [
            'meta_description' => 'required',


        ];
        $request->validate($validation_rules);


        $response = [];
        $data = [
            'meta_description' => $request->meta_description

        ];
          // dd($data);

        if ($request->hasFile('avatar_file')) {
            $data['logo'] = $request->file('avatar_file')->store('logo');
        }
        if ($request->hasFile('avatar_file1')) {
            $data['fevicon'] = $request->file('avatar_file1')->store('fevicon');
        }
        $setting = Settings::find($request->id);
        // dd($setting);
        if ($setting->update($data)) {

            $response = ['success_msg' => trans('alert.record_updated')];
        } else {
            $response = ['error_msg' => trans('alert.record_unable_to_save')];
        }
        return redirect(route('all-settings'))->withErrors($response);
    }


    public function updated(Request $request)
    {
        // dd($request->all());
        if ($request->isMethod('post')) {
            if ($request->id == 0) {
                return $this->create($request);
            } else {
                return $this->update($request);
            }
        }

        $response = ['error_msg' => trans('alert.invalid_request')];

        return redirect(route('all-settings'))->withErrors($response);
    }






    public function indexGoogleApi(){
        $google_settings = Settings::select('id','google_maps','google_places')->first();
        $page_title = "Google Settings Page";
        return view('settings.google', compact('page_title', 'google_settings'));
    }

    public function updateGoogleApi(Request $request)
    {
        $data = [
            'google_maps' => $request->google_maps,
            'google_places' => $request->google_places
        ];
        $google_settings = Settings::where('id',$request->id)->update($data);
        if($google_settings){
            $response = ['success_msg' => trans('alert.record_updated')];
        }else{
            $response = ['error_msg' => trans('alert.record_unable_to_save')];
        }
        return redirect(route('settings-google-api'))->withErrors($response);
    }
}
