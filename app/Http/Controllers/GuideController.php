<?php

namespace App\Http\Controllers;

use App\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    //
//    public function create()
//    {
//        return view('help.create');
//    }

//    public function save(Request $request)
//    {
//        $created = Guide::create([
//            'user_id' => $request->user_id,
//            'user_type' => $request->user_type,
//            'issue_name' => $request->issue_name,
//            'issue_type' => $request->issue_type,
//            'issue_description' => $request->issue_description,
//            'status' => $request->status
//        ]);
//        if ($created) {
//            return redirect(route('create-guides'))->with('message', 'Issue Save');
//        }
//    }
    public function all()
    {
        $guides = Guide::orderBy('id', 'desc')->paginate();
        return view('help.index', compact('guides'));
    }
    public function show(Request $request)
    {
        $guide = Guide::find($request->id);
//        dd($discounts);
        return view('help.show', compact('guide'));
    }

//    public function update(Request $request)
//    {
//        $request->validate([
//            'user_id' => $request->user_id,
//            'user_type' => $request->user_type,
//            'issue_name' => 'required',
//            'issue_type' => 'required',
//            'issue_description' => 'required',
//            'status' => 'required'
//        ]);
////        dd($request->all());
//        $guide = Guide::find($request->id);
//        $guide->user_id = $request->user_id;
//        $guide->user_type = $request->user_type;
//        $guide->issue_name = $request->issue_name;
//        $guide->issue_type = $request->issue_type;
//        $guide->issue_description = $request->issue_description;
//        $guide->status = $request->status;
//        $guide->save();
//        return redirect()->route('all-guides',['id' => $request->id])->with('success', 'Data Updated');
//    }

    public function delete($id)
    {
        Guide::find($id)->delete();
        return redirect()->route('all-guides')->with('success', 'Data Deleted');
    }
}
