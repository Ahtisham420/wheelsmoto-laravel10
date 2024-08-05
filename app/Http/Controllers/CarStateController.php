<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CarState;

class CarStateController extends Controller
{
    public function all()
    {
        $categories = CarState::orderBy('name')->paginate(8);
        return view('state.index', compact('categories'));
    }

    public function create()
    {
        return view('state.create');
    }

    public function save(Request $request)
    {
        if (!empty($request->id) && $request->id > 0){
            $request->validate([
                'name' => 'required|unique:brands,name,' . $request->id
            ]);
        }
        else{
            $request->validate([
                'name' => 'required|unique:brands,name,NULL,id,deleted_at,NULL'
            ]);
        }

        if (!empty($request->id) && $request->id > 0) {
            $response = CarState::where('id', $request->id)->update([
                'name' => $request->name,
            ]);
        } else {
            $response = CarState::create([
                'name' => $request->name
            ]);
        }

        if ($response) {
            return redirect()->route('all-state')->with('success', 'Operation Successfull!');
        } else {
            return redirect()->route('all-state')->with('failure', 'Operation Failed!');
        }
    }

    public function show(Request $request)
    {
        $brand = CarState::find($request->id);
        return view('state.edit', compact('brand'));
    }

    public function delete($id)
    {
        if (CarState::find($id)->delete())
            return redirect()->route('all-state')->with('success', 'Data Deleted');
        else
            return redirect()->route('all-state')->with('failure', 'Data Delete Failed');
    }


}
