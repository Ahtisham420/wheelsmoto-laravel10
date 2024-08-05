<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function homeScreenSettings(Request $request)
    {
        return view('application.homesettings');
    }

    public function metaSettings(Request $request)
    {
        return view('application.metasettings');
    }

    public function create()
    {
        return view('meta.create');
    }
}
