<?php

namespace App\Http\Controllers;

use App\formMetaSetting;
use Illuminate\Http\Request;

class FormSetingController extends Controller
{
    //
    public function allEnginTypes(Request $request){
        $posts = formMetaSetting::paginate();
        $model = "formMetaSetting";
        return view("site-settings.index",compact('posts','model'));
    }

    public function update(Request $request){
        dd($request->all());
    }
}
