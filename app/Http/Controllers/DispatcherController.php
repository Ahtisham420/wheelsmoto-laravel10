<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\User;

class DispatcherController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $customers = User::where('type', '=', User::customer)->get();
        return view('dispatcher.index', compact('services', 'customers'));
    }
}
